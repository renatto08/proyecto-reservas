@extends('theme_default.layout')
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
                        <h1 class="page__header-title decor-header decor-header--align--center">¡Compra realizada con éxito!</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <div class="block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="card flex-grow-1 mb-0">
                                <div class="card__content">
                                    <p class="mb-4">
                                    Tu número de pedido es <strong>#{{isset($order_id) ? $order_id: '0000'}}</strong>. Por favor escríbenos vía WhatsApp o correo indicándonos tu número asignado.
                                    </p>
                                    <br>
                                    <p>Muchas gracias.</p>
                                    <a href="{{route('shop.home',['code' => $shop->code])}}" class="btn btn-primary mt-3">Seguir comprando</a>

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