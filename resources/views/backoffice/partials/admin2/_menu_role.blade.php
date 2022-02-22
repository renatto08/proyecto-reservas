@if(backpack_user()->hasrole('administrador') || backpack_user()->hasrole('coord-ventas') || backpack_user()->hasrole('ventas'))
<li class="heading">OPERACIONES</li>
<!--<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-desktop"></i>
        <span class="nav-label">Panel de control</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
       
        <li>
            <a href="{{route('clients.index')}}">Clientes</a>
        </li>
        <li>
            <a  href="{{route('b.inventary.index')}}">Inventario</a>
        </li>
        <li>
            <a  href="#">Orden de salida</a>
        </li>
    <li>
            <a  href="{{route('orders.received',['status'=>'Venta','parent'=>'me'])}}">Lista de ventas</a>
        </li>
    </ul>
</li>-->
<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-archive"></i>
        <span class="nav-label">Reservas</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a  href="{{route('orders.create')}}">Nueva reserva</a>
        </li>
        <li>
            <a  href="{{route('orders.index')}}">Mis reservas</a>
        </li>

    </ul>
</li>

<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-panel"></i>
        <span class="nav-label">Ventas</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">

        <li style="display:none;">
            <a href="{{route('orders.create_sell')}}">Nueva Venta</a>
        </li>
        <li>
            <a href="{{route('orders.received',['status'=>'Venta'])}}">Mis ventas</a>
        </li>
    </ul>
</li>

<!--<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-check"></i>
        <span class="nav-label">Cambio de Producto</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">

        <li>
            <a href="{{route('order_salida.create')}}">Nuevo Cambio</a>
        </li>
        <li>
            <a href="{{route('order_salida.index')}}">Historial</a>
        </li>
    </ul>
</li>-->
@elseif(backpack_user()->hasrole('negocio'))
    <li class="heading">OPERACIONES</li>
    <li>
        <a href="javascript:;"><i class="sidebar-item-icon ti-desktop"></i>
            <span class="nav-label">Panel de control</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
           
            <li>
                <a href="{{route('clients.index')}}">Clientes</a>
            </li>
            <li>
                <a  href="{{route('b.inventary.index')}}">Inventario</a>
            </li>
            <li>
                <a  href="#">Orden de salida</a>
            </li>
        <!--<li>
            <a  href="{{route('orders.received',['status'=>'Venta','parent'=>'me'])}}">Lista de ventas</a>
        </li>-->
        </ul>
    </li>
    <li>
        <a href="javascript:;"><i class="sidebar-item-icon ti-archive"></i>
            <span class="nav-label">Reservas</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
            <li>
                <a  href="{{route('orders.create')}}">Nueva reserva</a>
            </li>
            <li>
                <a href="{{route('orders.received')}}">Lista de reservas</a>
            </li>

        </ul>
    </li>

    <li>
        <a href="javascript:;"><i class="sidebar-item-icon ti-panel"></i>
            <span class="nav-label">Ventas</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">

            <li>
                <a href="{{route('orders.create_sell')}}">Nueva Venta</a>
            </li>
        </ul>
    </li>
@elseif(backpack_user()->hasrole('lider'))
<li class="heading">OPERACIONES</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-desktop"></i>
        <span class="nav-label">Panel de control</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">

        <li>
            <a href="{{route('clients.index')}}">Clientes</a>
        </li>
        <li>
            <a  href="{{route('b.inventary.index')}}">Inventario</a>
        </li>
        <li>
            <a  href="{{route('orders.received',['status'=>'Venta','parent'=>'me'])}}">Mis ventas</a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-archive"></i>
        <span class="nav-label">Reservas</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a  href="{{route('orders.create')}}">Nueva reserva</a>
        </li>
        <li>
            <a  href="{{route('orders.index')}}">Mis reservas</a>
        </li>

    </ul>
</li>
@elseif(backpack_user()->hasrole('empresaria'))
<li class="heading">OPERACIONES</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-desktop"></i>
        <span class="nav-label">Panel de control</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a  href="{{route('b.inventary.index')}}">Inventario</a>
        </li>
        <li>
            <a  href="{{route('orders.received',['status'=>'Venta','parent'=>'me'])}}">Mis ventas</a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:;"><i class="sidebar-item-icon ti-archive"></i>
        <span class="nav-label">Reservas</span><i class="fa fa-angle-left arrow"></i></a>
    <ul class="nav-2-level collapse">
        <li>
            <a  href="{{route('orders.create')}}">Nueva reserva</a>
        </li>
        <li>
            <a  href="{{route('orders.index')}}">Mis reservas</a>
        </li>

    </ul>
</li>
@else
    <li class="heading">SIN ACCESO</li>
@endif