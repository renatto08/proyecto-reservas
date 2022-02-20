<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\Campaign;
use App\Models\Shop;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('orden de compra', 'ordenes de compra');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            [
                'label' => '#ID',
                'name'=> 'id'
            ],
            admin_column_shop(),
            [
                'label' => 'Cliente',
                'type' => "select",
                'name' => 'client',
                'entity' => 'client',
                'attribute' => "full_name",
                'model' => "App\Models\Client"
            ],
            [
                'label' => 'Sub Total',
                'name'=> 'sub_total',
                'type' => 'number',
                'prefix' => 'S/.',
                'decimals' => 2
            ],
            [
                'label' => 'Sub Total Oferta',
                'name'=> 'sub_total_offer',
                'type' => 'number',
                'prefix' => 'S/.',
                'decimals' => 2
            ],
            [
                'label' => 'Total',
                'name'=> 'total',
                'type' => 'number',
                'prefix' => 'S/.',
                'decimals' => 2
            ],
            ['label'=>'Tipo Pago','name'=>'payment'],
            ['label'=>'Fecha','name'=>'created_at','type'=>'date']
        ]);

        admin_filter_select2($this->crud,Shop::class,'Tienda','shop_id','name','id',['active'=>true]);
        admin_filter_select2($this->crud,Campaign::class,'Campaña','campaign_id','name','id',['active'=>true]);

    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([
            [
                'label' => 'Tienda',
                'type' => "select",
                'name' => 'shop_id',
                'entity' => 'shop',
                'attribute' => "name",
                'model' => "App\Models\Shop",
                'tab' => 'Generales'
            ],
            [
                'label'                => "Cliente",
                'type'                 => 'select2_from_ajax',
                'name'                 => 'client_id',
                'entity'               => 'client',
                'attribute'            => 'full_name',
                'data_source'          => url('backoffice/api/client'),
                'placeholder'          => 'Selecciona un cliente',
                'minimum_input_length' => 0,
                'dependencies'         => ['shop_id'],
                'tab' => 'Generales'
                // ‘method'                    => ‘GET’,
            ],
            [
                'label'=>'Fecha de registro',
                'type' => 'datetime',
                'name' => 'created_at',
                'attributes' => ['disabled'=>true],
                'tab' => 'Generales'
            ],
            [
                'label'=>'Ultima Edición',
                'type' => 'datetime',
                'name' => 'updated_at',
                'attributes' => ['disabled'=>true],
                'tab' => 'Generales'
            ],
            [
                'label'                => "Campaña",
                'type'                 => 'select2_from_ajax',
                'name'                 => 'campaign_id',
                'entity'               => 'campaign',
                'attribute'            => 'name',
                'data_source'          => url('backoffice/api/campaign'),
                'placeholder'          => 'Selecciona una campaña',
                'minimum_input_length' => 0,
                'dependencies'         => ['shop_id'],
                'tab' => 'Generales'
            ],
            [
                'label'                => "Cupon",
                'type'                 => 'select2_from_ajax',
                'name'                 => 'coupon_id',
                'entity'               => 'coupon',
                'attribute'            => 'title',
                'data_source'          => url('backoffice/api/coupon'),
                'placeholder'          => 'Selecciona un cupon de descuento',
                'minimum_input_length' => 0,
                'dependencies'         => ['shop_id'],
                'tab' => 'Generales'
            ],

            //totales
            [
                'label' => 'Descuento',
                'name' => 'discount',
                'type' => 'number',
                'attributes' => [
                    'placeholder' => 'S/ 0.0',
                    'step'=>'any'
                ],
                'prefix' => 'S/.',
                'wrapperAttributes'=>[
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Descuento de oferta',
                'name' => 'discount_offer',
                'type' => 'number',
                'attributes' => [
                    'placeholder' => 'S/ 0.0',
                    'step'=>'any'
                ],
                'prefix' => 'S/.',
                'wrapperAttributes'=>[
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Direccion Flete',
                'name' => 'flete_address',
                'type' => 'text',
                'attributes' => [
                    'placeholder' => 'Direccion de entrega',
                ],
                'wrapperAttributes'=>[
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Costo Flete',
                'name' => 'flete',
                'type' => 'number',
                'attributes' => [
                    'placeholder' => 'S/ 0.0',
                    'step'=>'any'
                ],
                'prefix' => 'S/.',
                'wrapperAttributes'=>[
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Descuento adicional',
                'name' => 'amount_discount_aditional',
                'type' => 'number',
                'attributes' => [
                    'placeholder' => 'S/ 0.0',
                    'step'=>'any'
                ],
                'prefix' => 'S/.',
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Sub total',
                'name' => 'sub_total',
                'type' => 'number',
                'attributes' => [
                    'placeholder' => 'S/ 0.0',
                    'step'=>'any'
                ],
                'prefix' => 'S/.',
                'wrapperAttributes'=>[
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Total',
                'name' => 'total',
                'type' => 'number',
                'attributes' => [
                    'placeholder' => 'S/ 0.0',
                    'step'=>'any'
                ],
                'prefix' => 'S/.',
                'wrapperAttributes'=>[
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Montos (S/.)'
            ],
            [
                'label' => 'Tipo de pago',
                'name' => 'payment',
                'type' => 'enum',
                'tab' => 'Información adicional'
            ],
            [
                'label' => 'Nombre de banco',
                'name' => 'name_bank',
                'type' => 'text',
                'tab' => 'Información adicional'
            ],
            [
                'label' => 'Nota adicional',
                'name' => 'description',
                'type' => 'textarea',
                'tab' => 'Información adicional'
            ],
            [
                'name' => 'status',
                'label' => 'Estado',
                'tab' => 'Información adicional',
                'type' => 'enum'
            ],
            [
                'label' => 'Proceso realizado por:',
                'name' => 'name_user',
                'attributes' => [
                    'disabled' => 'disabled'
                ],
                'type' => 'text',
                'tab' => 'Información adicional'
            ],


        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
