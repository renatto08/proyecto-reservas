@extends('backoffice.layout_admin2')
@section('title', isset($title) ? $title : 'Reservas')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in">

        @if(isset($status) && $status=='venta')
        <!-- graficos -->
        <div class="row mb-4">

        <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="42" data-bar-color="#18C5A9" data-size="80" data-line-width="8">
                            <span class="easypie-data font-26 text-success"><i class="ti-money"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-success" id="sum_sell">0</h3>
                            <div class="text-muted">TOTAL VENTAS</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="73" data-bar-color="#5C6BC8" data-size="80" data-line-width="8">
                            <span class="easypie-data text-primary" style="font-size:32px;"><i class="la la-calculator"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-primary" id="total_sell">0</h3>
                            <div class="text-muted">NUMERO DE VENTAS</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--<div class="col-lg-3 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="70" data-bar-color="#ff4081" data-size="80" data-line-width="8">
                            <span class="easypie-data text-pink" style="font-size:32px;"><i class="ti-wallet"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-pink" id="sum_sell_flete">0</h3>
                            <div class="text-muted">TOTAL CON FLETE</div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-lg-4 col-md-6">
                <div class="card mb-4">
                    <div class="card-body flexbox-b">
                        <div class="easypie mr-4" data-percent="70" data-bar-color="#349ADD" data-size="80" data-line-width="8">
                            <span class="easypie-data text-blue" style="font-size:32px;"><i class="ti-receipt"></i></span>
                        </div>
                        <div>
                            <h3 class="font-strong text-blue" id="sum_sell_without_flete">0</h3>
                            <div class="text-muted">TOTAL SIN FLETE</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- .graficos -->
        @endif


        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">{{ isset($title) ? $title: 'RESERVAS'}}

                @if(backpack_user()->hasrole('administrador') || backpack_user()->hasrole('coord-ventas') || backpack_user()->hasrole('ventas'))

                    @if(isset($sell))
                        <a class="pull-right btn btn-rounded btn-sm btn-primary btn-air" href="{{route('orders.create_sell')}}"><i class="fa fa-plus"></i> Nueva Venta</a>
                    @else
                        <a class="pull-right btn btn-rounded btn-sm btn-primary btn-air" href="{{route('orders.create')}}"><i class="fa fa-plus"></i> Nueva Reserva</a>
                    @endif
                @endif    

                </h5>
                <div class="row mb-4" style="display:none;">
                    <div class="form-group mb-4 col-sm-4 col-12">
                        <label class="mb-0 mr-2">Cliente:</label>

                        <select class="form-control form-control-solid" data-live-search="true" id="client_id" name="client_id" data-width="100%">
                            <option value="">---TODOS---</option>
                        </select>
                    </div>


                    @if($status!='me_reservas')
                    <div class="form-group mb-4 col-sm-4">

                    <label class="mb-0 mr-2">Campaña:</label>
                    <select class="selectpicker show-tick form-control" id="filter_campaign" title="Campañas" data-width="100%">
                        <option value="">---TODOS---</option>
                        @foreach($campaigns as $campaign)
                            @if($campaign->id == $max_campaing)
                                <option value="{{$campaign->id}}" selected>{{strtoupper($campaign->name)}}</option>
                            @else
                                <option value="{{$campaign->id}}">{{strtoupper($campaign->name)}}</option>
                            @endif    
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group mb-4 col-sm-4 col-12">

                        <label class="mb-0 mr-2">Pago:</label>
                        <select class="selectpicker show-tick form-control" id="filter_pago" title="Pago"  data-width="100%">
                            <option value="">---TODOS---</option>
                            <option value="EFECTIVO">EFECTIVO</option>
                            <option value="TARJETA">TARJETA</option>
                            <option value="DEPOSITO">DEPOSITO</option>
                        </select>
                    </div>

                    <div class="form-group mb-4 col-sm-4 col-12" id="container_bank">
                        <label class="mb-0 mr-2">Banco</label>
                        <select class="selectpicker show-tick form-control" name="name_bank" id="name_bank">
                            <option value="">---TODOS---</option>
                            <option value="NINGUNO">NINGUNO</option>
                            <option value="BANCO DE CREDITO">BANCO DE CREDITO</option>
                            <option value="INTERBANK">INTERBANK</option>
                            <option value="BANCO DE LA NACION">BANCO DE LA NACION</option>
                            <option value="SCOTIABANK">SCOTIABANK</option>
                            <option value="OTROS">OTROS</option>
                        </select>
                    </div>

                    @endif


                </div>
                <div class="row">

                    @if($status!='me_reservas')
                    <div class="col-sm-3 form-group mb-4">
                        <label class="mb-0 mr-2">Fecha Desde:</label>
                        <input type="date" id="date_from" name="date_from" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group mb-4">
                        <label class="mb-0 mr-2">Fecha Hasta:</label>
                        <input type="date" id="date_to" name="date_to" class="form-control">
                    </div>

                     <!--div class="col-sm-3 form-group mb-4">
                        <label class="mb-0 mt-4 ml-2 mr-2 ui-switch switch-icon switch-large switch-outline">
                            FLETE
                            <input type="checkbox" id="check_flete">
                            <span></span>
                        </label>
                     </div>-->
                    @endif
                    <div class="col-sm-3 form-group mb-4" style="display:none;">
                        <button class="mt-4 btn btn-success btn-block" type="button" id="btn_filter"><i class="fa fa-search"></i> Filtrar</button>
                    </div>
                </div>




                <div class="table-responsive row">
                    <!--<table class="table table-bordered table-hover" id="orders-t2able">
                        <thead class="thead-default thead-lg">
                        <tr>
                            <th>Reserva ID</th>
                            <th>Cliente</th>
                            <th>Precio Total</th>
                            <th>Estado</th>
                            <th>Campaña</th>
                            <th>Enviado</th>
                            <th class="no-sort"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservas as $row)
                            <tr>
                                <td>
                                    <a href="{{route('orders.show',$row->id)}}">{{$row->serie}}</a>
                                </td>
                                <td>{{$row->client->first_name}} {{$row->client->last_name}}</td>
                                <td>{{$row->total}}</td>
                                <td>
                                    <span class="badge badge-success badge-pill">{{$row->status}}</span>
                                </td>
                                <td>{{$row->campaign->name}}</td>
                                <td>{{$row->created_at->diffForHumans()}}</td>
                                <td>
                                    @if(isset($sell))
                                        @if($status=='venta')
                                            <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Ver Venta" href="{{route('orders.show',$row->id)}}"><i class="ti-eye"></i></a>
                                            <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Imprimir" target="_blank" href="{{route('orders.print',$row->id)}}"><i class="ti-printer"></i></a>
                                        @else
                                            <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Generar venta" href="{{route('orders.sell',$row->id)}}"><i class="ti-shopping-cart"></i></a>
                                            <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Editar reserva" href="{{route('orders.sell',['order'=>$row->id,'edit'=>true])}}"><i class="ti-pencil"></i></a>
                                            <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" title="Imprimir" target="_blank" href="{{route('orders.print',$row->id)}}"><i class="ti-printer"></i></a>
                                            <form method="POST" action="{{route('orders.destroy',$row->id)}}">
                                                <input type="hidden" name="_method" id="_method" value="DELETE">
                                                {{csrf_field()}}
                                                <button data-toggle="tooltip" title="Anular Reserva" class="btn btn-outline-secondary btn-sm" type="submit" class=""><i class="ti-trash"></i></button>
                                            </form>

                                        @endif
                                    @else
                                        <a class="text-muted font-16" data-toggle="tooltip" title="Ver Reserva" href="{{route('orders.show',$row->id)}}"><i class="ti-eye"></i></a>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>-->

                    <table class="table table-bordered table-hover" id="orders-table">
                        <thead class="thead-default thead-lg">
                        <tr>
                            <th>Reserva ID</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                            <th>Descuento</th>
                            <th>Precio Total</th>
                            <th>Fecha creación</th>
                            <th class="no-sort"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@push('after_scripts')
    <script>

        function get_totals(){
            var filter_client_id = $("#client_id").val();
            var filter_campaign =  $("#filter_campaign").val();
            var filter_pago =  $("#filter_pago").val();
            var filter_name_bank =  $("#name_bank").val();
            var filter_date_from =  $("#date_from").val();
            var filter_date_to =  $("#date_to").val();
            var filter_check_flete = 0; //$("#check_flete").prop('checked') ? 1 : 0;

            $.get("{{route('orders.received_total')}}?{{isset($status)?'status='.$status : 'status='}}&{{isset($sell)?'sell=true':'sell=false'}}&filter_client_id="+filter_client_id+'&filter_campaign='+filter_campaign+'&filter_pago='+filter_pago+'&filter_name_bank='+filter_name_bank+'&filter_date_from='+filter_date_from+'&filter_date_to='+filter_date_to+'&filter_check_flete='+filter_check_flete).then(function (res) {
              $("#total_sell").text(res.total_sell).fadeOut().fadeIn();
              $("#sum_sell").text('S/.' + (res.sum_sell)).fadeOut().fadeIn();
              $("#sum_sell_flete").text('S/.' +(res.sum_sell_flete)).fadeOut().fadeIn();
              $("#sum_sell_without_flete").text('S/.' + (res.sum_sell_without_flete)).fadeOut().fadeIn();
            });
        }
        $(function() {
            get_totals();
            var table = $('#orders-table').DataTable({
                language: TRANSLATION_DATATABLE,
                processing: true,
                serverSide: true,
                scrollX: true,
                searching:false,
                ajax: {
                    data:function( data){
                        data.filter_client_id = $("#client_id").val();
                        data.filter_campaign =  $("#filter_campaign").val();
                        data.filter_pago =  $("#filter_pago").val();
                        data.filter_name_bank =  $("#name_bank").val();
                        data.filter_date_from =  $("#date_from").val();
                        data.filter_date_to =  $("#date_to").val();
                        data.filter_check_flete =  $("#check_flete").prop('checked') ? 1 : 0;
                    },
                    url: '{{route('orders.received')}}?{{isset($status)?'status='.$status.'&' : ''}}{{isset($sell)?'sell=true':''}}'
                },
                columns: [
                    {data:'serie'},
                    {data:'flete_address'},
                    {data:'status'},
                    {data:'amount_discount_aditional'},
                    {data:'total'},
                    {data:'created_at'},
                    {data:'actions'}
                ],
                order: [[0,'desc']],
                responsive: true
            });

            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.search($(this).find('option:selected').text()).draw();
            });

            $("#btn_filter").on('click',function (e) {
                e.preventDefault();
                get_totals();
                table.draw()
            });

            $("#client_id").select2({
                ajax: {
                    url: '{{route('clients.search')}}',
                    dataType: 'json',
                    delay: 500,
                    processResults: function(data){
                        data.results.unshift({text: '---TODOS---',id:0})
                        return {
                            results: data.results
                        };
                    }
                }
            });

            $('.easypie').each(function(){
                $(this).easyPieChart({
                    trackColor: $(this).attr('data-trackColor') || '#f2f2f2',
                    scaleColor: false,
                });
            });


            $("#container_bank").hide();

            $("#filter_pago").on('change',function(e){
                $("#name_bank").val('');
                $('#name_bank').selectpicker('refresh')
                if(e.target.value=='DEPOSITO'){
                    $("#container_bank").fadeIn('fast');
                }else{
                    $("#container_bank").fadeOut('fast');
                }
            })
        });
    </script>
@endpush

