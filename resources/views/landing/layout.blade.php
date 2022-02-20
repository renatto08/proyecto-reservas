<!DOCTYPE html>
<html lang="en">
<head>
    @include('landing.partials._header')
</head>
<body>
<div class="whatsapp-contact">
    <div class="whatsapp-contact-text">
        ¡Forma parte de nuestra red de ventas!<br>Hazlo ahora.
    </div>     
    <a href="https://api.whatsapp.com/send?phone=51954366715" target="_blank">
        <img src="{{shop_asset('landing','images/whatsapp.png')}}" width="64" height="64" alt="Escribe al WhatsApp">
    </a>
</div>
<!-- Page Loader -->
<div id="pageloader">
    <div class="loader-inner cube-transition">
        <div></div>
        <div></div>
    </div>
</div>
<!-- Ends Page Loader -->
@include('landing.partials._menu_header')

@yield('content')

@include('landing.partials._footer')
</body>
</html>