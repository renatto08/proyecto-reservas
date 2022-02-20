<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttributeProductRequest;
use App\Http\Requests\AttributeProductRequestUpdate;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Shop;

/**
 * Class AttributeProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AttributeProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\AttributeProduct');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/attributeproduct');
        $this->crud->setEntityNameStrings('Atributo Producto', 'Atributos Producto');
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
                'model' => "App\Models\Product",
            ],
            [
                'label' => 'Color',
                'type' => "select",
                'name' => 'color', 
                'entity' => 'color',
                'attribute' => "name", 
                'model' => "App\Models\Color",
            ],
            [
                'label' => 'Tamaño',
                'type' => "select",
                'name' => 'size', 
                'entity' => 'size',
                'attribute' => "size", 
                'model' => "App\Models\Size",
            ],
            ['label'=>'SKU','name'=>'sku'],
            ['label'=>'Stock','name'=>'stock'],
            ['label'=>'Alerta Stock','name'=>'alert_stock'],
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
        
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AttributeProductRequest::class);

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
            /*[
                'label' => 'Producto',
                'type' => 'select',
                'name' => 'product_id',
                'entity' => 'product',
                'attribute' => 'title',
                'model' => "App\Models\Product"
            ],*/
            [ // select2_from_ajax: 1-n relationship
                'label'                => "Producto", // Table column heading
                'type'                 => 'select2_from_ajax',
                'name'                 => 'product_id', // the column that contains the ID of that connected entity;
                'entity'               => 'product', // the method that defines the relationship in your Model
                'attribute'            => 'title', // foreign key attribute that is shown to user
                'data_source'          => url('backoffice/api/product'), // url to controller search function (with /{id} should return model)
                'placeholder'          => 'Selecciona un producto', // placeholder for the select
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['shop_id'], // when a dependency changes, this select2 is reset to null
                // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
            ],
            [
                'name' => 'sku',
                'type' => 'text',
                'label' => 'Codigo Sku'
            ],
            [ // select2_from_ajax: 1-n relationship
                'label'                => "Color", // Table column heading
                'type'                 => 'select2_from_ajax',
                'name'                 => 'color_id', // the column that contains the ID of that connected entity;
                'entity'               => 'color', // the method that defines the relationship in your Model
                'attribute'            => 'name', // foreign key attribute that is shown to user
                'data_source'          => url('backoffice/api/color'), // url to controller search function (with /{id} should return model)
                'placeholder'          => 'Selecciona un color', // placeholder for the select
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['shop_id'], // when a dependency changes, this select2 is reset to null
                // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
            ],
            [ // select2_from_ajax: 1-n relationship
                'label'                => "Tamaño", // Table column heading
                'type'                 => 'select2_from_ajax',
                'name'                 => 'size_id', // the column that contains the ID of that connected entity;
                'entity'               => 'size', // the method that defines the relationship in your Model
                'attribute'            => 'size', // foreign key attribute that is shown to user
                'data_source'          => url('backoffice/api/size'), // url to controller search function (with /{id} should return model)
                'placeholder'          => 'Selecciona un tamaño', // placeholder for the select
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['shop_id'], // when a dependency changes, this select2 is reset to null
                // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
            ],
            /*[
                'label' => 'Color',
                'type' => 'select',
                'name' => 'color_id',
                'entity' => 'color',
                'attribute' => 'name',
                'model' => "App\Models\Color"
            ],
            [
                'label' => 'Tamaño',
                'type' => 'select',
                'name' => 'size_id',
                'entity' => 'size',
                'attribute' => 'size',
                'model' => "App\Models\Size"
            ],*/
            [
                'name' => 'stock',
                'type' => 'number',
                'label' => 'Stock Actual',
                'attributes' => [
                    'readonly' => true
                ],
                'default' => 0
            ],
            [
                'name' => 'alert_stock',
                'type' => 'number',
                'label' => 'Alerta Stock',
                'default' => 0
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {

        $this->setupCreateOperation();
        $this->crud->setValidation(AttributeProductRequestUpdate::class);
    }


}
