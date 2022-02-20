<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SliderRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SliderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SliderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Slider');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/slider');
        $this->crud->setEntityNameStrings('slider', 'sliders');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'label' => "Titulo",
                'name' => 'title',
                'type' => "text"
            ],
            admin_column_shop(),

            [
                'label' => "URL",
                'name' => 'url',
                'type' => "text"
            ],
            [
                'label' => "Orden",
                'name' => 'orden',
                'type' => "text"
            ],
            ['label' => 'Activo','name'=>'active','type'=>'check']
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SliderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
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
                'name' => 'title',
                'type' => 'text',
                'label' => 'Nombre'
            ],
            [
                'name' => 'url',
                'type' => 'text',
                'label' => 'URL'
            ],
            [
                'name' => 'description',
                'type' => 'wysiwyg',
                'label' => 'Descripcion'
            ],
            [
                'name' =>'image',
                'type' => 'image',
                'label' => 'Imagen Portada',
                //'filename' => null,
                'upload' => true,
                'crop' => true,
                'aspect_ratio' => 1.91379,
                'disk' => 'public'
            ],
            [
                'name' => 'orden',
                'type' => 'number',
                'label' => 'Orden'
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
