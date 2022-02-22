<!-- START HEADER-->
<header class="header">
    <!-- START TOP-LEFT TOOLBAR-->
    <ul class="nav navbar-toolbar">
        <li>
            <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </li>
        <li class="dropdown mega-menu">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:;">{{Session::get('shop_name')}}</a>
            <div class="dropdown-menu">
                <div class="dropdown-arrow"></div>
                <div class="mega-toolbar-menu">

                    @foreach(backoffice_my_shops() as $item)

                        @if($loop->index%3==0 && !$loop->first)
                            </div>
                        @endif

                        @if($loop->index%3==0)
                        <div class="d-flex">
                        @endif

                        <a class="mega-toolbar-item" href="{{route('b.get.selectshop',['shop'=>$item->id])}}">
                            <div class="item-icon"><i class="ti-shopping-cart-full"></i></div>
                            <div class="item-name">{{$item->name}}</div>
                            <div class="item-text">{{$item->address}}</div>
                            <div class="item-details">Cambiar tienda</div>
                        </a>


                    @endforeach


                </div>
            </div>
        </li>
    </ul>
    <!-- END TOP-LEFT TOOLBAR-->
    <!--LOGO-->
    <!--<a class="page-brand" href="{{route('b.dashboard')}}">{{ substr(Session::get('shop_name'),0,1)}}</a>-->
    <!-- START TOP-RIGHT TOOLBAR-->
    <ul class="nav navbar-toolbar">
        <li class="dropdown dropdown-user">
            <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                <!--<div class="admin-avatar">
                    <img src="{{asset('themes/admin2/img/users/admin-image.png')}}" alt="image" />
                </div>-->
                <span>{{backpack_user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                <div class="dropdown-arrow"></div>
                <div class="dropdown-header">
                    <div class="admin-avatar">
                        <img src="{{asset('themes/admin2/img/users/admin-image.png')}}" alt="image" />
                    </div>
                    <div>
                        <h5 class="font-strong text-white">{{backpack_user()->name}}</h5>
                        <div>
                            <span class="admin-badge mr-3"><i class="ti-alarm-clock mr-2"></i>30m.</span>
                            <span class="admin-badge"><i class="ti-lock mr-2"></i>Safe Mode</span>
                        </div>
                    </div>
                </div>
                <div class="admin-menu-features">
                    <a class="admin-features-item" href="javascript:;"><i class="ti-user"></i>
                        <span>PERFIL</span>
                    </a>
                    <a class="admin-features-item" href="javascript:;"><i class="ti-support"></i>
                        <span>SOPORTE</span>
                    </a>
                    <a class="admin-features-item" href="javascript:;"><i class="ti-settings"></i>
                        <span>CONFIGURACION</span>
                    </a>
                </div>

                <div class="admin-menu-content">
                    <div class="text-muted mb-2">Your Wallet</div>
                    <div><i class="ti-wallet h1 mr-3 text-light"></i>
                        <span class="h1 text-success"><sup>$</sup>12.7k</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <a class="text-muted" href="javascript:;">Earnings history</a>
                        <a class="d-flex align-items-center" href="{{route('b.logout')}}">Salir<i class="ti-shift-right ml-2 font-20"></i></a>
                    </div>
                </div>
            </div>
        </li>
        <!--
        <li class="timeout-toggler">
            <a class="nav-link toolbar-icon" data-toggle="modal" data-target="#session-dialog" href="javascript:;"><i class="ti-alarm-clock timeout-toggler-icon rel"><span class="notify-signal"></span></i></a>
        </li>
        <li class="dropdown dropdown-notification">
            <a class="nav-link dropdown-toggle toolbar-icon" data-toggle="dropdown" href="javascript:;"><i class="ti-bell rel"></i>
                <span class="envelope-badge">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                <div class="dropdown-arrow"></div>
                <div class="dropdown-header text-center">
                    <div>
                        <span class="font-18"><strong>14 Nuevas</strong> Notificaciones</span>
                    </div>
                    <a class="text-muted font-13" href="javascript:;">ver todas</a>
                </div>
                <div class="p-3">
                    <ul class="timeline scroller" data-height="320px">
                        <li class="timeline-item"><i class="ti-check timeline-icon"></i>2 Issue fixed<small class="float-right text-muted ml-2 nowrap">Just now</small></li>
                        <li class="timeline-item"><i class="ti-announcement timeline-icon"></i>
                            <span>7 new feedback
                                        <span class="badge badge-warning badge-pill ml-2">important</span>
                                    </span><small class="float-right text-muted">5 mins</small></li>
                        <li class="timeline-item"><i class="ti-truck timeline-icon"></i>25 new orders sent<small class="float-right text-muted ml-2 nowrap">24 mins</small></li>
                        <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>12 New orders<small class="float-right text-muted ml-2 nowrap">45 mins</small></li>
                        <li class="timeline-item"><i class="ti-user timeline-icon"></i>18 new users registered<small class="float-right text-muted ml-2 nowrap">1 hrs</small></li>
                        <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>
                            <span>Server Error
                                        <span class="badge badge-success badge-pill ml-2">resolved</span>
                                    </span><small class="float-right text-muted">2 hrs</small></li>
                        <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>
                            <span>System Warning
                                        <a class="text-purple ml-2">Check</a>
                                    </span><small class="float-right text-muted ml-2 nowrap">12:07</small></li>
                        <li class="timeline-item"><i class="fa fa-file-excel-o timeline-icon"></i>The invoice is ready<small class="float-right text-muted ml-2 nowrap">12:30</small></li>
                        <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>5 New Orders<small class="float-right text-muted ml-2 nowrap">13:45</small></li>
                        <li class="timeline-item"><i class="ti-arrow-circle-up timeline-icon"></i>Production server up<small class="float-right text-muted ml-2 nowrap">1 days ago</small></li>
                        <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>Server overloaded 91%<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                        <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>Server error<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <a class="nav-link quick-sidebar-toggler">
                <span class="ti-align-right"></span>
            </a>
        </li>-->
    </ul>
    <!-- END TOP-RIGHT TOOLBAR-->
</header>
<!-- END HEADER-->
<!-- START SIDEBAR-->
<nav class="page-sidebar">
    <ul class="side-menu metismenu scroller">
        <li>
            <a href="javascript:;"><i class="sidebar-item-icon ti-home"></i>
                <span class="nav-label">Dashboards</span><i class="fa fa-angle-left arrow"></i></a>
            <ul class="nav-2-level collapse">
                <li>
                    <a href="{{route('b.dashboard')}}">Ventas & Reservas</a>
                </li>
            </ul>
        </li>

        @include('backoffice.partials.admin2._menu_role')


        <li class="heading">ACCESOS RAPIDOS</li>
        <!--<li>
            <a target="_blank" href="{{route('shop.redirect',['id'=>session('shop_id')])}}"><i class="sidebar-item-icon ti-shopping-cart"></i>
                <span class="nav-label">Tienda online</span>
            </a>
        </li>-->
        <li>
            <a href="{{route('b.logout')}}"><i class="sidebar-item-icon ti-lock"></i>
                <span class="nav-label">Desconectarme</span>
            </a>
        </li>
    </ul>
</nav>
<!-- END SIDEBAR-->
