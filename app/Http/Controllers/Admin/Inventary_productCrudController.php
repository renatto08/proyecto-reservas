<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Inventary_productRequest;
use App\Models\AttributeProduct;
use App\Models\Inventary_product;
use App\Models\Product;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Inventary_productCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Inventary_productCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Inventary_product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/inventary_product');
        $this->crud->setEntityNameStrings('Inventario', 'Inventarios');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            admin_column_shop(),
            [
                'label' => 'Producto',
                'type' => "select",
                'name' => 'product',
                'entity' => 'product',
                'attribute' => "title",
                'model' => "App\Models\Product"
            ],
            [
                'label' => 'Atributo',
                'type' => "select",
                'name' => 'attribute_product',
                'entity' => 'attribute_product',
                'attribute' => "full_desc",
                'model' => "App\Models\AttributeProduct"
            ],
            ['label' => 'Tipo','name'=>'type'],
            ['label' => 'Cantidad','name'=>'q']

        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
        admin_filter_select2($this->crud,Product::class,'Producto','product_id','title','id');
    }

    public function store(Inventary_productRequest $request)
    {
        $product_id = $this->crud->request->input('product_id');
        $attribute_product_id = $this->crud->request->input('attribute_product_id');
        $total_in = Inventary_product::where('shop_id',$this->crud->request->input('shop_id'))
            ->where('product_id',$product_id)->where('type','ENTRADA')->sum('q');

        $total_sal = Inventary_product::where('shop_id',$this->crud->request->input('shop_id'))
            ->where('product_id',$product_id)->where('type','SALIDA')->sum('q');

        $total = $total_in - $total_sal;

        $q = $this->crud->request->input('q');
        $type = $this->crud->request->input('type');


        $prod = Product::find($product_id);
        if($prod){
            if($type=='ENTRADA'){
                $prod->stock = $total + $q;
            }else{
                $prod->stock = $total - $q;
            }
            $prod->save();
        }

        $total_a_in = Inventary_product::where('shop_id',$this->crud->request->input('shop_id'))
            ->where('product_id',$product_id)->where('type','ENTRADA')->where('attribute_product_id',$attribute_product_id)->sum('q');

        $total_a_sal = Inventary_product::where('shop_id',$this->crud->request->input('shop_id'))
            ->where('product_id',$product_id)->where('type','SALIDA')->where('attribute_product_id',$attribute_product_id)->sum('q');

        $total_a = $total_a_in - $total_a_sal;

        $attr = AttributeProduct::find($attribute_product_id);
        if($attr){
            if($type=='ENTRADA'){
                $attr->stock = $total_a + $q;
            }else{
                $attr->stock = $total_a - $q;
            }
            $attr->save();
        }

        $response = $this->traitStore();
        return $response;

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(Inventary_productRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([
            [
                'label' => 'Tienda',
                'type' => 'select',
                'name' => 'shop_id',
                'entity' => 'shop',
                'attribute' => 'name',
                'model' => "App\Models\Shop"
            ],
            [
                'label' => 'Producto',
                'type' => 'select2',
                'name' => 'product_id',
                'entity' => 'product',
                'attribute' => 'title',
                'model' => "App\Models\Product"
            ],
            [ // select2_from_ajax: 1-n relationship
                'label'                => "Atributo Producto", // Table column heading
                'type'                 => 'select2_from_ajax',
                'name'                 => 'attribute_product_id', // the column that contains the ID of that connected entity;
                'entity'               => 'attribute_product', // the method that defines the relationship in your Model
                'attribute'            => 'full_desc', // foreign key attribute that is shown to user
                'data_source'          => url('backoffice/api/attribute_product'), // url to controller search function (with /{id} should return model)
                'placeholder'          => 'Selecciona un atributo', // placeholder for the select
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['product_id'], // when a dependency changes, this select2 is reset to null
                // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
            ],
            /*[
                'label' => 'Atributo Producto',
                'type' => 'select',
                'name' => 'attribute_product_id',
                'entity' => 'attribute_product',
                'attribute' => 'full_desc',
                'model' => "App\Models\AttributeProduct"
            ],*/
            [
                'label' => 'Tipo',
                'type' => 'enum',
                'name' => 'type'
            ],
            [
                'label' => 'Cantidad',
                'type' => 'number',
                'name' => 'q'
            ],
            [
                'label' => 'Descripcion',
                'type' => 'textarea',
                'name' => 'description'
            ]

        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
