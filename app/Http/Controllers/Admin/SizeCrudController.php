<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SizeRequest;
use App\Models\Shop;
use App\Models\Size;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Session;

/**
 * Class SizeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SizeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Size');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/size');
        $this->crud->setEntityNameStrings('talla', 'tallas');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
           admin_column_shop(),
           ['label' => 'Tallas','name'=>'size']
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SizeRequest::class);

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
                'label' => 'Tamaño',
                'name' => 'size',
                'type' => 'text',

            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
