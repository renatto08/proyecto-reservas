<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

@stack('header__meta')
<title>@yield('title','Tienda online') ::: {{$shop->name}} </title>
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i">
<!-- css -->
<link rel="stylesheet" href="{{asset('themes/default/vendor/bootstrap-4.3.1/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('themes/default/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('themes/default/css/style.css')}}">

<!-- js vars globals -->
<script type="text/javascript">
    const SHOP_ID = '{{$shop->id}}';
    const SHOP_CODE = '{{$shop->code}}';
    const SHOP_THEME = '{{$shop->theme}}';
    const SHOP_API = {
        cart: '{{route('shop.cart',['code'=>$shop->code])}}',
        wishlist: '{{route('shop.wishlist',['code'=>$shop->code])}}',
       add_cart : '{{route('shop.add_cart',['code'=>$shop->code])}}',
       add_wishlist: '{{route('shop.add_wishlist',['code'=>$shop->code])}}',
       checkout : '{{route('shop.buy',['code'=>$shop->code])}}'
    };
    const TOKEN = '{{csrf_token()}}';
</script>
<!-- js -->
<script src="{{asset('themes/default/vendor/jquery-3.3.1/jquery.min.js')}}"></script>
<script src="{{asset('themes/default/vendor/owl-carousel-2.3.4/owl.carousel.min.js')}}"></script>
<script src="{{asset('themes/default/vendor/nouislider-13.1.4/nouislider.min.js')}}"></script>
<script src="{{asset('themes/default/vendor/svg4everybody-2.1.9/svg4everybody.min.js')}}"></script>
<script>svg4everybody();</script>
<!-- fontawesome -->
<link rel="stylesheet" href="{{asset('themes/default/vendor/fontawesome-5.8.1/css/all.min.css')}}">
<!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
