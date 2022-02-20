<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ShopUserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ShopUserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ShopUserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\ShopUser');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/shopuser');
        $this->crud->setEntityNameStrings('Usuario  - Tienda', 'Usuarios - Tienda');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'label' => "Tienda", // Table column heading
                'type' => "select",
                'name' => 'shop', // the method that defines the relationship in your Model
                'entity' => 'shop', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\Models\Shop", // foreign key model
            ],
            [
                'label' => "Usuario", // Table column heading
                'type' => "select",
                'name' => 'username', // the method that defines the relationship in your Model
                'entity' => 'user', // the method that defines the relationship in your Model
                'attribute' => "username", // foreign key attribute that is shown to user
                'model' => "App\User", // foreign key model
            ],
            [
                'label' => "Nombre", // Table column heading
                'type' => "select",
                'name' => 'user', // the method that defines the relationship in your Model
                'entity' => 'user', // the method that defines the relationship in your Model
                'attribute' => "name", // foreign key attribute that is shown to user
                'model' => "App\User", // foreign key model
            ]
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ShopUserRequest::class);

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
                'type' => 'select',
                'name' => 'user_id',
                'entity' => 'user',
                'attribute' => 'username',
                'model' => "App\User"
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
