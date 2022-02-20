@extends('theme_default.layout')
@section('title','Realizar Compra')
@section('content')
    <!-- page -->
    <div class="page">
        <!-- page__header -->
        <div class="page__header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ol class="page__header-breadcrumbs breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('shop.home',['code' => $shop->code])}}">Principal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pagina Actual</li>
                        </ol>
                        <h1 class="page__header-title decor-header decor-header--align--center">Realizar Compra</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <div class="block">
                <div class="container">
                    <div class="row">
                        @if(!backpack_user())
                        <div class="col-12 mb-2">
                            <div class="alert alert-lg alert-primary">¿Soy cliente? <a href="{{route('backpack.auth.login')}}">Click para ingresar</a></div>
                        </div>
                        @endif
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card__header">
                                    <h4 class="decor-header">Detalles de facturaci&oacute;n</h4>
                                </div>
                                <div class="card__content">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="first_name">Nombres</label>
                                                <input value="{{$info['first_name']}}" type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombres">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="last_name">Apellidos</label>
                                                <input value="{{$info['last_name']}}" type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dni">DNI</label>
                                            <input maxlength="10" type="text" value="{{$info['dni']}}" name="dni" class="form-control" id="dni" placeholder="DNI">
                                        </div>
                                        <div class="form-group">
                                            <label for="checkout-country">Envio</label>
                                            <select id="checkout-country" class="form-control" disabled="disabled">
                                                <option>Seleccione una opción...</option>
                                                @foreach($fletes as $flete)
                                                    <option value="{{$flete->id}}" @if(isset($order['envio_address']) && $order['envio_address']==$flete->name) selected @endif>{{$flete->name}}</option>
                                                @endforeach
                                            </select>
                                            @if(isset($order['envio_address']) && strtolower($order['envio_address'])=='lima')
                                            <span class="help-text text-muted ">Nota: Se enviará a la dirección ingresada via Olva courier.</span>
                                            @else
                                            <span class="text-muted">Nota: Vía agencia de transportes (llegará a la oficina de la agencia en su ciudad). Nos comunicaremos con Ud. en un pazo máximo de 24 hrs.</span>
                                            @endif
                                        </div>
                                        @if(isset($order['envio_address']) && strtolower($order['envio_address'])=='lima')
                                            <div class="form-group">
                                                <label for="flete_address_text">Dirección</label>
                                                
                                                <input type="text" class="form-control" name="flete_address_text" id="flete_address_text" placeholder="Dirección">
                                            
                                            </div>
                                        @else
                                            <input type="hidden" value="" name="flete_address_text" id="flete_address_text">
                                        @endif
                                        
                                    
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input value="{{$info['email']}}" name="email" type="email" class="form-control" id="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone">Telefono</label>
                                                <input value="{{$info['phone']}}" type="text" class="form-control" name="phone" id="phone" placeholder="Telefono">
                                            </div>
                                        </div>
                                                                  
                                        <div class="form-group">
                                            <label for="comment">Nota adicional al pedido <span class="text-muted">(Opcional)</span></label>
                                            <textarea id="comment" name="comment" class="form-control" rows="4"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-5">
                            <form method="post" action="{{route('shop.buy',['code' => $shop->code])}}">
                                {{csrf_field()}}
                            <div class="card mb-0">
                                <div class="card__header">
                                    <h4 class="decor-header">Tu Orden</h4>
                                </div>
                                <div class="card__content">
                                    <table class="checkout__totals">
                                        <thead class="checkout__totals-header">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                        @foreach($order_detail as $item)
                                        <tr>
                                            <td>{{$item['product']}} × {{$item['q']}}</td>
                                            <td>S/.{{ number_format(($item['is_sale'] ? $item['price_sale']  : $item['price']) * (int) $item['q'],2)}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                        <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>S/.{{number_format($order['sub_total'],2)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Descuentos</th>
                                            @if(isset($order['descuento']))
                                            <td>S/.-{{number_format($order['descuento'],2)}}</td>
                                            @else
                                            <td>Free</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Envio</th>
                                            <td>S/.{{number_format(isset($order['envio']) ? $order['envio'] : 0,2)}}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Total</th>
                                            <td>S/.{{number_format($order['total'],2)}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="payment-methods">
                                        <ul class="payment-methods__list">
                                            <li class="payment-methods__item ">
                                                <label class="payment-methods__item-header">
                                                    <input class="payment-methods__item-radio" type="radio" name="checkout_payment_method" value="DEPOSITO">
                                                    <span class="payment-methods__item-title">Transferencia bancaria</span>
                                                </label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        Realice su pago directamente en nuestra cuenta bancaria.
                                                        Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="payment-methods__item payment-methods__item--active">
                                                <label class="payment-methods__item-header">
                                                    <input class="payment-methods__item-radio" type="radio" name="checkout_payment_method" value="TARJETA" checked>
                                                    <span class="payment-methods__item-title">Pago con tarjeta de crédito o débito</span>
                                                </label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                        Usando el servicio de culqui, usted tiene la opcion de pagar con diferentes tarjetas de debito/credito.
                                                    </div>
                                                </div>
                                            </li>
                                            <!--<li class="payment-methods__item">
                                                <label class="payment-methods__item-header">
                                                    <input class="payment-methods__item-radio" type="radio" name="checkout_payment_method" value="EFECTIVO">
                                                    <span class="payment-methods__item-title">Pago en efectivo</span>
                                                </label>
                                                <div class="payment-methods__item-container">
                                                    <div class="payment-methods__item-description text-muted">
                                                       Pagar cuando se recoge los productos.
                                                    </div>
                                                </div>
                                            </li>-->

                                        </ul>
                                    </div>
                                   
                                    <button type="button" id="btn-process" class="btn btn-primary btn-lg">Comprar ahora</button>
                                   
                                        <!--<a href="{{route('shop.account',['code' => $shop->code])}}" class="btn btn-primary btn-lg">Comprar ahora</a>-->
                                   
                                </div>
                            </div>
                            <!-- end card-->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page__body / end -->
    </div>
    <!-- page / end -->
@endsection
@push('after_scripts')
    <!-- Incluye Culqi Checkout en tu sitio web-->
    <script src="https://checkout.culqi.com/js/v3"></script>

    <script>
        function validar(){
            if($("#first_name").val().length==0 || $("#last_name").val().length==0 ||
                $("#email").val().length==0 || $("#phone").val().length==0 ||
                 $("#dni").val().length ==0){
                return false
            }else{
                return true;
            }
        }
        function culqi() {
            if (Culqi.token) { // ¡Objeto Token creado exitosamente!
                $('#btn-process').addClass('btn-loading').attr('disabled','disabled');
                var token = Culqi.token.id;
                var head_json = {
                    'first_name' : $("#first_name").val(),
                    'last_name' : $("#last_name").val(),
                    'email' : $("#email").val(),
                    'phone' : $("#phone").val(),
                    'dni' : $("#dni").val(),
                    'description' : $("#comment").val(),
                    'flete_address_text' : $("#flete_address_text").val(),
                };
                //alert('Se ha creado un token:' + token);
                //En esta linea de codigo debemos enviar el "Culqi.token.id"
                $.post(SHOP_API.checkout,{
                    '_token':'{{csrf_token()}}',
                'token' : token,
                'head': head_json,
                'checkout_payment_method':'TARJETA'})
                    .then(function(res){
                    //console.log(res)
                    location.href = '{{route('shop.success',['code'=>$shop->code])}}?order_id='+res.order_id
                }).fail(function (e) {
                   var me = JSON.parse(e.responseJSON.message);
                   var _message = 'Hubo problemas al procesar tu pago por favor contacte con el administrador.';
                   if(me.user_message){
                       _message = me.user_message;
                   }
                    Swal.fire({
                        icon: 'error',
                        title: 'Procesar pago...',
                        text: _message
                    });
                    $('#btn-process').removeClass('btn-loading').removeAttr('disabled');

                });
                //hacia tu servidor con Ajax
            } else { // ¡Hubo algún problema!
                // Mostramos JSON de objeto error en consola
                console.log(Culqi.error);
                alert(Culqi.error.user_message);
            }
        };

        // Configura tu llave pública
        Culqi.publicKey ='pk_live_TnYjeuxe7z6gKQc4';// 'pk_test_LH4KvVXgfda3H6Gq';
        // Configura tu Culqi Checkout
        Culqi.settings({
            title: 'Culqi Store',
            currency: 'PEN',
            description: 'Polo Culqi lover',
            amount: {{$order['total']*100}}
        });
        // Usa la funcion Culqi.open() en el evento que desees
        $('#btn-process').on('click', function(e) {
            e.preventDefault();
            if(validar()){
                // Abre el formulario con las opciones de Culqi.settings
                Culqi.open();
                culqi()

            }else{
                Swal.fire('Validacion','Por favor verifique que los campos esten completos.(Nombres/Apellidos/DNI/Email/Telefono)','error');
            }

        });

    </script>
@endpush
