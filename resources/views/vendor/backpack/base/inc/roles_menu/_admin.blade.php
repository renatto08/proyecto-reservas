<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class=nav-item><a class=nav-link href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon fa fa-cog'></i> Configuracion</a></li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-group"></i> Seguridad</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-user"></i> <span>Usuarios</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon fa fa-group"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon fa fa-key"></i> <span>Permisos</span></a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('shop') }}'><i class='nav-icon fa fa-shopping-cart'></i> Tiendas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('slider') }}'><i class='nav-icon fa fa-image'></i> Sliders</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('campaign') }}'><i class='nav-icon fa fa-tags'></i> Campañas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('client') }}'><i class='nav-icon fa fa-user'></i> Clientes</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('color') }}'><i class='nav-icon fa fa-code'></i> Colores</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('size') }}'><i class='nav-icon fa fa-code'></i> Tallas</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon fa fa-tag'></i> Categorias</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'><i class='nav-icon fa fa-object-group'></i> Productos</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('attributeproduct') }}'><i class='nav-icon fa fa-circle-o'></i> Atributos Producto</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('coupon') }}'><i class='nav-icon fa fa-dollar'></i> Cupones</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'><i class='nav-icon fa fa-cart-plus'></i> Pedidos</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('shopuser') }}'><i class='nav-icon fa fa-user-md'></i> Tienda - Usuario</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('flete') }}'><i class='nav-icon fa fa-car'></i> Fletes</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('inventary_product') }}'><i class='nav-icon fa fa-list'></i> Inventario</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('suscription') }}'><i class='nav-icon fa fa-envelope-o'></i> Suscripciones</a></li>