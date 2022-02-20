<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ShopRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ShopCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ShopCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Shop');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/shop');
        $this->crud->setEntityNameStrings('tienda', 'tiendas');

        $this->crud->denyAccess(['list','create','delete','show']);
        if(backpack_user()->hasRole('administrador')){
            $this->crud->allowAccess(['list','create','delete','show']);
        }else{
            //$this->crud->allowAccess(shop_access_permission(backpack_user()));
        }

    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $this->crud->addColumns([
            ['name'=> 'name','type'=>'text','label'=>'Tienda'],
            ['name'=> 'code','type'=>'text','label'=>'Slug'],
            ['name'=> 'address','type'=>'text','label'=>'Direccion'],
            ['name'=> 'logo','type'=>'image','label'=>'Logo','prefix'=>'storage/']
        ]);



    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ShopRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        $this->crud->addFields([[
                'name' => 'name',
                'type' => 'text',
                'label' => 'Nombre de la tienda','tab'=>'Datos'
            ],
                [
                    'name' => 'code',
                    'type' => 'text',
                    'label' => 'Codigo Slug','tab'=>'Datos'
                ],
                [
                    'name' => 'address',
                    'label' => 'Direccion',
                    'type' => 'textarea','tab'=>'Datos'
                ],
                [
                    'name' => 'email',
                    'label' => 'Email',
                    'type' => 'text','tab'=>'Datos'
                ],
                [
                    'name' => 'phone',
                    'label' => 'Telefono',
                    'type' => 'text','tab'=>'Datos'
                ],
                [
                    'name' =>'logo',
                    'type' => 'image',
                    'label' => 'Logo',
                    'upload' => true,
                    'disk' => 'public','tab'=>'Diseño'
                ],
                [
                    'name' =>'logo_shop',
                    'type' => 'image',
                    'label' => 'Logo de tienda',
                    'upload' => true,
                    'disk' => 'public',
                    'crop' => true,
                    'aspect_ratio' => 3.416,'tab'=>'Diseño'
                ],
                [
                    'name' => 'theme',
                    'type' => 'select_from_array',
                    'label' => 'Template',
                    'options' => ['default'=>'Default', 'theme 1' =>'Theme 1','theme 2'=>'Theme 2'],'tab'=>'Diseño'
                ],
                [
                    'name' => 'active',
                    'label' => 'Activo',
                    'type' => 'checkbox',
                    'default' => true,'tab'=>'Datos'
                ],
                [
                    'name' => 'footer',
                    'label' => 'Footer',
                    'type' => 'code','tab'=>'Editables'
                ],
                [
                    'name' => 'contact_description',
                    'label' => 'Contacto: Descripcion',
                    'type' => 'code','tab'=>'Editables'
                ],
                [
                    'name' => 'contact_map',
                    'label' => 'Contacto: Mapa',
                    'type' => 'code','tab'=>'Editables',
                    'height' => '200px'
                ],
                [
                    'name' => 'banner_sidebar',
                    'type' => 'image',
                    'label' => 'Banner Derecha',
                    'upload' => true,
                    'disk' => 'public',
                    'crop' => true,
                    'aspect_ratio' => 0.9722,
                    'tab'=>'Banners'
                ],
                [
                    'name' => 'banner_top',
                    'type' => 'image',
                    'label' => 'Banner Top',
                    'upload' => true,
                    'disk' => 'public',
                    'crop' => true,
                    'aspect_ratio' => 1,
                    'tab'=>'Banners'
                ],
                [
                    'name' => 'banner_home',
                    'type' => 'image',
                    'label' => 'Banner Inicio',
                    'upload' => true,
                    'disk' => 'public',
                    'crop' => true,
                    'aspect_ratio' => 1.91379,
                    'tab'=>'Banners'
                ],
                [
                    'name' => 'facebook',
                    'label' => 'Facebook',
                    'type' => 'url','tab'=>'Redes sociales'
                ],
                [
                    'name' => 'twitter',
                    'label' => 'Twitter',
                    'type' => 'url','tab'=>'Redes sociales'
                ],
                [
                    'name' => 'instagram',
                    'label' => 'Instagram',
                    'type' => 'url','tab'=>'Redes sociales'
                ],
                [
                    'name' => 'youtube',
                    'label' => 'Youtube',
                    'type' => 'url','tab'=>'Redes sociales'
                ],
                [
                    'name' => 'time_reservation',
                    'type' => 'number',
                    'suffix' => 'HORAS',
                    'label' => 'Duración de reserva','tab'=>'Configuraciones'
                ],
            ]
        );
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
