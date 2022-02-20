@extends('backoffice.layout_admin2')
@section('title','Registrar cliente')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="flexbox mb-5">
                    <h5 class="font-strong">CLIENTES</h5>
                    <div class="flexbox">
                        <div class="input-group-icon input-group-icon-left mr-3">
                            <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                            <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Buscar ...">
                        </div>
                        <a class="btn btn-rounded btn-primary btn-air" href="{{route('clients.create')}}">Nuevo Cliente</a>
                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="customers-table">
                        <thead class="thead-default thead-lg">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th class="no-sort"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--@foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>
                                    <img class="img-circle mr-3" src="{{asset('themes/adminca-8/img/users/u6.jpg')}}" alt="image" width="40" />{{$client->user->username}}</td>
                                <td>{{$client->user->email}}</td>
                                <td>{{$client->first_name}}</td>
                                <td>{{$client->last_name}}</td>
                                <td>
                                    <a data-id="{{$client->id}}" data-email="{{$client->user->email}}" data-name="{{$client->first_name}}" data-last="{{$client->last_name}}" class="text-light font-16 edit-modal" href="{{route('clients.edit',['client'=>$client->id])}}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
    @include('backoffice.clients.modal')
@endsection
@push('after_scripts')
    <script>
        $(function() {
            var table = $('#customers-table').DataTable({
                language: TRANSLATION_DATATABLE,
                processing: true,
                serverSide: true,
                scrollX: true,
                searching: true,
                sDom: 'lrtip',
                ajax: {
                    url: '{{route('clients.index')}}'
                },
                columns: [
                    {data:'id'},
                    {data:'first_name'},
                    {data:'last_name'},
                    {data:'usuario'},
                    {data:'city'},
                    {data:'phone'},
                    {data:'actions'},
                ],
                order: [[0,'desc']],
                responsive: true
            });

            $('#key-search').on('keyup', function(evt) {
                console.log(this.value,evt)
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(2).search($(this).val()).draw();
            });


            $(document).on('click','.edit-modal',function(e){
               e.preventDefault();
               $("#id").val($(this).data('id'));
               $("#user_id").val($(this).data('user_id'));
               $("#email").val($(this).data('email'));
               $("#first_name").val($(this).data('name'));
               $("#last_name").val($(this).data('last'));
               $("#city").val($(this).data('city'));
               $("#address").val($(this).data('address'));
               $("#editClient").modal('toggle');
            });

            $("#btn_update").on('click',function (e) {
                $("#btn_update").hide();
                e.preventDefault();
                $.ajax({
                    url: "{{url('/backoffice/clients')}}/"+$("#id").val(),
                    type: "PUT",
                    data: $("#frmclient").serialize()})
                    .then(function (res) {
                        $("#btn_update").show();
                        $("#editClient").modal('toggle');
                       swal('Cliente',res.message ? res.message : 'Cliente actualizado','success');
                        table.draw();
                    }).fail(function (e) {
                       $("#btn_update").show();
                        swal('Cliente',res.message ? res.message : 'Intente nuevamente.','error');
                });
            })
        });
    </script>
@endpush
