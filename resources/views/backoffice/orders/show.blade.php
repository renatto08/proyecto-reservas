@extends('backoffice.layout_admin2')
@section('title','Detalle de orden')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="d-flex align-items-center mb-5">
            <span class="mr-4 static-badge badge-pink"><i class="ti-shopping-cart-full"></i></span>
            <div>
                <h5 class="font-strong">Orden #{{$order->serie}}</h5>
                <div class="text-light">{{$order->flete_address.' '}}, {{$order->status}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-5">Lista de Productos</h5>
                        <table id="detalle_tbl" class="table table-bordered table-hover">
                            <thead class="thead-default thead-lg">
                            <tr>
                                <th>SKU</th>
                                <th>PRODUCTO</th>
                                <th>DETALLE</th>
                                <th>PRECIO</th>
                                <th>QTY</th>
                                <th>TOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->detalle as $row)
                            <tr>
                                <td>{{$row->attribute->sku}}</td>
                                <td>
                                    <img class="mr-3" src="{{ asset('storage/'.$row->product->image)}}" alt="image" width="60" />{{$row->product->title}}</td>
                                <td>{{$row->attribute->full_desc}}</td>
                                <td>S/.{{ number_format($row->price_sale>0 ? $row->price_sale : $row->price,2)}}</td>
                                <td>{{$row->q}}</td>
                                @if($row->gift)
                                <td><span class="text-success">GRATIS</span></td>
                                @else
                                <td>S/.{{ number_format($row->price_sale>0 ? $row->price_sale : $row->price*$row->q,2)}}</td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <div class="text-right" style="width:300px;">
                                <div class="row mb-2">
                                    <div class="col-6">Subtotal</div>
                                    <div class="col-6" id="title_subtotal">S/.{{number_format($order->sub_total,2)}}</div>
                                </div>



                                <div class="row mb-2">
                                    <div class="col-6">Descuento</div>
                                    <div class="col-6" id="title_discount">-S/.{{number_format($order->amount_discount_aditional,2)}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">Costo de envio</div>
                                    <div class="col-6" id="title_envio">S/.{{number_format($order->flete,2)}}</div>
                                </div>
                                <div class="row font-strong font-20">
                                    <div class="col-6">Total:</div>
                                    <div class="col-6">
                                        <div class="h3 font-strong" id="title_total">S/.{{number_format($order->total,2)}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">Información de orden</h5>
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Total</div>
                            <div class="col-8 h3 font-strong text-pink mb-0">S/.{{number_format($order->total,2)}}</div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Fecha</div>
                            <div class="col-8">{{$order->created_at}}</div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Camapaña</div>
                            <div class="col-8">{{$order->campaign->name}}</div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Estado</div>
                            <div class="col-8">
                                <span class="badge badge-success badge-pill">{{$order->status}}</span>
                            </div>
                        </div>
                        @if($order->flete>0)
                        <div class="row align-items-center">
                            <div class="col-4 text-light">Lugar de Envio</div>
                            <div class="col-8">
                                <span class="badge badge-dark">{{$order->flete_address}}</span>
                            </div>
                        </div>
                        @endif
                        <div class="row align-items-center">
                            <div class="col-4 text-light">Medio de pago</div>
                            <div class="col-8">
                                <span class="badge badge-primary">{{ strtolower($order->status)==='reserva' ? 'POR CONFIRMAR' : $order->payment}}</span>
                            </div>
                        </div>
                        <div class="row mt-2 align-items-center" style="display:none;">
                            <div class="col-12">
                                <a target="_blank" class="btn btn-block btn-thick-blue btn-outline-blue btn-fix" href="{{route('orders.print',['order'=>$order->id])}}"><i class="fa fa-print"></i> Ver PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">Información de orden</h5>
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Cliente</div>
                            <div class="col-8">{{$order->client->full_name}}</div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Ciudad</div>
                            <div class="col-8">{{$order->client->city}}</div>
                        </div>
                        <!--<div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Direccion</div>
                            <div class="col-8">{{$order->client->address}}</div>
                        </div>-->
                        
                        <!--<div class="row align-items-center mb-3">
                            <div class="col-4 text-light">Email</div>
                            <div class="col-8">{{$order->client->user->email}}</div>
                        </div>-->
                        <div class="row align-items-center mb-3">
                            <div class="col-4 text-light">DNI</div>
                            <div class="col-8">{{$order->client->code}}</div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-4 text-light">Telefono</div>
                            <div class="col-8">+{{$order->client->phone}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@push('after_scripts')
    <script>
        $(function() {
            $("#detalle_tbl").DataTable({
                responsive:true,
                searching: false,
                paging: false,
                info: false
            });
        });
    </script>
@endpush

