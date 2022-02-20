@extends('backoffice.layout_admin2')
@section('title',isset($title) ? $title : 'Nueva Reserva')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">{{isset($title) ? $title : 'Nueva Reserva'}}</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-4">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">Detalles</div>
                    </div>
                    <form class="form-info" action="javascript:;">
                        <div class="ibox-body">

                            <div class="form-group mb-4">
                                <!--
                                <label>Cliente</label>
                                <input class="form-control" type="text" id="client_id" name="client_id">
                                -->
                                
                                @if(!backpack_user()->hasRole(['administrador','ventas','coord-ventas']))
                                    @if(!backpack_user()->hasRole('empresaria'))
                                        <label>Clientes</label>
                                        <select class="form-control form-control-solid selectpicker" data-live-search="true" id="client_id" name="client_id">
                                            <option value="{{backpack_user()->client->id}}">--- YO MISMO ---</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}" @if(isset($order->client_id) && $client->id==$order->client_id) selected @endif>{{$client->first_name}} {{$client->last_name}}</option>
                                            @endforeach
                                        </select>

                                    @else
                                        <input type="hidden" value="{{backpack_user()->client->id}}"  id="client_id" name="client_id"/>
                                    @endif
                                @else
                                    <label>Clientes</label>
                                    <select class="form-control form-control-solid" id="client_id" name="client_id">
                                        <option value="{{backpack_user()->client->id}}">--- YO MISMO ---</option>
                                        @if(isset($order) && $order->client_id)
                                            <option value="{{$order->client_id}}" selected>{{$order->client->full_name}}</option>
                                        @endif
                                        {{--@foreach($clients as $client)
                                            <option value="{{$client->id}}" @if(isset($order) && $client->id==$order->client_id) selected @endif>{{$client->first_name}} {{$client->last_name}}</option>
                                        @endforeach--}}
                                    </select>
                                @endif

                                        
                            </div>

                            <!--<div class="form-group mb-4">
                                <label>Campañas</label>
                                <select class="form-control form-control-solid selectpicker" id="campaign_id" name="campaign_id">
                                </select>
                            </div>-->


                            <div class="form-group mb-4" style="display:none;">
                                <label>Descuentos</label>
                                <select class="form-control form-control-solid selectpicker" id="discount" name="discount">
                                    <option value="">--- SELECCIONE DESCUENTO ---</option>
                                    @foreach($descuentos as $row)
                                        <option @if(isset($order) && $row->id==$order->discount) selected @endif value="{{$row->id}}" data-value="{{$row->value}}" data-value-min="{{$row->value_min}}" data-type="{{$row->type}}" data-type-coupon="{{$row->type_coupon}}">{{$row->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4" style="display:none;">
                                <label>Descuentos Oferta</label>
                                <select class="form-control form-control-solid selectpicker" id="discount_offer" name="discount_offer">
                                    <option value="">--- SELECCIONE DESCUENTO ---</option>
                                    @foreach($descuentos_oferta as $row)
                                        <option @if(isset($order) && $row->id==$order->discount_offer) selected @endif value="{{$row->id}}" data-value="{{$row->value}}" data-value-min="{{$row->value_min}}" data-type="{{$row->type}}" data-type-coupon="{{$row->type_coupon}}">{{$row->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4" style="display:none;>
                                <label for="">Metodo de pago</label>
                                <select class="form-control form-control-solid" name="payment" id="payment">
                                    <option value="EFECTIVO" selected>EFECTIVO</option>
                                    <option value="TARJETA">TARJETA</option>
                                    <option value="DEPOSITO">DEPOSITO</option>
                                </select>
                            </div>
                            <div class="form-group mb-4" id="container_bank">
                                <label for="">Banco</label>
                                <select class="form-control form-control-solid" name="name_bank" id="name_bank">
                                    <option value="NINGUNO" selected>NINGUNO</option>
                                    <option value="BANCO DE CREDITO">BANCO DE CREDITO</option>
                                    <option value="INTERBANK">INTERBANK</option>
                                    <option value="BANCO DE LA NACION">BANCO DE LA NACION</option>
                                    <option value="SCOTIABANK">SCOTIABANK</option>
                                    <option value="OTROS">OTROS</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label>Enviar a</label>
                                <select class="form-control form-control-solid " id="flete" name="flete">
                                    <option value="" data-price="0">--- NINGUNO---</option>
                                    @foreach($fletes as $flete)
                                        <option @if(isset($order) && $flete->name==$order->flete_address) selected @endif value="{{$flete->name}}" data-price="{{$flete->price}}">{{$flete->name}}</option>
                                    @endforeach
                                </select>

                                @if(isset($sell) && $sell && strtolower($status)=='venta')
                                <input value="{{isset($order) ? $order->flete_address : ''}}" class="form-control mt-2" type="text" id="flete_address" name="flete_address" placeholder="Direccion de envio">
                                <p class="help-block">Escriba una direccion mas exacta.</p>
                                @else
                                <input value="{{isset($order) ? $order->flete_address : ''}}" type="hidden" id="flete_address" name="flete_address">

                                @endif
                            </div>



                            @if(backpack_user()->hasRole(['administrador','ventas','coord-ventas']))
                                <div class="form-group mb-4">
                                    <label for="amount_discount_aditional">Descuento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">S/.</div>
                                        <input placeholder="0.00" value="@if(isset($order)){{$order->amount_discount_aditional}}@else{{0}}@endif" type="number" step="0.01" class="form-control" name="amount_discount_aditional" id="amount_discount_aditional">
                                    </div>
                                </div>


                            <div class="form-group mb-0" style="display:none;">
                                <label>Descuento automatico</label>
                                <div>
                                    <label class="radio radio-inline radio-info">
                                        <input type="radio" value="1" name="discount_automatic" checked="">
                                        <span class="input-span"></span>Si</label>
                                    <label class="radio radio-inline radio-info">
                                        <input type="radio"  value="0" name="discount_automatic">
                                        <span class="input-span"></span>No</label>
                                </div>
                            </div>
                            @else
                                <!-- no es adm o ventas -->
                                    <input style="display: none;" type="radio" value="1" name="discount_automatic" checked />
                                <!--<input type="hidden" id="discount_automatic" name="discount_automatic" value="1">-->
                                <input type="hidden" id="amount_discount_aditional" name="amount_discount_aditional" value="0">
                            @endif

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-5">Lista de productos
                            <button type="button" class="btn btn-primary btn-air pull-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Agregar</button>
                        </h5>
                        <div id="content_detail">

                        </div>
                        <!--
                        <table id="table-new-order" class="table table-responsive table-bordered table-hover">
                            <thead class="thead-default thead-lg">
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>QTY</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody id="tbl_detail">
                            </tbody>
                        </table>-->
                        <div class="d-flex justify-content-end">
                            <div class="text-right" style="width:400px;">
                                <div class="row mb-2">
                                    <div class="col-6">Subtotal</div>
                                    <div class="col-6" id="title_subtotal">S/.0.0</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">Subtotal Oferta</div>
                                    <div class="col-6" id="title_subtotal_offer">S/.0.0</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">Descuento</div>
                                    <div class="col-6" id="title_discount">-S/.0.0</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">Descuento Oferta</div>
                                    <div class="col-6" id="title_discount_offer">-S/.0.0</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">Descuento Adicional</div>
                                    <div class="col-6" id="title_discount_aditional">-S/.0.0</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">Costo de envio</div>
                                    <div class="col-6" id="title_envio">S/.0.0</div>
                                </div>
                                <div class="row font-strong font-20">
                                    <div class="col-6">Total:</div>
                                    <div class="col-6">
                                        <div class="h3 font-strong" id="title_total">S/.0.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-footer">
                        @if(isset($edit) && $edit)
                            <button class="btn btn-info mr-2" type="button" onclick="send_order(event)"><i class="ti-pencil"></i> Actualizar {{$status}}</button>
                        @else
                            <button class="btn btn-info mr-2" type="button" onclick="send_order(event)">Enviar {{$status}}</button>
                        @endif

                        <a class="btn btn-secondary" href="{{route('orders.index')}}" >Regresar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end START PAGE CONTENT-->

    <!-- modal product -->
    <!-- Large modal -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sku/Producto</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="recipient_name" name="recipient_name" placeholder="Buscar por Sku">
                                <div class="input-group-prepend">
                                    <button type="button" onclick="search_product('text','#recipient_name')" class="btn btn-outline-secondary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="message-text" class="col-form-label">Producto</label>
                            <div class="input-group mb-3">
                                <select name="cmb_producto" id="cmb_producto" class="form-control selectpicker" data-live-search="true" >
                                    <option value="">--Selecione--</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->title}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-prepend">
                                    <button onclick="search_product('id','#cmb_producto')" type="button" class="btn btn-outline-secondary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table  class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sku</th>
                                        <th>Producto</th>
                                        <th>Stock</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody id="search_detail">
                                    <!--<tr>
                                        <td>123</td>
                                        <td>Blusa</td>
                                        <td>rojo</td>
                                        <td>small</td>
                                        <td>50</td>
                                        <td><button class="btn btn-primary btn-sm add-click"><i class="fa fa-check"></i></button></td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hecho</button>
                </div>
            </div>
        </div>
    </div>
    <!-- .modal product -->
@endsection
@push('after_scripts')
<script>
    var products_searched = []
    var products_added = []
    var is_visible_stock = '{{!backpack_user()->hasRole(['empresaria','lider']) ? 1 : 0}}'
    var resumen = {
        //descuentos
        amount_discount_aditional:0,
        amount_discount: 0,
        amount_discount_offer: 0,
        flete: 0 ,
        flete_address : '',
        discount_offer: '',
        discount: '',
        payment:'',
        name_bank:'',
        subtotal_offer:0,
        total_offer: 0,
        subtotal:0,
        total:0
    }

    function status_stock(ele){
        var _crr = ele.stock - ele.queque;
        if( _crr == 0){
            //return '<span class="badge badge-danger">'+ele.stock+'</span>';
            return 'Agotado'
        }else if(_crr < ele.alert_stock){
            //return '<span class="badge badge-warning">'+ele.stock+'</span>';
            return 'Bajo stock'
        }else{
            //return '<span class="badge badge-success">'+ele.stock+'</span>';
            return 'Disponible';
        }

    }

    function product_has_inserted(ele){
        var _st = 'btn-primary';
        var _b =  true;
        products_added.forEach(function(_ele,index){
            if(_b){
                if(ele.id==_ele.id){
                    _st =  'btn-success';
                    _b = false;
                }
            }

        });
        return _st;
    }

    function class_button_stock(is_visible,ele){
        button_status = 'btn_success'

        var _crr = ele.stock - ele.queque;
        if( _crr == 0){
            //return '<span class="badge badge-danger">'+ele.stock+'</span>';
            button_status= 'btn-danger'
        }else if(_crr < ele.alert_stock){
            //return '<span class="badge badge-warning">'+ele.stock+'</span>';
            button_status= 'btn-warning'
        }else{
            //return '<span class="badge badge-success">'+ele.stock+'</span>';
            button_status= 'btn-success';
        }

        cls = 'btn btn-sm '+button_status+ (is_visible==1 ? ' btn-labeled btn-labeled-left btn-icon':'');
        return cls;
    }

    function search_product(type,q) {
        if($(q).val().length==0) return false;
        $("#search_detail").html('<tr><td colspan="6">Buscando...</td></tr>');
        products_searched = [];
        $.get('/backoffice/api/search_product?shop_id={{$shop_id}}&type='+type+'&q='+$(q).val()).then(function (res) {
            products_searched = res;
            $("#search_detail").html('');
            res.forEach(function (ele,index) {
               $("#search_detail").append('<tr>' +
                   '<td>'+ele.sku+'</td>' +
                   '<td>'+ele.product.title+
                   '-'+ele.color.name+
                   '-'+ele.size.size+'</td>' +
                   '<td><button class="'+class_button_stock(is_visible_stock,ele)+'">'+(is_visible_stock=='1' ? '<div class="btn-label"><i class="ti-unlock"></i></div>' : '')+ (is_visible_stock=='1' ? (ele.stock - ele.queque) : status_stock(ele)) +'</button> '+(is_visible_stock=='1' ? '<a target="_blank" href="{{route('orders.detail_sku')}}?attribute_id='+ele.id+'" class="btn btn-sm btn-warning btn-labeled btn-labeled-left btn-icon"><div class="btn-label"><i class="ti-lock"></i></div>'+ele.queque+'</a>' : '')+'</td>' +
                   ((ele.stock - ele.queque)>0 ? '<td><button class="btn '+ product_has_inserted(ele)+' btn-sm" onclick="add_product('+index+',this)"><i class="fa fa-check"></i></button></td>' : '<td></td>') +
                   '</tr>');
            });
        });
    }

    function retrieve_detail(order_id){
        swal({
            title: 'Consultando información',
            text: 'Espere por favor...',
            showConfirmButton: false,
            allowOutsideClick: false
        })
        resumen.flete_address = '{{ isset($order) ? $order->flete_address : ''}}';
        calculate();
        $.get('/backoffice/api/detail_order?id='+order_id)
            .then(function(res){
                res.forEach(function (item,index) {
                    item.id = parseInt(item.attribute_id);
                    item.attribute_id = parseInt(item.attribute_id);
                    item.order_id = parseInt(item.order_id);
                    item.price = parseFloat(item.price);
                    item.price_sale = parseFloat(item.price_sale);
                    item.product_id = parseInt(item.product_id);
                    item.product.price = parseFloat(item.product.price);
                    item.product.price_sale = parseFloat(item.product.price_sale);
                    item.q = parseInt(item.q);
                    item.gift = parseInt(item.gift);
                    products_added.push(item);
                });
                swal.close();
                render();
                calculate();

            });
    }

    function add_product(i,e){

        if(products_searched.length>0){
            //valid is stock
            let stock_current = products_searched[i].stock - products_searched[i].queque;
            if(products_searched[i].q && products_searched[i].q>=stock_current){
                return false;
            }

            //add box
            let obj =  _.find(products_added,function(obj){ return obj.id ===  products_searched[i].id;});
            if(!obj){
                products_searched[i].q = 1;
                products_searched[i].gift = false;
                products_added.push(products_searched[i]);
                $(e).removeClass('btn-primary').addClass('btn-success');
            }else{
                let i_add_update = _.findIndex(products_added,{id:obj.id});
                if(products_added[i_add_update].q && products_added[i_add_update].q>=stock_current){
                    return false;
                }
                products_added[i_add_update].q += 1;
            }

            render();
            calculate();

        }
    }

    function render(){
        $("#tbl_detail").html('');
        $("#content_detail").html('');

        products_added.forEach(function (item,index) {
            let total = parseInt(item.gift) ? 0 : (parseFloat(item.product.price_sale) ? parseFloat(item.product.price_sale) : parseFloat(item.product.price)) * item.q;
            /*$("#tbl_detail").append("<tr>" +
                "<td><button class='btn btn-danger btn-sm' type='button' onclick='remove_product("+index+")'><i class='fa fa-times'></i></button></td>" +
                "<td>"+item.id+"</td>" +
                "<td><img class=\"mr-3\" src=\"/storage/"+ item.product.image +"\" alt=\"image\" width=\"60\">"+item.product.title+"</td>" +
                "<td>S/."+(parseFloat(item.product.price_sale) > 0 ? "<strike class=\'text-muted text-sm mr-2\'>"+item.product.price+"</strike> " + item.product.price_sale : item.product.price ) + "</td>" +
                "<td>" +
                "<div class='btn-group'><button onclick='change_q(event,-1,"+index+")' class='btn btn-dark btn-sm'><i class='fa fa-minus'></i></button><button type='button' class='btn btn-light'>"+item.q+"</button><button onclick='change_q(event,1,"+index+")' class='btn btn-dark btn-sm'><i class='fa fa-plus'></i></button></div>" +
                "</td>" +
                "<td>S/."+total.toFixed(2).toString()+"</td>" +
                "</tr>")*/
            $("#content_detail").append('<div class="d-flex justify-content-between mb-5 pb-4" id="item_attribute_'+item.id+'">'+
                '<div class="d-flex align-items-center">'+
                //'<span class="mr-4 static-badge badge-pink">AC</span>'+
                '<img class="mr-3" src="/storage/'+ item.product.image +'" alt="image" width="60">'+
                '<div class="desc">'+
                '<h5 class="font-strong">'+item.product.title+' ('+ (item.full_desc ? item.full_desc : item.attribute.full_desc) +')</h5>'+
                '<div class="text-light">S/.'+(parseFloat(item.product.price_sale) > 0 ? '<strike class="text-muted text-sm mr-2">'+item.product.price+'</strike> ' + item.product.price_sale : item.product.price ) +'</div>'+
            '</div>'+
            '</div>'+
            '<div class="text-right" style="width: 260px;">'+

                ('{{strtolower($status)}}' == 'venta' ? '<label class="checkbox mr-2 mt-1">' +
                  '<input type="checkbox" onclick="toggleRegalo('+index+')" '+ (item.gift ? 'checked=""' :'' )+' >'+


                '                                            <span class="input-span"></span>¿Regalo?' +
                '                                        </label>' : '')+

                '<div class="btn-group mb-3">' +
                '<button class="btn btn-danger btn-sm" type="button" onclick="remove_product('+index+')"><i class="fa fa-times"></i></button>' +
                '</div>'+
                '<div class="row align-items-center mb-2">'+
                '  <div class="col"><div class="btn-group"><button class="btn btn-dark btn-sm btn-icon" onclick="change_q(event,-1,'+index+')"><span class="btn-label"><i class="fa fa-minus"></i></span></button><div class="btn btn-sm btn-outline-secondary">'+item.q+'</div><button class="btn btn-dark btn-sm btn-icon" onclick="change_q(event,1,'+index+')"><span class="btn-label"><i class="fa fa-plus"></i></span></button></div></div>'+
            //'   <div class="col-6 text-muted">Cantidad</div>'+
            //'   <div class="col-6">'+item.q+'</div>'+
            '</div>'+
            '<div class="row align-items-center">'+
                '<div class="col-6 text-muted">Total</div>'+
            '<div class="col-6">S/,'+total.toFixed(2).toString()+'</div>'+
            '</div>'+
            '</div>'+
            '</div>');
        });
    }

    function toggleRegalo(index){
        products_added[index].gift=!products_added[index].gift;
        render();
        calculate();
    }

    function remove_product(index){
        swal({
            title: 'Quitar producto',
            text: '¿Esta seguro de quitar?',
            icon: 'danger',
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: 'Si, quitarlo!',
            cancelButtonText: 'Cancelar',
            closeOnConfirm: true
        },function(){
            products_added.splice(index,1);
            render();
            calculate();
        });
    }

    function calculate(){
        resumen.subtotal = 0;
        resumen.subtotal_offer = 0;
        resumen.total = 0;
        resumen.amount_discount_offer = 0;
        resumen.amount_discount = 0;
        resumen.amount_discount_aditional = 0;
        resumen.discount = ''
        resumen.discount_offer = ''



        products_added.forEach(function (item,index) {
            let total = item.gift ? 0 : (parseFloat(item.product.price_sale) ? parseFloat(item.product.price_sale) : parseFloat(item.product.price)) * item.q;

            if(parseFloat(item.product.price_sale)>0){
                resumen.subtotal_offer +=  total;
            }else{
                resumen.subtotal +=  total;
            }

        });
        if(parseInt($("input[name='discount_automatic']:checked").val())==1){
            $("#discount").selectpicker('val','');
            $("#discount_offer").selectpicker('val','');
            //discount automatic normal
            $("#discount > option").each(function(index,ele){
                if($(this).data('value')!==undefined){
                    if(parseFloat($(this).data('valueMin')) <= resumen.subtotal){

                        $("#discount").selectpicker('val',$(this).val());
                        resumen.discount = $(this).val()

                        if($(this).data('type')=='Porcentaje'){
                            resumen.amount_discount = (parseFloat($(this).data('value')) * resumen.subtotal);
                        }else{
                            resumen.amount_discount = parseFloat($(this).data('value'));
                        }
                    }
                }
            });

            //discount automatic offer
            $("#discount_offer > option").each(function(index,ele){

                if($(this).data('value')!==undefined){
                    if(parseFloat($(this).data('valueMin')) <= resumen.subtotal_offer){
                        $("#discount_offer").selectpicker('val',$(this).val());
                        resumen.discount_offer = $(this).val()

                        if($(this).data('type')=='Porcentaje'){
                            resumen.amount_discount_offer = (parseFloat($(this).data('value')) * resumen.subtotal_offer);
                        }else{
                            resumen.amount_discount_offer = parseFloat($(this).data('value'));
                        }

                    }
                }
            });

        }else{
            //discount normal
            $discount_select =$("#discount option:selected");
            //$("#discount").selectpicker('val',$("#discount").val());
            if($("#discount").selectpicker('val')){
                resumen.discount = $("#discount").selectpicker('val')
                if($discount_select.data('type')=='Porcentaje'){
                    resumen.amount_discount = (parseFloat($discount_select.data('value')) * resumen.subtotal);
                }else{
                    resumen.amount_discount = parseFloat($discount_select.data('value'));
                }
            }
            //discont offers
            $discount_offer_select = $("#discount_offer option:selected");
            //$("#discount_offer").selectpicker('val',$("#discount_offer").val());
            if($("#discount_offer").selectpicker('val')) {
                resumen.discount_offer = $("#discount_offer").selectpicker('val')

                if ($discount_offer_select.data('type') == 'Porcentaje') {
                    resumen.amount_discount_offer = (parseFloat($discount_offer_select.data('value')) * resumen.subtotal_offer);
                } else {
                    resumen.amount_discount_offer = parseFloat($discount_offer_select.data('value'));
                }
            }
        }

        //flete

        resumen.amount_discount_aditional = $("#amount_discount_aditional").val().length>0 ? parseFloat($("#amount_discount_aditional").val()) : 0;

        resumen.flete = parseFloat($("#flete option:selected").data('price'));
        resumen.flete_address = $("#flete_address").val(); //$("#flete option:selected").val();

        //calcule total
        resumen.total  = ((resumen.subtotal_offer + resumen.subtotal) - (resumen.amount_discount + resumen.amount_discount_offer + resumen.amount_discount_aditional)) + resumen.flete

        //print
        $("#title_total").text("S/. " + resumen.total.toFixed(2).toString());
        $("#title_subtotal_offer").text("S/. " + resumen.subtotal_offer.toFixed(2).toString());
        $("#title_subtotal").text("S/. " + resumen.subtotal.toFixed(2).toString());

        $("#title_discount").text("-S/. " + resumen.amount_discount.toFixed(2).toString());
        $("#title_discount_offer").text("-S/. " + resumen.amount_discount_offer.toFixed(2).toString());
        $("#title_discount_aditional").text("-S/. " + resumen.amount_discount_aditional.toFixed(2).toString());
        $("#title_envio").text("S/. " + resumen.flete.toFixed(2).toString());
    }
    function change_q(ev,q,index){
        
        let stock_current = isNaN(products_added[index].stock) ? products_added[index].attribute.stock - products_added[index].attribute.queque : products_added[index].stock - products_added[index].queque;
        console.log(products_added[index].stock);
        console.log(stock_current);

        if (q==1){
            if(products_added[index].q > stock_current && products_added[index].stock == undefined){
                products_added[index].q--;
            }
        }        
        products_added[index].q = parseInt(products_added[index].q) + q;
        if(products_added[index].q<1) products_added[index].q = 1;
        //if(products_added[index].q > stock_current) products_added[index].q = stock_current;
 
        if(products_added[index].q > stock_current && products_added[index].stock != undefined){
            products_added[index].q = stock_current;
        }

        calculate();
        render();
    }
    function send_order(){

        @if(backpack_user()->hasRole(['administrador','ventas','coord-ventas']))
        calculate();
        render();
        @endif
        if(products_added.length>0){
            swal({
                title: 'Conectando',
                text: 'Procesando operacion,espere por favor.',
                showConfirmButton: false,
                allowOutsideClick: false
            })
            _products_process = [];
            for(let i=0;i<products_added.length;i++){
                _products_process.push({
                    id:products_added[i].id,
                    q:products_added[i].q,
                    gift:products_added[i].gift,
                    product:{
                        id: products_added[i].product.id,
                        price: products_added[i].product.price,
                        price_sale: products_added[i].product.price_sale
                    }
                })
            }
            $.post('{{route('orders.store')}}',{
                "_token" : "{{csrf_token()}}",
                "order_id" : {{isset($order) ? $order->id : 0}},
                "edit": {{isset($edit) ? ($edit ? 1 : 0) : 0}},
                "client_id" : $("#client_id").val(),
                "campaign_id" : $("#campaign_id").val(),
                "coupon_id" : $("#coupon_id").val(),
                "discount" : resumen.discount,
                "discount_offer" : resumen.discount_offer,
                "flete_address" : $("#flete_address").val(),
                "flete" : resumen.flete,
                "amount_discount_aditional" : resumen.amount_discount_aditional,
                "amount_discount" : resumen.amount_discount,
                "amount_discount_offer" : resumen.amount_discount_offer,
                "status" : '{{$status}}',
                "sub_total" : resumen.subtotal,
                "sub_total_offer" : resumen.subtotal_offer,
                "total" : resumen.total,
                "payment" : $("#payment").val(),
                "name_bank" : $("#name_bank").val(),
                "detalle" : _products_process
            }).then(function(res){
                swal.close();
                swal("{{$status}}", "Su {{$status}} fue enviada.", "success");
                @if(isset($sell) && $sell && strtolower($status)=='venta')
                    //location.href = '{{route('orders.received')}}'
                    location.href = '{{url('backoffice/orders')}}'
                @elseif(isset($edit) && $edit)
                    //location.href = '{{route('orders.received')}}'
                    location.href = '{{url('backoffice/orders')}}'
                @else
                    //location.href = '{{route('orders.received',["status"=>"venta"])}}'
                    //location.href = '{{url('backoffice/orders')}}/'+res.id;
                    location.href = '{{url('backoffice/orders')}}'
                @endif
            }).fail(function(e){
                if(e.responseJSON.message){
                    swal("{{$status}}",e.responseJSON.message, "error");
                    //bloqueamos si tiene id para dar message
                    $(".message_stock").remove();
                    $(".border.border-danger.p-2").removeClass('border border-danger p-2')
                    if(e.responseJSON.id){
                        let s = e.responseJSON.stock;
                        $("#item_attribute_"+e.responseJSON.id).addClass('border border-danger p-2');
                        $("#item_attribute_"+e.responseJSON.id).find('.desc')
                            .append('<span class="message_stock text-danger">Error, stock no disponible. Retire este producto para continuar, cant. disponible: '+ s +'</span>')
                    }
                }else{

                    swal("{{$status}}", "Ocurrio un error inesperado.Contacte con el administrador o vuelva a intentar.", "error");
                }
            });
        }else{
            swal.close();
            swal("{{$status}}", "Por favor verifique que su {{$status}} cumpla con todo los campos completados.", "error");
        }
    }

    function limpiar(){
        resumen.subtotal = 0;
        resumen.subtotal_offer = 0;
        resumen.total = 0;
        resumen.amount_discount_offer = 0;
        resumen.amount_discount = 0;

        $("#discount").selectpicker('val','');
        $("#discount_offer").selectpicker('val','');

        products_added = []
        products_searched = [];
        $("#search_detail").html('');
        calculate()
        render();
    }

    $(function() {

        //$('.bd-example-modal-lg').modal('show');
        /*$('#table-new-order').DataTable({
            pageLength: 10,
            fixedHeader: true,
            responsive: true,
            "sDom": 'rtip',
        });

        var table = $('#table-new-order').DataTable();
        $('#key-search').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('#type-filter').on('change', function() {
            table.column(4).search($(this).val()).draw();
        });*/

        $("#discount").on('change',function(){
            calculate()
        });

        $("#discount_offer").on('change',function(){
            calculate()
        });

        @if(backpack_user()->hasRole(['administrador','ventas','coord-ventas']))
            let selectClient = $("#client_id").select2({
                ajax: {
                    url: '{{route('clients.search')}}',
                    dataType: 'json',
                    delay: 500
                }
            });
        @endif

        $("#recipient_name").on('keyup',function(e){
            if(e.keyCode === 13){
                search_product('text','#recipient_name');
            }
        });

        $("#container_bank").hide();

        $("#payment").on('change',function(e){
            $("#name_bank").val('NINGUNO');
            if(e.target.value=='DEPOSITO'){
                $("#container_bank").fadeIn('fast');
            }else{
                $("#container_bank").fadeOut('fast');
            }
        })

        $("#cmb_producto").on('change',function(e){
            if(e.target.value !=''){
                search_product('id','#cmb_producto')
            }
        });
        $("#flete").on('change',function (e) {
            $("#flete_address").val('');
            if(e.target.value.length>0){
                $("#flete_address").val($(this).find('option:selected').text())
            }

           calculate();
        });

        $("#amount_discount_aditional").on('keyup',function (e) {
            e.preventDefault();
            calculate();
        });

        $("#amount_discount_aditional").on('blur',function (e) {
            if($(this).val().length==0){
                $(this).val(0);
                return false;
            }
        });
        calculate();

        //get detalle
        @if(isset($sell) && $sell && strtolower($status)=='venta')
            retrieve_detail({{$order->id}});
        @endif

        @if(isset($edit) && $edit)
            retrieve_detail({{$order->id}});
        @endif
    });
</script>
@endpush
