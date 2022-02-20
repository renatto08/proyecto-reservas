<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CampaignRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CampaignCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CampaignCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Campaign');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/campaign');
        $this->crud->setEntityNameStrings('camapaña', 'campañas');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => 'Nombre'
            ],
            admin_column_shop(),

            [
                'name' => 'active',
                'label' => 'Activo',
                'type' => 'check'
            ]
        ]);

        $this->crud->addFilter([
            'name' => 'shop_id',
            'type' => 'select2',
            'label' => 'Tienda'
        ],function(){
            return Shop::where('active',true)->get()->pluck('name','id')->toArray();
        },function($value){
            $this->crud->addClause('where','shop_id',$value);
        });
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CampaignRequest::class);

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
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre'
            ],
            [
                'name' => 'active',
                'label' => 'activo',
                'type' => 'checkbox'
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
