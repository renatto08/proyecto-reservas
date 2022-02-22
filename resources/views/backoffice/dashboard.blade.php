@extends('backoffice.layout_admin2')
@section('title','Dashboard de Ventas')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="73" data-bar-color="#18C5A9" data-size="80" data-line-width="8">
                            <span class="easypie-data text-success" style="font-size:28px;"><i class="ti-shopping-cart"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-success">{{$count_reserva}}</h3>
                            <div class="text-muted">RESERVAS ENVIADAS</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="42" data-bar-color="#5c6bc0" data-size="80" data-line-width="8">
                            <span class="easypie-data text-primary" style="font-size:32px;"><i class="la la-money"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-primary">S/.{{ number_format($count_venta,2)}}</h3>
                            <div class="text-muted">MIS VENTAS</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="70" data-bar-color="#ff4081" data-size="80" data-line-width="8">
                            <span class="easypie-data text-pink" style="font-size:32px;"><i class="la la-users"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-pink">{{$count_cliente}}</h3>
                            <div class="text-muted">MIS CLIENTES</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-xl-8">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-body">
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <h3 class="m-0">Sales Analytics</h3>
                                <div>Your shop sales analytics</div>
                            </div>
                            <ul class="nav nav-pills nav-pills-rounded nav-pills-air" id="sales_tabs">
                                <li class="nav-item ml-1">
                                    <a class="nav-link active" data-toggle="tab" data-id="1" href="javascript:;">This Week</a>
                                </li>
                                <li class="nav-item ml-1">
                                    <a class="nav-link" data-toggle="tab" data-id="2" href="javascript:;">Last Week</a>
                                </li>
                                <li class="nav-item ml-1">
                                    <a class="nav-link" data-toggle="tab" data-id="3" href="javascript:;">Last Year</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <canvas id="sales_chart_1" style="height:260px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="ibox ibox-fullheight" style="min-height:400px;">
                    <div class="ibox-head">
                        <div>
                            <div class="ibox-title">Weekly Profit</div><small class="text-lighter">24.02 - 24.09</small></div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"><i class="la la-upload"></i>Export</a>
                                <a class="dropdown-item"><i class="la la-file-excel-o"></i>Download</a>
                                <a class="dropdown-item"><i class="la la-print"></i>Print</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <div class="h1 mt-4">$32,400<sup>.60</sup><i class="ti-stats-up float-right text-success" style="font-size:40px;"></i></div>
                        <div class="text-lighter">26% Higher then last week</div>
                        <div class="abs-bottom">
                            <canvas id="revenue_chart" style="height:220px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-xl-7">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">ULTIMAS ORDENES</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('orders.create')}}"> <i class="ti-pencil"></i>Nuevo</a>
                                <a class="dropdown-item" href="{{route('b.inventary.index')}}" > <i class="ti-pencil-alt"></i>Inventario</a>
                                <a class="dropdown-item"> <i class="ti-close"></i>Ocultar</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <span class="flexbox mr-3">
                                    <span class="mr-2 text-muted">Ventas</span>
                                    <span class="h3 mb-0 text-primary font-strong">{{$count_sell}}</span>
                                </span>
                                <span class="flexbox">
                                    <span class="mr-2 text-muted">Reservas</span>
                                    <span class="h3 mb-0 text-pink font-strong">{{$count_reserva}}</span>
                                </span>
                            </div>
                            <a class="flexbox" href="{{route('orders.index')}}" target="_blank">VER TODAS<i class="ti-arrow-circle-right ml-2 font-18"></i></a>
                        </div>
                        <div class="ibox-fullwidth-block">
                            <table class="table table-hover">
                                <thead class="thead-default thead-lg">
                                <tr>
                                    <th class="pl-4">Orden ID</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th class="pr-4" style="width:91px;">Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="pl-4">
                                        <a href="{{route('orders.show',$order->id)}}" target="_blank">#{{$order->serie}}</a>
                                    </td>
                                    <td>{{$order->flete_address}}</td>
                                    <td>S/.{{number_format($order->total,2)}}</td>
                                    <td>
                                        <span class="badge badge-success badge-pill">{{$order->status}}</span>
                                    </td>
                                    <td class="pr-4">{{$order->created_at->toDateString()}}</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">SISTEMA DE PAGOS</div>
                        <!--<div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                                <a class="dropdown-item"> <i class="ti-pencil-alt"></i>Edit</a>
                                <a class="dropdown-item"> <i class="ti-close"></i>Remove</a>
                            </div>
                        </div>-->
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider">
                            <li class="media">
                                <div class="media-img">
                                    <img src="{{asset('themes/adminca-8/img/logos/payment/visa.png')}}" alt="image" width="60" />
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">TARJETA
                                        <h4 class="font-strong float-right text-right"><sup>S/.</sup>{{number_format($sell_card,2)}}</h4>
                                    </div>
                                    <p class="font-13 m-0 text-light">Debito/Credito</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img">
                                    <img src="{{asset('themes/adminca-8/img/logos/payment/jcb.png')}}" alt="image" width="60" />
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">TRANSFERENCIA
                                        <h4 class="font-strong float-right text-right"><sup>S/.</sup>{{number_format($transf_card,2)}}</h4>
                                    </div>
                                    <p class="font-13 m-0 text-light">Transferencia Bancaria</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-img">
                                    <img src="{{asset('themes/adminca-8/img/logos/payment/eps.png')}}" alt="image" width="60" />
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">EFECTIVO
                                        <h4 class="font-strong float-right text-right"><sup>S/.</sup>{{number_format($effective_card,2)}}</h4>
                                    </div>
                                    <p class="font-13 m-0 text-light">Compra en el punto</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- 
        <div class="row">
            <div class="col-xl-8">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">BEST SELLERS</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                                <a class="dropdown-item"> <i class="ti-pencil-alt"></i>Edit</a>
                                <a class="dropdown-item"> <i class="ti-close"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider">
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="{{asset('themes/adminca-8/img/products/01.jpg')}}" alt="image" height="100" />
                                </a>
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">Product name</a>
                                        </h5>
                                        <div class="h4 text-success">$25</div>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla ut sint</p>
                                        <div class="font-13">
                                            <span class="mr-4">Author:
                                                <a class="text-success" href="javascript:;">@Creative</a>
                                            </span>
                                            <span class="text-light mr-4"><i class="la la-heart-o mr-2 font-16"></i>4.8</span><i class="la la-truck font-16 text-light" data-toggle="tooltip" data-original-title="Delivery"></i></div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <h3 class="mb-1 font-strong text-success"><sup>$</sup>7800</h3>
                                        <div class="text-muted">312 sales</div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="{{asset('themes/adminca-8/img/products/02.jpg')}}" alt="image" height="100" />
                                </a>
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">Product name</a>
                                        </h5>
                                        <div class="mb-2">
                                            <span class="h4 text-success mr-2">$28</span>
                                            <span class="text-muted" style="text-decoration:line-through;">$36</span>
                                        </div>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla ut sint</p>
                                        <div class="font-13">
                                            <span class="mr-4">Author:
                                                <a class="text-success" href="javascript:;">@Creative</a>
                                            </span>
                                            <span class="text-light mr-4"><i class="la la-heart-o mr-2 font-16"></i>4.7</span>
                                            <span class="text-light mr-4" data-toggle="tooltip" data-original-title="Discount 30%"><i class="la la-tags mr-2 font-16"></i>30%</span><i class="la la-truck font-16 text-light" data-toggle="tooltip" data-original-title="Delivery"></i></div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <h3 class="mb-1 font-strong text-success"><sup>$</sup>7560</h3>
                                        <div class="text-muted">270 sales</div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img src="{{asset('themes/adminca-8/img/products/03.jpg')}}" alt="image" height="100" />
                                </a>
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">Product name</a>
                                        </h5>
                                        <div class="mb-2">
                                            <span class="h4 text-success mr-2">$28</span>
                                            <span class="text-muted" style="text-decoration:line-through;">$35</span>
                                        </div>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla ut sint</p>
                                        <div class="font-13">
                                            <span class="mr-4">Author:
                                                <a class="text-success" href="javascript:;">@Creative</a>
                                            </span>
                                            <span class="text-light mr-4"><i class="la la-heart-o mr-2 font-16"></i>4.5</span>
                                            <span class="text-light" data-toggle="tooltip" data-original-title="Discount 25%"><i class="la la-tags mr-2 font-16"></i>25%</span>
                                        </div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <h3 class="mb-1 font-strong text-success"><sup>$</sup>6916</h3>
                                        <div class="text-muted">247 sales</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">POPULAR CATEGORIES</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                                <a class="dropdown-item"> <i class="ti-pencil-alt"></i>Edit</a>
                                <a class="dropdown-item"> <i class="ti-close"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider">
                            <li class="media flexbox">
                                <div>
                                    <div class="media-heading">TV & Video</div>
                                    <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                </div>
                                <h4 class="font-strong mb-0 ml-3 text-primary">+1200</h4>
                            </li>
                            <li class="media flexbox">
                                <div>
                                    <div class="media-heading">Health & Beauty</div>
                                    <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                </div>
                                <h4 class="font-strong mb-0 ml-3 text-primary">+1005</h4>
                            </li>
                            <li class="media flexbox">
                                <div>
                                    <div class="media-heading">Computers & Tablets</div>
                                    <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                </div>
                                <h4 class="font-strong mb-0 ml-3 text-primary">+880</h4>
                            </li>
                            <li class="media flexbox">
                                <div>
                                    <div class="media-heading">Jewelry and Watches</div>
                                    <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                </div>
                                <h4 class="font-strong mb-0 ml-3 text-primary">+725</h4>
                            </li>
                            <li class="media flexbox">
                                <div>
                                    <div class="media-heading">Handbags & Purses</div>
                                    <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                </div>
                                <h4 class="font-strong mb-0 ml-3 text-primary">+510</h4>
                            </li>
                            <li class="media flexbox">
                                <div>
                                    <div class="media-heading">Cameras & Photo</div>
                                    <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                </div>
                                <h4 class="font-strong mb-0 ml-3 text-primary">+323</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>--}}
        {{--
        <div class="row">
            <div class="col-xl-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">SUPPORT TICKETS</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle font-18" data-toggle="dropdown"><i class="ti-ticket"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"><i class="ti-pencil mr-2"></i>Create</a>
                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider scroller mr-2" data-height="470px">
                            <li class="media">
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">How to install new Adminca</a>
                                        </h5>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                        <div class="d-flex align-items-center font-13">
                                            <img class="img-circle mr-2" src="{{asset('themes/adminca-8/img/users/u11.jpg')}}" alt="image" width="22" />
                                            <a class="mr-2 text-success" href="javascript:;">Tyrone Carroll</a>
                                            <span class="text-muted">18 mins ago</span>
                                        </div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <span class="badge badge-primary badge-pill mb-2">Open</span>
                                        <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>2 reply</small></div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">How to compile SaSS</a>
                                        </h5>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                        <div class="d-flex align-items-center font-13">
                                            <img class="img-circle mr-2" src="{{asset('themes/adminca-8/img/users/u10.jpg')}}" alt="image" width="22" />
                                            <a class="mr-2 text-success" href="javascript:;">Stella Obrien</a>
                                            <span class="text-muted">45 mins ago</span>
                                        </div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <span class="badge badge-success badge-pill mb-2">Pending</span>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">I need help to update bower</a>
                                        </h5>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                        <div class="d-flex align-items-center font-13">
                                            <img class="img-circle mr-2" src="{{asset('themes/adminca-8/img/users/u6.jpg')}}" alt="image" width="22" />
                                            <a class="mr-2 text-success" href="javascript:;">Connor Perez</a>
                                            <span class="text-muted">1 hrs ago</span>
                                        </div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <span class="badge badge-primary badge-pill mb-2">In Progress</span>
                                        <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>2 reply</small></div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">IE7 problem</a>
                                        </h5>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                        <div class="d-flex align-items-center font-13">
                                            <img class="img-circle mr-2" src="{{asset('themes/adminca-8/img/users/u2.jpg')}}" alt="image" width="22" />
                                            <a class="mr-2 text-success" href="javascript:;">Becky Brooks</a>
                                            <span class="text-muted">2 hrs ago</span>
                                        </div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <span class="badge badge-success badge-pill mb-2">Pending</span>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="media-body d-flex">
                                    <div class="flex-1">
                                        <h5 class="media-heading">
                                            <a href="javascript:;">I need help to install Adminca Angular</a>
                                        </h5>
                                        <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                        <div class="d-flex align-items-center font-13">
                                            <img class="img-circle mr-2" src="{{asset('themes/adminca-8/img/users/u5.jpg')}}" alt="image" width="22" />
                                            <a class="mr-2 text-success" href="javascript:;">Bob Gonzalez</a>
                                            <span class="text-muted">2 days ago</span>
                                        </div>
                                    </div>
                                    <div class="text-right" style="width:100px;">
                                        <span class="badge badge-secondary badge-pill mb-2">Closed</span>
                                        <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>3 reply</small></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">LOGS TIMELINE</div>
                        <div class="ibox-tools">
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"><i class="ti-pencil"></i>Create</a>
                                <a class="dropdown-item"><i class="ti-pencil-alt"></i>Edit</a>
                                <a class="dropdown-item"><i class="ti-close"></i>Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <ul class="timeline scroller" data-height="470px">
                            <li class="timeline-item">
                                <span class="timeline-point"></span>2 Issue fixed<small class="float-right text-muted ml-2 nowrap">Just now</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-warning"></span>
                                <span>7 new feedback
                                    <span class="badge badge-warning badge-pill ml-2">important</span>
                                </span><small class="float-right text-muted">5 mins</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-primary"></span>
                                <span class="flexbox">25 new orders sent<i class="la la-truck font-16 ml-2 text-primary"></i></span><small class="float-right text-muted ml-2 nowrap">24 mins</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point"></span>12 New orders<small class="float-right text-muted ml-2 nowrap">45 mins</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-warning"></span>18 new users registered<small class="float-right text-muted ml-2 nowrap">1 hrs</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point"></span>
                                <span>Server Error
                                    <span class="badge badge-success badge-pill ml-2">resolved</span>
                                </span><small class="float-right text-muted">2 hrs</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-primary"></span>
                                <span>System Warning
                                    <a class="text-primary ml-2">Check</a>
                                </span><small class="float-right text-muted ml-2 nowrap">12:07</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-warning"></span>The invoice is ready<small class="float-right text-muted ml-2 nowrap">12:30</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-primary"></span>5 New Orders<small class="float-right text-muted ml-2 nowrap">13:45</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point"></span>
                                <span class="flexbox">Production server up<i class="la la-arrow-circle-up font-18 ml-2 text-success"></i></span><small class="float-right text-muted ml-2 nowrap">1 days ago</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point"></span>Server overloaded 91%<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                            <li class="timeline-item">
                                <span class="timeline-point bg-warning"></span>Server error<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        --}}
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@push('after_scripts')
    <script src="{{asset('themes/adminca-8/js/scripts/dashboard_ecommerce.js')}}"></script>
@endpush
