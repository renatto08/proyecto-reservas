<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SuscriptionRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SuscriptionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SuscriptionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Suscription');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/suscription');
        $this->crud->setEntityNameStrings('Subscripción', 'Subscripciones');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->addColumns([
            admin_column_shop(),
            ['label' => "Nombres",'name' => 'name','type' => "text"],
            ['label' => "email",'name' => 'email','type' => "text"],
            ['label' => "Tipo",'name' => 'type','type' => "enum"],
            ['label' => "Fecha",'name' => 'created_at','type' => "date"],
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SuscriptionRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([
            [
                'label' => 'Tienda',
                'type' => 'select2',
                'name' => 'shop_id',
                'entity' => 'shop',
                'attribute' => 'name',
                'model' => "App\Models\Shop"
            ],
            [
                'name' => 'type',
                'type' => 'enum',
                'label' => 'Tipo de subscripción'
            ],
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombres'
            ],
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email'
            ],
            [
                'name' => 'subject',
                'type' => 'text',
                'label' => 'Asunto'
            ],
            [
                'name' => 'message',
                'type' => 'textarea',
                'label' => 'Mensaje'
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
