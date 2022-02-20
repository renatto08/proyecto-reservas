@extends('backoffice.layout_admin2')
@section('title','Inventario de Productos')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="ibox">
            @if($errors->any())
            <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif

            @if(Session::has('finish'))
                <div class="alert alert-success">{{Session::get('finish')}}</div>
            @endif

            <div class="ibox-body">
                <h5 class="font-strong mb-4">INVENTARIO DE PRODUCTOS</h5>
                <div class="flexbox mb-4">
                    <div class="flexbox">
                        <label class="mb-0 mr-2">Filtrar:</label>
                        <select class="selectpicker show-tick form-control" id="type-filter" title="Categoria" data-style="btn-solid" data-width="150px">
                            <option value="">Todos</option>
                            @foreach($categories as $category)
                                <option>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flexbox">
                        <div class="input-group-icon input-group-icon-left mr-3">
                            <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                            <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Buscar ...">
                        </div>
                        <a class="btn btn-rounded btn-primary btn-air" href="{{route('orders.create')}}">Nueva Reserva</a>
                    </div>
                </div>

                @if(backpack_user()->hasrole('administrador') || backpack_user()->hasrole('coord-ventas') || backpack_user()->hasrole('ventas'))

                <div class="flexbox mb-4">
                    <div class="flexbox">
                        <form action="{{route('b.inventary.import')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group mb-4">
                            <label class="btn btn-info file-input mr-2">
                                <span class="btn-icon"><i class="la la-upload"></i>Seleccionar Excel</span>
                                <input type="file" name="file" id="file">
                            </label>
                            <button class="btn btn-primary"><i class="fa fa-check"></i> Importar Stock</button>
                        </div>

                        </form>

                    </div>
                </div>
                @endif


                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="inventary-table">
                        <thead class="thead-default thead-lg">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Nuevo</th>
                            <th>Cantidad</th>
                            <th class="no-sort">Reservado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $row)
                            <tr>
                                <td>
                                    <a href="javascript:;">{{$row->serie}}</a>
                                </td>
                                <td>
                                    @if($row->image)
                                    <img class="mr-3" src="{{ asset('storage/'.$row->image)}}" alt="image" width="60" />
                                    @endif
                                    {{$row->title}}</td>
                                <td>{{$row->category->name}}</td>
                                <td>
                                    S/.{{number_format($row->price_sale>0 ? $row->price_sale : $row->price,2)}}
                                </td>
                                <td>
                                    @if($row->new)
                                        <i class="fa fa-check text-succes"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($row->stock>0 && (backpack_user()->hasrole('administrador') || backpack_user()->hasrole('coord-ventas') || backpack_user()->hasrole('ventas')))
                                        <span class="badge badge-primary badge-pill">{{$row->stock}}</span>
                                    @else
                                        @if($row->stock==0)
                                            <span class="badge badge-danger badge-pill">Sin Stock</span>
                                        @endif
                                        @if($row->stock>0)
                                            <span class="badge badge-success badge-pill">En Stock</span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <a data-toggle="tooltip" data-product_id="{{$row->id}}" title="Ver Detalle" class="text-muted font-16 modal-inventary" href="javascript:;"><i class="ti-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->

    @include('backoffice.inventary.modal')
@endsection
@push('after_scripts')
    <script>
        function is_status_html(stock,queque){
            n = stock - queque;
            if(n>0 && queque>0){
                return '<span class="badge badge-warning">Reservados</span>'
            }
            return n>0 ? '<span class="badge badge-success">En stock</span>' : '<span class="badge badge-danger">Sin stock</span>';
        }
        $(function() {
            $('#inventary-table').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
            });
            var table = $('#inventary-table').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(2).search($(this).val()).draw();
            });

            $(document).on('click','.modal-inventary',function (e) {
                e.preventDefault();
                $("#modalInventary").modal();
                var _product_id = $(this).data('product_id');

                $("#det_inventary").html('<tr><td colspan="2">Cargando...</td></tr>');
                $.get('{{url('backoffice/api/search_producto_inventary')}}?shop_id={{$shop_id}}&type=id&q='+_product_id).then(function(res){
                   var det_html = '';
                   res.forEach(function (obj,i) {
                       det_html += '<tr><td>'+obj.full_desc+'</td><td>'+is_status_html(obj.stock,obj.queque)+'</td></tr>'
                   });
                   $("#det_inventary").html(det_html);
                });
            });

        });
    </script>
@endpush

