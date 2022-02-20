<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('categoria', 'categorias');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            admin_column_shop(),
            [
                'label' => "Padre", // Table column heading
                'type' => "select",
                'name' => 'parent', // the method that defines the relationship in your Model
                'entity' => 'parent', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\Models\Category", // foreign key model
            ],
            [
                'label' => "Nombre",
                'name' => 'name',
                'type' => "text"
            ],
            [
                'label' => "Activo",
                'name' => 'active',
                'type' => "check"
            ]
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoryRequest::class);

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
                'label' => 'Padre',
                'type' => 'select',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'name',
                'model' => "App\Models\Category"
            ],*/
            [ // select2_from_ajax: 1-n relationship
                'label'                => "Categoria Padre", // Table column heading
                'type'                 => 'select2_from_ajax',
                'name'                 => 'parent_id', // the column that contains the ID of that connected entity;
                'entity'               => 'parent', // the method that defines the relationship in your Model
                'attribute'            => 'name', // foreign key attribute that is shown to user
                'data_source'          => url('backoffice/api/category_parent'), // url to controller search function (with /{id} should return model)
                'placeholder'          => 'Selecciona un padre', // placeholder for the select
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['shop'], // when a dependency changes, this select2 is reset to null
                // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
            ],
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre'
            ],
            [
                'name' => 'active',
                'label' => 'activo',
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
