@extends('backoffice.layout_admin2')
@section('title','Nuevo cambio de producto')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Nuevo cambio de producto</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">Orden Salida</div>
                    </div>
                    <form id="frm_head" class="form-info" action="javascript:;">
                        <div class="ibox-body">

                            <div class="form-group mb-4">
                                <label>Campaña</label>
                                <select class="form-control form-control-solid selectpicker" id="campaign" name="campaign">
                                    <option value="">--- SELECCIONE CAMPAÑA ---</option>
                                    @foreach($campaign as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label># SERIE</label>
                                <div class="input-group">
                                    <input type="hidden" id="order_id" name="order_id">
                                    <input placeholder="ID de venta o serie descriptiva." class="form-control" type="text" name="serie" id="serie">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" id="btn_search"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <small class="help-block">Puede buscar por el ID de venta o escribir.</small>

                            </div>
                            <p>Venta emitida el : <span class="badge badge-primary" id="date_order">-</span></p>

                            <div class="form-group mb-4">
                                <button type="button" id="send_other" class="btn btn-light btn-block"><i class="fa fa-plus"></i> Agregar detalle</button>

                                <table class="mt-2 table table-bordered table-hover" id="table_detalle">
                                    <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>#ID Producto</th>
                                        <th>Cantidad</th>
                                        <th>#ID Producto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                                <hr>
                                <p class="text-center">ó</p>
                                <hr>
                                <button type="button" id="send" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Registrar</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">Producto a cambiar</div>
                    </div>
                    <form class="form-info product-info-0" action="javascript:;">
                        <div class="ibox-body">
                            <div class="text-center mb-4">
                                <img style="width:100%;" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" class="img-responsive product_image mb-2" alt="">
                                <h4 class="card-title product__name">-</h4>
                            </div>
                            <div class="form-group mb-4">
                                <label>Atributos</label>
                                <p class="text-muted attribute_desc">-</p>
                            </div>
                            <div class="form-group mb-4">
                                <label>Cantidad</label>
                                <input type="number" class="form-control product__q">
                            </div>
                            <button class="btn btn-secondary  btn-lg btn-block" type="button" onclick="show_modal(0)" ><i class="fa fa-plus"></i> Seleccionar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ibox ibox-fullheight">
                    <div class="ibox-head">
                        <div class="ibox-title">Producto nuevo</div>
                    </div>
                    <form class="form-info product-info-1" action="javascript:;">
                        <div class="ibox-body">
                            <div class="text-center mb-4">
                                <img style="width:100%;" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" class="img-responsive product_image mb-2" alt="">
                                <h4 class="card-title product__name">-</h4>
                            </div>
                            <div class="form-group mb-4">
                                <label>Atributos</label>
                                <p class="text-muted attribute_desc">-</p>
                            </div>
                            <div class="form-group mb-4">
                                <label>Cantidad</label>
                                <input type="number" class="form-control product__q">
                            </div>
                            <button class="btn btn-secondary  btn-lg btn-block" type="button" onclick="show_modal(1)" ><i class="fa fa-plus"></i> Seleccionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal product -->
    <!-- Large modal -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio de producto</h5>
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
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table  class="table table-responsive table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Sku</th>
                                    <th>Producto</th>
                                    <th>Stock</th>
                                    <th>Seleccionar</th>
                                </tr>
                                </thead>
                                <tbody id="search_detail">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Hecho</button>
                </div>
            </div>
        </div>
    </div>
    <!-- .modal product -->
@endsection
@push('after_scripts')
    <script type="text/javascript">
        var products_searched = []
        var products_added = []
        var product_selected = [{},{}];
        var product_saved = [];
        var is_visible_stock = '{{!backpack_user()->hasRole(['empresaria','lider']) ? 1 : 0}}'
        var position_global = -1;
        var table_det = null;

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

        function show_modal(position){
            position_global = position;
            $('.bd-example-modal-lg').modal('show');
        }

        function add_product(index){
            product_selected[position_global]=products_searched[index];
            render_selected_product();
            $('.bd-example-modal-lg').modal('hide');
        }

        function render_selected_product(){
            var obj = product_selected[position_global];
            $(".product-info-"+position_global).find('.attribute_desc').text(obj.full_desc ? obj.full_desc : '-');
            $(".product-info-"+position_global).find('.product__name').text(obj.product ? obj.product.title : '-');
            $(".product-info-"+position_global).find('.product__q').val(1);

            if(obj.product && obj.product.image){
                $(".product-info-"+position_global).find('.product_image').attr('src','/storage/'+obj.product.image);
            }else{
                $(".product-info-"+position_global).find('.product_image').attr('src',"{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}");
            }
        }

        function product_has_inserted(ele){
            var _st = 'btn-primary';
            var _b =  true;
            products_added.forEach(function(_ele,index){
                console.log(ele.id,_ele.id);
                if(_b){
                    if(ele.id==_ele.id){
                        _st =  'btn-success';
                        _b = false;
                    }
                }

            });
            return _st;
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
                        '<td><button class="btn btn-sm btn-success btn-labeled btn-labeled-left btn-icon"><div class="btn-label"><i class="ti-unlock"></i></div>'+ (is_visible_stock=='1' ? (ele.stock - ele.queque) : status_stock(ele)) +'</button> '+(is_visible_stock=='1' ? '<a target="_blank" href="{{route('orders.detail_sku')}}?attribute_id='+ele.id+'" class="btn btn-sm btn-warning btn-labeled btn-labeled-left btn-icon"><div class="btn-label"><i class="ti-lock"></i></div>'+ele.queque+'</a>' : '')+'</td>' +
                        ((ele.stock - ele.queque)>0 ? '<td><button class="btn '+ product_has_inserted(ele)+' btn-sm" onclick="add_product('+index+')"><i class="fa fa-check"></i></button></td>' : '<td></td>') +
                        '</tr>');
                });
            });
        }


        function limpiar(){
            $("#send").removeAttr('disabled');
            $("#order_id").val('');
            $("#date_order").text('-');
            product_selected = [{},{}];
            product_saved = [];
            position_global = 0;
            render_selected_product()
            position_global = 1;
            render_selected_product()
            render_table();
        }

        function change_q(ev,position){
            if(!product_selected[position].id){
                ev.target.value = 0;
                return;
            }
            var stock_current = product_selected[position].stock - product_selected[position].queque;
            product_selected[position].q = parseInt( ev.target.value );
            if(product_selected[position].q<1) product_selected[position].q = 1;
            if(product_selected[position].q > stock_current) product_selected[position].q = stock_current;
            ev.target.value = product_selected[position].q;
        }

        function render_table(){
            table_det.clear();
            table_det.rows.add(product_saved);
            table_det.draw();
        }

        $(function () {
            
            table_det = $("#table_detalle").DataTable({
                responsive:true,
                searching:false,
                info:false,
                paging: false,
                data:product_saved,
                columns: [
                    {data:'product_id_one'},
                    {data:'product_q_one'},
                    {data:'product_id_two'},
                    {data:'product_q_two'},
                ]
            });

            $(".product-info-0 input.product__q").on('blur',function (e) {
               change_q(e,0);
            });

            $(".product-info-1 input.product__q").on('blur',function (e) {
                change_q(e,1);
            });

            $("#send_other").on('click',function(e){
                e.preventDefault();
                if(product_selected[0].id==null || product_selected[1].id==null){
                    swal("Validacion al registrar",'Por favor rellene todo los campos', "warning");
                    return;
                }
                product_saved.push({
                    'product_id_one' : product_selected[0].id,
                    'product_q_one' : $(".product-info-0 input.product__q").val(),
                    'product_id_two' : product_selected[1].id,
                    'product_q_two' : $(".product-info-1 input.product__q").val()
                })

                render_table();
            });

            

            $("#send").on('click',function (e) {
                e.preventDefault();

                if($("#campaign").val().length==0 || product_selected[0].id==null || product_selected[1].id==null){
                    swal("Validacion al registrar",'Por favor rellene todo los campos', "warning");
                    return;
                }
                $(this).attr('disabled','disabled');
                $.post("{{route('order_salida.store')}}",{
                    "_token": "{{csrf_token()}}",
                    "campaign_id": $("#campaign").val(),
                    "order_id" : $("#order_id").val(),
                    "serie" : $("#serie").val().trim(),
                    "detalle" : product_saved
                    /*"product_id_one" : product_selected[0].id,
                    "product_q_one" : $(".product-info-0 input.product__q").val(),
                    "product_id_two" : product_selected[1].id,
                    "product_q_two" : $(".product-info-1 input.product__q").val(),*/
                }).then(function (res) {
                    //limpiar
                   limpiar();
                    swal("Cambio realizado",'El registro se ha realizado sastifactoriamente.', "success");
                });
            });

            $("#recipient_name").on('keyup',function(e){
                if(e.keyCode === 13){
                    search_product('text','#recipient_name');
                }
            });

            $("#cmb_producto").on('change',function(e){
                if(e.target.value !=''){
                    search_product('id','#cmb_producto')
                }
            });

            $("#btn_search").on('click',function (e) {
               e.preventDefault();
                var order_id = isNaN(parseInt($("#serie").val()))? 0 : parseInt($("#serie").val());
               if(order_id==0) return false;

                $("#order_id").val('');
                $("#date_order").text('-');
                swal({
                    title: 'Consultando información',
                    text: 'Espere por favor...',
                    showConfirmButton: false,
                    allowOutsideClick: false
                })


                $.get('{{url("backoffice/orders")}}/'+order_id).then(function (res) {
                    $("#order_id").val(res.id);
                    $("#date_order").text(res.created_at);
                    swal.close();
                }).fail(function (e) {
                    //swal.close();
                    swal("Error al buscar",'No existe el ID de venta.', "error");
                });

            });
        });
    </script>

@endpush