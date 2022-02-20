@extends('theme_default.layout')
@section('title',isset($q) ? 'Resultado de la busqueda : "'.$q.'"' : 'Catalogo Virtual')
@section('content')
    <!-- site__body -->
    <div class="site__body">
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
                            @if(isset($q))
                                <h1 class="page__header-title decor-header decor-header--align--center">Resultado de la busqueda : "{{$q}}"</h1>
                            @else
                                <h1 class="page__header-title decor-header decor-header--align--center">Tienda - Productos</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- page__header / end -->
            <!-- page__body -->
            <div class="page__body">
                @if($view_list)
                    @include('theme_default.partials._shop_filter')
                @else
                    @include('theme_default.partials._shop_grid')
                @endif
            </div>
            <!-- page__body / end -->
        </div>
        <!-- page / end -->
    </div>
    <!-- site__body / end -->
@endsection
