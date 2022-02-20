<!DOCTYPE html>
<html lang="es">
<head>
    @include('theme_default.partials._header')

</head>
<body>
    @include('theme_default.partials._mobile_menu')

    <div class="site">
        @include('theme_default.partials._sideheader')

        <!-- site__body -->
        <div class="site__body">
            @yield('content')
        </div>
        <!-- site__body / end -->

        @include('theme_default.partials._footer')
    </div>

    <!-- widget whatsapp-->
    <div class="floating whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{$shop->phone}}" target="_blank"><img src="{{asset('themes/default/images/whatsapp.png')}}"></a>
    </div>
    <!-- .widget whatsapp -->
    @stack('after_scripts')
</body>
</html>
