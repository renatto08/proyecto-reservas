<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CouponRequest;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CouponCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CouponCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Coupon');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/coupon');
        $this->crud->setEntityNameStrings('cupon', 'cupones');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
           admin_column_shop(),
           ['label'=>'Nombre','name'=>'title'],
           ['label'=>'Codigo','name'=>'code'],
           ['label'=>'Tipo','name'=>'type'],
           ['label'=>'Valor','name'=>'type'],
           ['label'=>'Tipo Dscto','name'=>'type_coupon','decimals'=>2],
            ['label'=>'F. Expira','name'=>'expirated'],
            ['label' => 'Activo','name'=>'active','type'=>'check']
        ]);
        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CouponRequest::class);

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
                'name' => 'title',
                'type' => 'text'
            ],
            [
                'label' => 'Codigo',
                'name' => 'code',
                'type' => 'text'
            ],
            [
                'label' => 'Tipo',
                'name' => 'type',
                'type' => 'enum'
            ],
            [
                'label' => 'Valor',
                'name' => 'value',
                'type' => 'number',
                'attributes' => ["step" => "any"],
            ],
            [
                'label' => 'Tipo de Cupon',
                'name' => 'type_coupon',
                'type' => 'enum'
            ],

            [
                'label' => 'Valor Min.',
                'name' => 'value_min',
                'type' => 'number',
                'attributes' => ["step" => "any"],
            ],
            [
                'label' => 'Fecha de expiracion',
                'name' => 'expirated',
                'type' => 'datetime_picker'
            ],
            [
                'label' => 'Activo',
                'name' => 'active',
                'type' => 'checkbox'
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
