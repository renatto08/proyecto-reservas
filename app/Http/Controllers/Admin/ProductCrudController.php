<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('producto', 'productos');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'label' => "Producto",
                'name' => 'title',
                'type' => "text"
            ],
            [
                'name' => 'image',
                'type' => 'image',
                'label' => 'Imagen',
                'prefix' => 'storage/'
            ],
            admin_column_shop(),

            admin_column_category(),
            ['label'=>'Precio','name'=>'price','type'=>'number','prefix'=>'S/.','decimals'=>2],
            ['label'=>'P. Oferta','name'=>'price_sale','type'=>'number','prefix'=>'S/.','decimals'=>2],
            ['label' => 'Nuevo','name'=>'is_new','type'=>'check'],
            ['label' => 'Activo','name'=>'active','type'=>'check']
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
        admin_filter_select2($this->crud,Category::class,'Categoria','category_id','name','id',['active'=>true,'parent_id'=>null]);
    }

    public function store(ProductRequest $request)
    {
        $this->crud->request->request->add(['stock'=>0]);
        $this->crud->addField(['type' => 'hidden', 'name' => 'stock']);
        $response = $this->traitStore();
        return $response;
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProductRequest::class);

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
                'name' => 'title',
                'type' => 'text',
                'label' => 'Nombre'
            ],
            [
                'name' => 'description',
                'type' => 'wysiwyg',
                'label' => 'Descripcion'
            ],
            [
                'name' => 'specification',
                'type' => 'wysiwyg',
                'label' => 'Especificaciones'
            ],
            [
                'name' => 'price',
                'type' => 'number',
                'label' => 'Precio',
                'attributes' => ["step" => "any"],
                'prefix' => "S/."
            ],
            [
                'name' => 'price_sale',
                'type' => 'number',
                'label' => 'Precio Oferta',
                'attributes' => ["step" => "any"],
                'default' => 0,
                'prefix' => "S/."
            ],
            [
                'name' =>'image',
                'type' => 'image',
                'label' => 'Imagen Portada',
                'upload' => true,
                'disk' => 'public',
                'crop' => true,
                'aspect_ratio' => 0.771,
            ],
            [
                'name' =>'gallery',
                'type' => 'upload_multiple',
                'label' => 'Galeria',
                'upload' => true,
                'disk' => 'public'
            ],
            [
                'name' => 'new',
                'label' => '¿Producto Nuevo?',
                'type' => 'checkbox'
            ],
            /*[
                'label' => 'Categoria',
                'type' => 'select',
                'name' => 'category_id',
                'entity' => 'category',
                'attribute' => 'name',
                'model' => "App\Models\Category"
            ],*/
            [ // select2_from_ajax: 1-n relationship
                'label'                => "Categoria",
                'type'                 => 'select2_from_ajax',
                'name'                 => 'category_id',
                'entity'               => 'category',
                'attribute'            => 'name',
                'data_source'          => url('backoffice/api/category'),
                'placeholder'          => 'Selecciona una categoria',
                'minimum_input_length' => 0,
                'dependencies'         => ['shop_id'],
                // ‘method'                    => ‘GET’,
            ],
            [
                'name' => 'active',
                'label' => 'Activo',
                'type' => 'checkbox',
                'default' => true
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
