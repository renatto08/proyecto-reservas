<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FleteRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FleteCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class FleteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Flete');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/flete');
        $this->crud->setEntityNameStrings('flete', 'fletes');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            admin_column_shop(),
            ['label'=>'Nombre','name'=>'name'],
            ['label'=>'Precio','name'=>'price','decimals'=>2,'prefix'=>'S/.'],
            ['label'=>'Activo','name'=>'active','type'=>'check']
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FleteRequest::class);

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
                'label' => 'Nombre',
                'type' => 'text',
                'name' => 'name'
            ],
            [
                'name' => 'price',
                'type' => 'number',
                'label' => 'Precio',
                'attributes' => ["step" => "any"],
                'prefix' => "S/."
            ],
            [
                'label' => 'Activo',
                'type' => 'checkbox',
                'name' => 'active'
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
