<!-- subscription message-->
@if(session('subscription_message'))
<div class="mt-2 ml-2 mr-2">
    @if(session('subscription_message')=='SUBSCRIPCION')
        <div class="alert alert-success mb-3">Fue suscrito correctamente con el siguiente dato <a href="mailto:{{session('subscription_email')}}">{{session('subscription_email')}}</a>.</div>
    @else
        <div class="alert alert-success mb-3">Gracias por contactarnos, en breve nos comunicaremos con ud. </div>
    @endif
</div>
@endif
<!-- site__header -->
<header class="site__header">
    <div class="header">
        <div class="header__body">
            <div class="search">
                <form class="search__form" method="get" action="{{route('shop.shop',['code' => $shop->code])}}">
                    <input class="search__input" type="search" name="q" id="q" placeholder="Buscar producto..." @if(isset($q))value="{{$q}}"@endif">
                    <button class="search__button" type="submit">
                        <svg width="20px" height="20px">
                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#search-20')}}"></use>
                        </svg>
                    </button>
                    <button class="search__button search-trigger" type="button">
                        <svg width="20px" height="20px">
                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#cross-20')}}"></use>
                        </svg>
                    </button>
                </form>
            </div>
            <button class="header__mobilemenu" type="button"><svg width="22px" height="16px">
                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#menu')}}"></use>
                </svg></button>
            <a href="{{route('shop.home',['code'=>$shop->code])}}" class="header__logo">
                @if($shop->logo)
                    <img src="{{asset(Storage::url($shop->logo))}}" alt="{{$shop->name}}" width="82" height="24">

                @else
                    {{$shop->name}}
                @endif
            </a>
            <nav class="header__nav main-nav">
                <ul class="main-nav__list">
                    <li class="main-nav__item ">
                        <a class="main-nav__link" href="{{route('shop.home',['code'=>$shop->code])}}">
                            Inicio
                        </a>
                    </li>
                    <li class="main-nav__item ">
                        <a class="main-nav__link" href="{{route('shop.shop',['code'=>$shop->code,'new'=>1])}}">
                            Nuevo!
                        </a>
                    </li>
                    <li class="main-nav__item  main-nav__item--with--menu ">
                        <a class="main-nav__link" href="{{route('shop.shop',['code'=>$shop->code])}}">
                            Productos
                        </a>
                    </li>
                    <li class="main-nav__item ">
                        <a class="main-nav__link" href="">
                            Categorias
                            <svg class="main-nav__link-arrow" width="9px" height="6px">
                                <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#arrow-down-9x6')}}"></use>
                            </svg>
                        </a>
                        <div class="main-nav__sub-megamenu">
                            <!-- megamenu -->
                            <div class="megamenu">
                                <div class="row">
                                    <div class="col-2">
                                        <ul class="megamenu__links megamenu__links--root">
                                            @foreach($shop->categories() as $item)
                                            <li>
                                                <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$item->id,'category'=>$item->slug])}}">{{$item->name}}</a>
                                                <ul class="megamenu__links megamenu__links--sub">
                                                    @foreach($shop->categories_children($item->id) as $children)
                                                    <li><a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$children->id,'category'=>$children->slug])}}">{{$children->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <a href="" class="megamenu__banner">
                                            @if($shop->banner_top)
                                                <img src="{{Storage::url($shop->banner_top)}}" alt="{{$shop->name}}">
                                            @else
                                                <img srcset="{{ asset('themes/default/images/banners/megamenu-banner.jpg')}} 1x,
                                                {{ asset('themes/default/images/banners/megamenu-banner@2x.jpg')}} 2x" src="{{ asset('themes/default/images/banners/megamenu-banner.jpg')}}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- megamenu / end -->
                        </div>
                    </li>
                    <li class="main-nav__item  main-nav__item--with--menu ">
                        <a class="main-nav__link" href="{{route('shop.shop',['code'=>$shop->code,'offer'=>1])}}">
                            Promociones
                        </a>
                    </li>


                    <li class="main-nav__item ">
                        <a class="main-nav__link" href="{{route('shop.contact',['code'=>$shop->code])}}">
                            Contactanos
                        </a>
                    </li>

                    <!--<li class="main-nav__item  main-nav__item--with--menu ">
                        <a class="main-nav__link" href="{{route('shop.cart',['code'=>$shop->code])}}">
                            Carrito de compra
                        </a>
                    </li>-->
                </ul>
            </nav>
            <div class="header__spring"></div>
            <div class="header__indicator">
                <button type="button" class="header__indicator-button indicator search-trigger">
                    <span class="indicator__area">
                        <svg class="indicator__icon" width="20px" height="20px">
                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#search-20')}}"></use>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="header__indicator">
                <a href="{{route('shop.wishlist',['code'=>$shop->code])}}" class="header__indicator-button indicator">
                    <span class="indicator__area">
                        <svg class="indicator__icon" width="20px" height="20px">
                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#heart-20')}}"></use>
                        </svg>
                    </span>
                </a>
            </div>

            @if(!backpack_user())
            <div class="header__indicator">
                <a href="{{route('shop.account',['code'=>$shop->code])}}" class="header__indicator-button indicator">
                <span class="indicator__area">
                    <svg class="indicator__icon" width="20px" height="20px"><use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#male')}}"></use></svg>
                </span>
                </a>
            </div>
            @endif


            <div class="header__indicator" data-dropdown-trigger="click">
                <a href="{{route('shop.cart',['code'=>$shop->code])}}" class="header__indicator-button indicator">
                    <span class="indicator__area">
                        <span class="indicator__value">{{count(shop_get_cart($shop->code))}}</span>
                        <svg class="indicator__icon" width="20px" height="20px">
                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#cart-20')}}"></use>
                        </svg>
                    </span>
                </a>
                <div class="header__indicator-dropdown">
                    <div class="dropcart">
                        <div class="dropcart__products-list" id="dropcart__detail">

                            @foreach(shop_get_cart($shop->code) as $prod)
                            <div class="dropcart__product">
                                <div class="dropcart__product-image">
                                    <a href="{{ (isset($prod['product_id']) && isset($prod['title'])) ? route('shop.product',['code'=>$shop->code,'product_id'=>$prod['product_id'],'slug'=>Str::slug($prod['title']) ]) : '#'}}">
                                        @if(isset($prod['image']) && $prod['image'])
                                        <img srcset="{{$prod['image']}}  1x, {{$prod['image']}} 2x" src="{{$prod['image']}}'" alt="">
                                        @else
                                        <img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}  1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}'" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="dropcart__product-info">
                                    <div class="dropcart__product-name"><a href="{{(isset($prod['product_id']) && isset($prod['title'])) ? route('shop.product',['code'=>$shop->code,'product_id'=>$prod['product_id'],'slug'=>Str::slug($prod['title']) ]) : '#'}}">{{$prod['title']}}</a></div>
                                    <ul class="dropcart__product-options">
                                        <li>Categoria: {{isset($prod['category']) ? $prod['category'] : 'Sin Categoria' }}</li>
                                    </ul>
                                    <div class="dropcart__product-price">{{$prod['q']}} x {{$prod['is_sale'] ? $prod['price_sale'] : $prod['price']}}</div>
                                </div>
                                <a href="{{route('shop.delete_cart',['code'=>$shop->code,'index'=>$loop->index])}}" class="dropcart__product-remove button-remove">
                                    <svg width="10px" height="10px">
                                        <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#cross-10')}}"></use>
                                    </svg>
                                </a>
                            </div>
                            @endforeach


                        </div>
                        <div class="dropcart__totals">
                            <table id="dropcart__table">
                                <tr>
                                    <th>Subtotal</th>
                                    <td>S/.{{number_format(shop_cart_info($shop->code,'subtotal'),2)}}</td>
                                </tr>
                                <tr>
                                    <th>Descuentos</th>
                                    <td>S/.{{number_format(shop_cart_info($shop->code,'descuento'),2)}}</td>
                                </tr>
                                <tr>
                                    <th>Envio</th>
                                    <td>S/.{{number_format(shop_cart_info($shop->code,'envio'),2)}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>S/.{{number_format(shop_cart_info($shop->code,'total'),2)}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="dropcart__buttons">
                            <a class="btn btn-secondary" href="{{route('shop.cart',['code'=>$shop->code])}}">Ir Carrito</a>
                            <a class="btn btn-primary" href="{{route('shop.checkout',['code'=>$shop->code])}}">Ir Caja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- site__header / end -->
