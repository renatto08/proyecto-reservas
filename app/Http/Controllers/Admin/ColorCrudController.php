<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ColorRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ColorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ColorCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Color');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/color');
        $this->crud->setEntityNameStrings('color', 'colores');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
           admin_column_shop(),
           ['label'=>'Nombre','name'=>'name'],
           ['label'=>'Color Hex','name'=>'color']
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ColorRequest::class);

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
                'name' => 'name',
                'type' => 'text'
            ],
            [
                'label' => 'Color',
                'name' => 'color',
                'type' => 'color_picker',
                'default' => '#000000'
            ]
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
