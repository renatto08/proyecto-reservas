<!-- mobilemenu -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__container">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title">Menu</div>
            <button class="mobilemenu__close" type="button">
                <svg width="10px" height="10px">
                    <use xlink:href="images/sprite.svg#cross-10"></use>
                </svg>
            </button>
        </div>
        <div class="mobilemenu__body">
            <ul class="mobilemenu__links mobilemenu__links--level--1" data-collapse data-collapse-opened-class="mobilemenu__item--opened">
                <li class="mobilemenu__item " data-collapse-item>
                    <a class="mobilemenu__link" href="{{route('shop.home',['code'=>$shop->code])}}">
                        Inicio
                    </a>
                </li>
                <li class="mobilemenu__item " data-collapse-item>
                    <a class="mobilemenu__link" href="{{route('shop.shop',['code'=>$shop->code,'new'=>1])}}">
                        Nuevo!
                    </a>
                </li>
                <li class="mobilemenu__item " data-collapse-item>
                    <a class="mobilemenu__link" href="{{route('shop.shop',['code'=>$shop->code])}}">
                        Productos
                    </a>
                </li>
                <li class="mobilemenu__item  mobilemenu__item--has-children " data-collapse-item>
                    <a class="mobilemenu__link" href="">
                        Categorias
                    </a>
                    <button type="button" class="mobilemenu__arrow mobilemenu__expander " data-collapse-trigger>
                        <svg width="6px" height="9px">
                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#arrow-left-6x9')}}"></use>
                        </svg>
                    </button>
                    <div class="mobilemenu__sub-links" data-collapse-content>
                        <ul class="mobilemenu__links mobilemenu__links--level--2">
                            @foreach($shop->categories() as $item)
                            <li class="mobilemenu__item  mobilemenu__item--has-children " data-collapse-item>
                                <a class="mobilemenu__link" href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$item->id,'category'=>$item->slug])}}">
                                    {{$item->name}}
                                </a>
                                <button type="button" class="mobilemenu__arrow mobilemenu__expander " data-collapse-trigger>
                                    <svg width="6px" height="9px">
                                        <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#arrow-left-6x9')}}"></use>
                                    </svg>
                                </button>
                                <div class="mobilemenu__sub-links" data-collapse-content>
                                    <ul class="mobilemenu__links mobilemenu__links--level--3">
                                        @foreach($shop->categories_children($item->id) as $children)
                                        <li class="mobilemenu__item " data-collapse-item>
                                            <a class="mobilemenu__link" href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$children->id,'category'=>$children->slug])}}">
                                                {{$children->name}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="mobilemenu__item " data-collapse-item>
                    <a class="mobilemenu__link" href="{{route('shop.shop',['code'=>$shop->code,'offer'=>1])}}">
                        Promociones
                    </a>
                </li>

                <li class="mobilemenu__item " data-collapse-item>
                    <a class="mobilemenu__link" href="{{route('shop.contact',['code'=>$shop->code])}}">
                        Contactanos
                    </a>
                </li>

                <li class="mobilemenu__divider"></li>
                <!--<li class="mobilemenu__item " data-collapse-item>
                    <a class="mobilemenu__link" href="{{route('shop.cart',['code'=>$shop->code])}}">
                        Carrito de compra<span class="mobilemenu__counter">{{count(shop_get_cart($shop->code))}}</span>
                    </a>
                </li>-->


            </ul>
        </div>
    </div>
</div>
<!-- mobilemenu / end -->