<!-- widget-categories -->
<div class="widget widget--card">
    <div class="widget__title">
        <h4 class="decor-header">Categorias</h4>
    </div>
    <div class="widget__body">
        <div class="widget-categories" data-collapse data-collapse-opened-class="widget-categories__item--opened">
            <ul class="widget-categories__list">
                @foreach($shop->categories() as $cat)
                    <li class="widget-categories__item" data-collapse-item>
                        @if(count($shop->categories_children($cat->id))>0)
                            <button class="widget-categories__arrow" data-collapse-trigger>
                                <svg width="4px" height="8px">
                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#arrow-light-left-4x8')}}"></use>
                                </svg>
                            </button>
                        @endif

                        <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$cat->id,'category'=>$cat->slug])}}" class="widget-categories__link @if($category_id==$cat->id) active @endif">
                        {{$cat->name}}
                        <!--<span class="widget-categories__counter">(57)</span>-->
                        </a>
                        <div class="widget-categories__sublist" data-collapse-content>
                            <ul class="widget-categories__list">
                                @foreach($shop->categories_children($cat->id) as $child)
                                    <li class="widget-categories__item" data-collapse-item>
                                        <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$child->id,'category'=>$child->slug])}}" class="widget-categories__link">
                                        {{$child->name}}
                                        <!--<span class="widget-categories__counter">(23)</span>-->
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- widget-categories / end -->
<!-- widget-filters -->
<div class="widget widget-filters widget--card">
    <div class="widget__title">
        <h4 class="decor-header">Filtros</h4>
    </div>
    <div class="widget__body">
        <form method="get" action="{{ $category_id ? route('shop.category',['code'=>$shop->code,'category_id'=>$category_id,'category'=> $category_slug]) : route('shop.shop',['code'=>$shop->code])}}">
            <div class="widget-filters__content">
                <div class="widget-filters__filter">
                    <div class="widget-filters__filter-name">Rango de precio</div>
                    <div class="widget-filters__filter-body">
                        <div class="widget-filters__filter-content">
                            <div class="filter-price" data-min="0" data-max="150" data-from="{{$price_min}}" data-to="{{$price_max}}">
                                <div class="filter-price__slider"></div>
                                <input type="hidden" name="price_min" class="input-slider-min" value="0">
                                <input type="hidden" name="price_max" class="input-slider-max" value="150">
                                <div class="filter-price__title">Precio: S/.<span class="filter-price__min-value"></span> – S/.<span class="filter-price__max-value"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-filters__filter">
                    <div class="widget-filters__filter-name">Tallas</div>
                    <div class="widget-filters__filter-body">
                        <div class="widget-filters__filter-content">
                            <ul class="filter-list">
                                @foreach($shop->sizes() as $size)
                                    <li class="filter-list__item">
                                        <label class="filter-list__row">
                                            <input class="filter-list__checkbox" type="checkbox" name="sizes[]" value="{{$size->id}}" @if(isset($sizes[$size->id]) && $size->id==$sizes[$size->id]) checked @endif>
                                            <span class="filter-list__name" class="">
                                            {{strtoupper($size->size)}}<!--<span class="filter-list__counter"> (4)</span>-->
                                        </span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="widget-filters__filter">
                    <div class="widget-filters__filter-name">Color</div>
                    <div class="widget-filters__filter-body">
                        <div class="widget-filters__filter-content">
                            <ul class="filter-list">
                                @foreach($shop->colors() as $color)
                                    <li class="filter-list__item">
                                        <label class="filter-list__row">
                                            <input class="filter-list__checkbox" type="checkbox" name="colors[]" value="{{$color->id}}" @if(isset($colors[$color->id]) && $color->id==$colors[$color->id]) checked @endif>
                                            <span class="filter-list__name" class="">
                                            {{strtoupper($color->name)}}<!--<span class="filter-list__counter"> (7)</span>-->
                                        </span>
                                        </label>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-filters__actions">
                <button type="submit" class="btn btn-primary btn">Filtrar</button>
            </div>
        </form>
    </div>
</div>
<!-- widget-filters / end -->
<!-- widget-banner -->
<div class="widget">
    <a href="" class="widget-sidebar-banner">
        @if($shop->banner_top)
            <img src="{{Storage::url($shop->banner_sidebar)}}" alt="{{$shop->name}}">
        @else
        <picture>
            <source media="(min-width: 960px)" srcset="{{asset('themes/default/images/banners/sidebar-banner.jpg')}} 1x,
                            {{asset('themes/default/images/banners/sidebar-banner@2x.jpg')}} 2x">
            <source media="(min-width: 361px) and (max-width: 959px)" srcset="{{asset('themes/default/images/banners/sidebar-banner-wide.jpg')}} 1x,
                            {{asset('themes/default/images/banners/sidebar-banner-wide@2x.jpg')}} 2x">
            <source media="(max-width: 360px)" srcset="{{asset('themes/default/images/banners/sidebar-banner.jpg')}} 1x,
                            {{asset('themes/default/images/banners/sidebar-banner@2x.jpg')}} 2x">
            <img src="{{asset('themes/default/images/banners/sidebar-banner.jpg')}}" alt="">
        </picture>
        @endif
    </a>
</div>
<!-- widget-banner / end -->
<!-- widget-products-list -->
<div class="widget widget--card">
    <div class="widget__title">
        <h4 class="decor-header">M&aacute;s Vendidos</h4>
    </div>
    <div class="widget__body">
        <ul class="widget-products-list">
            @foreach($products_bestsellers as $prod)
                <li class="widget-products-list__item">
                    <div class="widget-products-list__image">
                        <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$prod->id,'slug'=>$prod->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product2-1-thumbnail.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product2-1-thumbnail@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product2-1-thumbnail.jpg')}}" alt=""></a>
                    </div>
                    <div class="widget-products-list__info">
                        <div class="widget-products-list__category">
                            <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$prod->category->id,'category'=>$prod->category->slug])}}">{{$prod->category->name}}</a>
                        </div>
                        <div class="widget-products-list__name">
                            <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$prod->id,'slug'=>$prod->slug])}}">{{$prod->title}}</a>
                        </div>
                        <div class="widget-products-list__price">
                            @if($prod->is_sale)
                                <span class="widget-products-list__price-new">S/.{{number_format($prod->price_sale,2)}}</span>
                                <span class="widget-products-list__price-old">S/.{{number_format($prod->price,2)}}</span>
                            @else
                                <span class="widget-products-list__price">S/.{{number_format($prod->price,2)}}</span>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
<!-- widget-products-list / end -->
