@extends('backoffice.layout_admin2')
@section('title', isset($title) ? $title : 'Historial de cambios de productos')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in">

        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">HISTORIAL DE CAMBIOS</h5>
                <div class="row">
                    <!--<div class="form-group mb-4 col-sm-4">
                        <label class="mb-0 mr-2">Cliente:</label>

                        <select class="form-control form-control-solid selectpicker" data-live-search="true" id="client_id" name="client_id" data-width="100%">
                            <option value="">---TODOS---</option>
                        </select>
                    </div>-->

                    <div class="form-group col-sm-4">
                        <label class="mb-0 mr-2">Campaña:</label>
                        <select class="selectpicker show-tick form-control" id="filter_campaign" title="Campañas" data-width="100%">
                            <option value="">---TODOS---</option>
                            @foreach($campaigns as $campaign)
                                <option value="{{$campaign->id}}">{{strtoupper($campaign->name)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4 form-group ">
                        <label class="mb-0 mr-2">Fecha Desde:</label>
                        <input type="date" id="date_from" name="date_from" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label class="mb-0 mr-2">Fecha Hasta:</label>
                        <input type="date" id="date_to" name="date_to" class="form-control">
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <button class="mt-4 btn btn-primary btn-block" type="button" id="btn_filter"><i class="fa fa-search"></i> Filtrar</button>
                    </div>
                </div>




                <div class="table-responsive row">

                    <table class="table table-bordered table-hover" id="orders-table">
                        <thead class="thead-default thead-lg">
                        <tr>
                            <th>Cambio ID</th>
                            <th>Responsable</th>
                            <th>Campaña</th>
                            <th>Fecha</th>
                            <th>P. Cambio</th>
                            <th>P. Cambio Q</th>
                            <th>P. Entregado</th>
                            <th>P. Entregado Cant.</th>
                            <!--<th class="no-sort"></th>-->
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

        $(function() {
            var table = $('#orders-table').DataTable({
                language: TRANSLATION_DATATABLE,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    data:function( data){
                        data.filter_client_id = $("#client_id").val();
                        data.filter_campaign =  $("#filter_campaign").val();
                        data.filter_pago =  $("#filter_pago").val();
                        data.filter_date_from =  $("#date_from").val();
                        data.filter_date_to =  $("#date_to").val();
                        data.filter_check_flete =  $("#check_flete").prop('checked') ? 1 : 0;
                    },
                    url: '{{url('backoffice/order_salida/table_ajax')}}'
                },
                columns: [
                    {data:'serie'},
                    {data:'client'},
                    {data:'campaign'},
                    {data:'created_at'},
                    {data:'detalle.product_change.product_title'},
                    {data:'detalle.product_change_q'},
                    {data:'detalle.product_deliver.product_title'},
                    {data:'detalle.product_deliver_q'},
                    //{data:'actions'}
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
                table.draw()
            });

            /*$("#client_id").select2({
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
            });*/

        });
    </script>
@endpush

