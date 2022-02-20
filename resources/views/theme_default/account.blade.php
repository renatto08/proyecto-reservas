@extends('theme_default.layout')
@section('title','Mi cuenta')
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
                            <li class="breadcrumb-item active" aria-current="page">Paginal Actual</li>
                        </ol>
                        <h1 class="page__header-title decor-header decor-header--align--center">Mi Cuenta</h1>
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
                        <div class="col-md-12 offset-xl-4 d-flex">
                            @include('theme_default.partials._messages')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-5 offset-xl-4 d-flex">
                            <div class="card flex-grow-1 mb-md-0">
                                <div class="card__header">
                                    <h4 class="decor-header">Ingresar</h4>
                                </div>
                                <div class="card__content">
                                    <form action="{{route('shop.login',['code' => $shop->code])}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" name="username" class="form-control" placeholder="Usuario" value="{{old('username')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Recordarme</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ingresar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-6 col-xl-5 d-flex">
                            <div class="card flex-grow-1 mb-0">
                                <div class="card__header">
                                    <h4 class="decor-header">Registro</h4>
                                </div>
                                <div class="card__content">
                                    <form>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmar Password</label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrarme</button>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- page__body / end -->
    </div>
    <!-- page / end -->
@endsection