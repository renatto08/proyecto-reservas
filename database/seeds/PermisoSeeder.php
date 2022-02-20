<?php

use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Seeder;


class PermisoSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name'=>'god','guard_name'=>'backpack']);

        Permission::create(['name'=>'campanas-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'clientes-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'categorias-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'cupones-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'fletes-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'reservas-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'generar-venta-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'reservas-recibidas-crud','guard_name'=>'backpack']);
        Permission::create(['name'=>'sliders-crud','guard_name'=>'backpack']);

        Permission::create(['name'=>'tiendas-r','guard_name'=>'backpack']);
        Permission::create(['name'=>'inventarios-r','guard_name'=>'backpack']);
        Permission::create(['name'=>'campanas-r','guard_name'=>'backpack']);
        Permission::create(['name'=>'categorias-r','guard_name'=>'backpack']);
        Permission::create(['name'=>'cupones-r','guard_name'=>'backpack']);
        Permission::create(['name'=>'fletes-r','guard_name'=>'backpack']);

        Permission::create(['name'=>'pedidos-rd','guard_name'=>'backpack']);
        Permission::create(['name'=>'ventas-rd','guard_name'=>'backpack']);

        Role::create(['name'=>'administrador','guard_name'=>'backpack']);
        Role::create(['name'=>'coord-ventas','guard_name'=>'backpack']);
        Role::create(['name'=>'ventas','guard_name'=>'backpack']);
        Role::create(['name'=>'negocio','guard_name'=>'backpack']);
        Role::create(['name'=>'lider','guard_name'=>'backpack']);
        Role::create(['name'=>'empresaria','guard_name'=>'backpack']);
        Role::create(['name'=>'cliente','guard_name'=>'backpack']);


    }
}
