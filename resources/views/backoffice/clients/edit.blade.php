@extends('backoffice.layout_admin2')
@section('title','Registrar cliente')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Editar Cliente</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Sigue los pasos para registrar un cliente</div>
            </div>
            <div class="ibox-body">
                @include('backoffice.partials.error')
                <form id="form-wizard" method="post" action="{{route('clients.store')}}" novalidate="novalidate">
                    {{csrf_field()}}
                    <h6>Paso 1</h6>
                    <section>
                        <h3>Cuenta</h3>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input class="form-control required" id="username" type="text" name="username" value="{{old('username')}}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control required" id="password" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Confirmar Password</label>
                            <input class="form-control required" id="confirm" type="password" name="confirm">
                        </div>
                    </section>
                    <h6>Paso 2</h6>
                    <section>
                        <h3>Datos personales</h3>
                        <div class="form-group">
                            <label>Nombres</label>
                            <input class="form-control required" id="first_name" type="text" name="first_name" value="{{old('first_name')}}">
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input class="form-control required" id="last_name" type="text" name="last_name" value="{{old('last_name')}}">
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input class="form-control required" id="code" type="text" name="code" value="{{old('code')}}">
                        </div>
                        <div class="form-group">
                            <label>Direccion</label>
                            <input class="form-control required" id="address" type="text" name="address" value="{{old('address')}}">
                        </div>
                    </section>
                    <h6>Paso 3</h6>
                    <section>
                        <h3>Contacto</h3>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control required email" id="email" type="text" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input class="form-control required" id="phone" type="text" name="phone" value="{{old('phone')}}">
                        </div>
                    </section>
                    <h6>Paso 4</h6>
                    <section>
                        <div class="text-center">
                            <h3>¡Enhorabuena!</h3>
                            <i class="fa fa-smile-o text-success" style="font-size:120px;"></i></div>
                    </section>
                    <h6>Paso 5</h6>
                    <section>
                        <h3>Terminos & Condiciones</h3>
                        <label class="ui-checkbox ui-checkbox-success">
                            <input class="required" id="acceptTerms" type="checkbox" name="acceptTerms">
                            <span class="input-span"></span>Yo acepto los terminos & condiciones.</label>
                    </section>
                </form>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
@endsection
@push('after_scripts')
    <script>
        $(function() {
            $('#form-wizard').steps({
                labels: {
                  'next' : 'Siguiente',
                    'previous': 'Atras'
                },
                headerTag: "h6",
                bodyTag: "section",
                titleTemplate: '<span class="step-number">#index#</span> #title#',
                onStepChanging: function(event, currentIndex, newIndex) {
                    var form = $(this);
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onFinishing: function(event, currentIndex) {
                    var form = $(this);
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    toastr.success('Enviando...');
                    $(this).submit();
                }
            }).validate({
                errorPlacement: function errorPlacement(error, element) {
                    error.insertAfter(element);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                },
                errorClass: "help-block error",
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        })
    </script>
@endpush
