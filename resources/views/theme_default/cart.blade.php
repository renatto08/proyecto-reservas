@extends('theme_default.layout')
@section('title','Carrito de compra')
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
                    <h1 class="page__header-title decor-header decor-header--align--center">Carrito de compra</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- page__header / end -->
    <!-- page__body -->
    <div class="page__body">
        <div class="block">
            <div class="container">
                @include('theme_default.partials._messages')

                <div class="row">
                    <div class="col-12">
                        <div class="cart">
                            <form name="update_cart" action="{{route('shop.update_cart',['code'=>$shop->code])}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="op" value="items">
                                <table class="cart__table">
                                    <thead class="cart__header">
                                    <tr>
                                        <td class="cart__column cart__column--image">Imagen</td>
                                        <td class="cart__column cart__column--info">Producto</td>
                                        <td class="cart__column cart__column--price">Precio</td>
                                        <td class="cart__column cart__column--quantity">Cantidad</td>
                                        <td class="cart__column cart__column--total">Total</td>
                                        <td class="cart__column cart__column--remove"></td>
                                    </tr>
                                    </thead>
                                    <tbody class="cart__body">

                                    @foreach($products as $prod)
                                        <?php
                                            $prod_cart  = shop_get_cart($shop->code,$prod->id);
                                        ?>
                                    <tr>
                                        <td class="cart__column cart__column--image">
                                            <input type="hidden" name="category[]" value="{{$prod->category->name}}">
                                            <input type="hidden" name="title[]" value="{{$prod->title}}">
                                            <input type="hidden" name="price[]" value="{{$prod->price}}">
                                            <input type="hidden" name="price_sale[]" value="{{$prod->price_sale}}">
                                            <input type="hidden" name="is_sale[]" value="{{$prod->is_sale}}">
                                            <input type="hidden" name="image[]" value="{{Storage::url($prod->image)}}">
                                            <a href="{{route('shop.product', ['code'=>$shop->code,'product_id'=>$prod->id,'slug'=>$prod->slug])}}">
                                                @if(isset($prod->image) && $prod->image)
                                                <img srcset="{{Storage::url($prod->image)}} 1x, {{Storage::url($prod->image)}} 2x" src="{{Storage::url($prod->image)}}" alt="">
                                                @else
                                                <img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt="">
                                                @endif
                                            </a>
                                        </td>
                                        <td class="cart__column cart__column--info">
                                            <input type="hidden" name="product_id[]" id="product_id_{{$prod->id}}" value="{{$prod->id}}">
                                            <div class="cart__product-name"><a href="{{route('shop.product', ['code'=>$shop->code,'product_id'=>$prod->id,'slug'=>$prod->slug])}}">{{$prod->title}}</a></div>
                                            <select name="attribute_id[]" id="attribute_id_{{$prod->id}}" class="form-control form-control-sm cmb_attribute_product">
                                                @foreach($prod->attributes as $item)
                                                    <option @if($item->id==$prod_cart['attribute_id']) selected @endif value="{{$item->id}}" data-stock="{{$item->stock - $item->queque}}">{{$item->color->name}} - {{$item->size->size}}</option>
                                                @endforeach
                                            </select>
                                            <!--<ul class="cart__product-options">
                                                <li>Color: Gray</li>
                                                <li>Material: Aluminum</li>
                                            </ul>-->
                                        </td>
                                        <td class="cart__column cart__column--price" data-title="Price">S/.{{number_format($prod->is_sale ? $prod->price_sale : $prod->price,2)}}</td>
                                        <td class="cart__column cart__column--quantity" data-title="Quantity">
                                            <label for="quantity0" class="sr-only">Cantidad</label>
                                            <div class="form-control-number">
                                                <input name="q[]" id="q_{{$prod->id}}" onchange="change_q(event,'#attribute_id_{{$prod->id}}')" class="form-control form-control-number__input" type="number" min="1" value="{{$prod_cart['q']}}">
                                                <div class="form-control-number__add"></div>
                                                <div class="form-control-number__sub"></div>
                                            </div>
                                        </td>
                                        <td class="cart__column cart__column--total" data-title="Total">S/.{{number_format( ($prod->is_sale ? $prod->price_sale : $prod->price) * (int) $prod_cart['q'] ,2)}}</td>
                                        <td class="cart__column cart__column--remove">
                                            <button type="button" class="button-remove button-remove--lg">
                                                <svg width="10px" height="10px">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#cross-10')}}"></use>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot class="cart__footer">
                                    <tr>
                                        <td colspan="3" class="cart__column">
                                            <a href="{{route('shop.shop',['code'=>$shop->code])}}" class="btn btn-secondary">Regresar a tienda</a>
                                        </td>
                                        <td colspan="3" class="cart__column text-right">
                                            <!--<button type="submit" class="btn btn-primary">Actualizar Carrito</button>-->
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex">
                        <div class="card mb-lg-0 flex-grow-1 d-block">
                            <div class="card__header">
                                <h4 class="decor-header">Código de cupón</h4>
                            </div>
                            <div class="card__content">
                                <p>
                                    Si tiene un cupon de descuento puede ingresarlo y validar que aplica para su compra.
                                </p>
                                <form name="form_cupon" action="{{route('shop.update_cart',['code'=>$shop->code])}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="op" value="coupon">
                                    <div class="form-group">
                                        <input type="text" id="code_coupon" name="code_coupon" class="form-control" placeholder="Coupon Code" @if($coupon)value="{{ $coupon->code}}" @endif>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Aplicar cupón</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex">
                        <div class="card mb-lg-0 flex-grow-1">
                            <div class="card__header">
                                <h4 class="decor-header">Calcular Delivery</h4>
                            </div>
                            <div class="card__content">
                                <form name="form_flete" method="post" action="{{route('shop.update_cart',['code'=>$shop->code])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="op" value="shipping">
                                    <div class="form-group">
                                        <select class="form-control" name="shipping">
                                            <option>Seleccione un destino...</option>
                                            @foreach($fletes as $flete)
                                                <option value="{{$flete->id}}" @if($envio && $flete->id==$envio->id) selected @endif>{{$flete->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--<div class="form-group">
                                        <input type="text" class="form-control" placeholder="State / Country">
                                    </div>-->
                                    <!--<button type="submit" class="btn btn-primary">Actualizar</button>-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex">
                        <div class="card mb-0 flex-grow-1">
                            <div class="card__header">
                                <h4 class="decor-header">Total Compra</h4>
                            </div>
                            <div class="card__content cart-totals" id="cart__totals">
                                @include('theme_default.cart_partials.totals')
                            </div>
                        </div>
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
    <script type="text/javascript">
        function change_q(e,element){
            var stock_max = parseInt($(element).find('option:selected').data('stock'));
            if( stock_max>0 && e.target.value<=stock_max){
                $('form[name="update_cart"]').submit();
            }
        }

        function get_totals(cb){
            $.get('{{route("shop.cart",['code'=>$shop->code])}}').then(function(res){
               $("#cart__totals").html(res).fadeOut().fadeIn();
               if(cb) cb();
            });
        }

        $(function(){
           $('.button-remove').on('click',function (e) {
               $(this).parent().parent().remove();
               $('form[name="update_cart"]').submit();
           });

           $('form[name="form_cupon"]').submit(function (e) {
               e.preventDefault();
               Swal.fire({
                   title: 'Actualizando...',
                   text: 'Procesando el carrito de compra,espere por favor.',
                   showConfirmButton: false,
                   allowOutsideClick: false
               })
               $.post("{{route('shop.update_cart',['code'=>$shop->code])}}",$(this).serialize()).then(function(res){
                   get_totals(function() {
                       Swal.close();
                       if(res.alert){
                           Swal.fire({
                               title: 'Cupon',
                               text : res.message,
                                icon: res.type
                           })
                       }
                   });
               });
               return false;
           });

           $('select[name="shipping"]').change(function(e){
              if($(this).find("option:selected").val().length>0){
                  $('form[name="form_flete"]').submit();
              }
           });

            $('form[name="form_flete"]').submit(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Actualizando...',
                    text: 'Procesando el carrito de compra,espere por favor.',
                    showConfirmButton: false,
                    allowOutsideClick: false
                })
                $.post("{{route('shop.update_cart',['code'=>$shop->code])}}",$(this).serialize()).then(function(res){
                    get_totals(function() {
                        Swal.close();
                    });
                });
                return false;
            });

           $('form[name="update_cart"]').submit(function(e){
               e.preventDefault();
               Swal.fire({
                   title: 'Actualizando...',
                   text: 'Procesando el carrito de compra,espere por favor.',
                   showConfirmButton: false,
                   allowOutsideClick: false
               })
               $.post("{{route('shop.update_cart',['code'=>$shop->code])}}",$(this).serialize()).then(function(res){
                   get_totals(function(){
                       Swal.close();
                   });
               });
               return false;
           });
        });
    </script>
@endpush