
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>@yield('title','Sin titulo') | E-commerce Dashboard</title>
<!-- GLOBAL MAINLY STYLES-->
<link href="{{asset('themes/admin2/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/animate.css/animate.min.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/toastr/toastr.min.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<!-- PLUGINS STYLES-->
<link href="{{asset('themes/admin2/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/dataTables/datatables.min.css')}}" rel="stylesheet" />
<link href="{{asset('themes/admin2/vendors/bootstrap-sweetalert/dist/sweetalert.css')}}" rel="stylesheet" />
<!-- THEME STYLES-->
<link href="{{asset('themes/admin2/css/main.css')}}" rel="stylesheet" />
<!-- PAGE LEVEL STYLES-->

<script type="text/javascript">
    TRANSLATION_DATATABLE = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": { "sFirst":    "Primero", "sLast":     "Último", "sNext":     "Siguiente", "sPrevious": "Anterior"},
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente" },
        "buttons": { "copy": "Copiar", "colvis": "Visibilidad" }
    };
</script>