@extends('backoffice.layout_admin2')
@section('title', isset($title) ? $title : 'Reservas')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Detalle de reservas de <code>{{$item->product->title}}</code></h5>


                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="orders-detail">
                        <thead class="thead-default thead-lg">
                        <tr>
                            <th>Reserva ID</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th class="no-sort"></th>
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
            var table = $('#orders-detail').DataTable({
                language: TRANSLATION_DATATABLE,
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: '{{route('orders.detail_sku')}}?attribute_id={{$attribute_id}}'
                },
                columns: [
                    {data:'serie'},
                    {data:'flete_address'},
                    {data:'product'},
                    {data:'q'},
                    {data:'created_at'},
                    {data:'actions'}
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
        });
    </script>
@endpush

