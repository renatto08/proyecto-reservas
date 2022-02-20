<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('cliente', 'clientes');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            ['label' => 'Nombres','name' => 'first_name'],
            ['label' => 'Apellidos','name' => 'last_name'],
           admin_column_shop(),
           admin_column_user('Usuario','user'),
            [
                'label' => 'Padre',
                'type' => "select",
                'name' => 'parent',
                'entity' => 'parent',
                'attribute' => "name_username",
                'model' => "App\Models\Client",
            ],

            ['label' => 'Direccion','name' => 'address'],
            ['label' =>'Solicitud de lider','name' => 'request_lider','type'=>'check'],
            ['label' =>'Lider','name' => 'is_lider','type'=>'check'],
            ['label' =>'Empresaria','name' => 'is_empresaria','type'=>'check'],

        ]);


        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);

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
                'label' => 'Usuario',
                'type' => 'select2',
                'name' => 'user_id',
                'entity' => 'user',
                'attribute' => 'username',
                'model' => "App\User"
            ],
            [
                'label' => 'Nombres',
                'name' => 'first_name',
                'type' => 'text'
            ],
            [
                'label' => 'Apellidos',
                'name' => 'last_name',
                'type' => 'text'
            ],
            [
                'label' => 'Fecha Nacimiento',
                'name' => 'birthdate',
                'type' => 'date'
            ],
            [
                'label' => 'Numero',
                'name' => 'code',
                'type' => 'text',
                'hint' => 'DNI,CUI,Extranjeria,etc.'
            ],
            [
                'label' => 'Telefono',
                'name' => 'phone',
                'type' => 'text'
            ],
            [
                'label' => 'Ciudad',
                'name' => 'city',
                'type' => 'text'
            ],
            [
                'label' => 'Direccion',
                'name' => 'address',
                'type' => 'textarea'
            ],
            [
                'label' => 'Telefono',
                'name' => 'phone',
                'type' => 'text'
            ],
            /*[
                'label' => 'Solicitud Lider',
                'name' => 'request_lider',
                'type' => 'checkbox'
            ],
            [
                'label' => '¿Lider?',
                'name' => 'is_lider',
                'type' => 'checkbox'
            ],
            [
                'label' => '¿Empresaria?',
                'name' => 'is_empresaria',
                'type' => 'checkbox'
            ],*/
            [
                'label' => 'Mi Lider',
                'type' => 'select2',
                'name' => 'parent_id',
                'entity' => 'parent',
                'attribute' => 'first_name',
                'model' => "App\Models\Client",
                'options' => (function($query){
                    return $query->whereHas('buser.roles',function($u){
                        $u->where('roles.name','lider');
                    })->orderBy('first_name')->get();
                })
            ],


        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
