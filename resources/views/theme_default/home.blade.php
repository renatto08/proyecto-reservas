@extends('theme_default.layout')
@section('title','Pagina principal')
@section('content')
<!-- page -->
<div class="page">
    <!-- page__body -->
    <div class="page__body">
        <!-- block-slider -->
        <div class="block block-slider block-slider--featured">
            <div class="container">
                <div class="slider slider--with-dots">
                    <div class="owl-carousel">
                        @foreach($shop->sliders() as $slider)
                        <a href="{{$slider->url}}">
                            <picture>
                                <source media="(min-width: 768px)" srcset="{{Storage::url($slider->image)}} 1x,
                                    {{Storage::url($slider->image)}} 2x">
                                <source media="(max-width: 767px)" srcset="{{Storage::url($slider->image)}} 1x,
                                    {{Storage::url($slider->image)}} 2x">
                                <img src="{{Storage::url($slider->image)}}" alt="">
                            </picture>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- block-slider / end -->

        <!-- block-shop-last_products -->
        <div class="block block-shop-categories">
            <div class="container">
                <div class="block__title">
                    <h2 class="decor-header decor-header--align--center">Lo Último</h2>
                </div>
                <div class="products-grid-list">
                    @foreach($shop->products(12) as $product)
                        <div class="card product-grid-card">
                            <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}">
                                <div class="product-grid-card__image">
                                    @if($product->image)
                                        <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"><img srcset="{{Storage::url($product->image)}} 1x, {{Storage::url($product->image)}} 2x" src="{{Storage::url($product->image)}}" alt=""></a>
                                    @else
                                        <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt=""></a>
                                    @endif
                                </div>
                                <div class="product-grid-footer">
                                    <div class="product-grid-card__name">{{$product->title}}</div>
                                    <div class="product-grid-card__products">S/.{{ number_format($product->is_sale ? $product->price_sale : $product->price,2)}}</div>
                                    <!--<button class="btn btn-primary product-grid-card__addtocart" data-product-id="{{$product->id}}" data-add-cart="true" type="button">Agregar a Carrito</button>-->
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!--./ block shop last_products -->

    {{--<!-- block-products-carousel -->
     <div class="block block-products-carousel">
        <div class="container">
            <div class="block__title">
                <h2 class="decor-header decor-header--align--center">Lo Último</h2>
            </div>
            <div class="block-products-carousel__slider slider slider--with-arrows">
                <div class="owl-carousel last_product">
                    @foreach($shop->products() as $product)
                    <div class="product-card product-card--layout--grid">
                        @if($product->is_sale)
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--style--sale">Oferta</div>
                            </div>
                        @endif

                        @if(!$product->is_sale && $product->new)
                        <div class="product-card__badges-list">
                            <div class="product-card__badge product-card__badge--style--new">Nuevo</div>
                        </div>
                        @endif

                        <div class="product-card__actions">
                            <div class="product-card__actions-list">
                                <button class="btn btn-light btn-svg-icon btn-sm" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#quickview-16')}}"></use>
                                    </svg>
                                </button>
                                <button class="btn btn-light btn-svg-icon btn-sm" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#wishlist-16')}}"></use>
                                    </svg>
                                </button>
                                <button class="btn btn-light btn-svg-icon btn-sm" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#compare-16')}}"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="product-card__image">
                            @if($product->image)
                                <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"><img srcset="{{Storage::url($product->image)}} 1x, {{Storage::url($product->image)}} 2x" src="{{Storage::url($product->image)}}" alt=""></a>
                            @else
                                <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt=""></a>
                            @endif
                        </div>
                        <div class="product-card__info">
                            <div class="product-card__category">
                                <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$product->category->id,'category'=>$product->category->slug])}}">{{$product->category->name}}</a>
                            </div>
                            <div class="product-card__name">
                                <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}">{{$product->title}}</a>
                            </div>
                            <div class="product-card__rating">
                                <div class="product-card__rating-title">Reviews (15)</div>
                                <div class="product-card__rating-stars">
                                    <div class="rating">
                                        <div class="rating__body">
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                </g>
                                            </svg>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                </g>
                                            </svg>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                </g>
                                            </svg>
                                            <svg class="rating__star " width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                </g>
                                            </svg>
                                            <svg class="rating__star " width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card__description">
                                {!! $product->description_short !!}
                            </div>
                            <div class="product-card__prices-list">
                                <div class="product-card__price">
                                    S/.{{ number_format($product->is_sale ? $product->price_sale : $product->price,2)}}
                                </div>
                            </div>
                            <div class="product-card__buttons">
                                <div class="product-card__buttons-list">
                                    <button class="btn btn-primary product-card__addtocart" data-product-id="{{$product->id}}" data-add-cart="true" type="button">Agregar a Carrito</button>
                                    <button class="btn btn-light btn-svg-icon product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#wishlist-16')}}"></use>
                                        </svg>
                                    </button>
                                    <button class="btn btn-light btn-svg-icon product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#compare-16')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- block-products-carousel / end -->--}}

        <!-- banner ads shop home -->
        <div class="block shop-publicidad-home">
            <div class="container">
                <picture>
                    <source media="(min-width: 768px)" srcset="{{Storage::url($shop->banner_home)}} 1x,
                                    {{Storage::url($shop->banner_home)}} 2x">
                    <source media="(max-width: 767px)" srcset="{{Storage::url($shop->banner_home)}} 1x,
                                    {{Storage::url($shop->banner_home)}} 2x">
                    <img style="width: 100%;" src="{{Storage::url($shop->banner_home)}}" alt="">
                </picture>
            </div>

        </div>
        <!-- ./banner ads shop home -->

        <!-- block-products-ofertas-carousel -->
        <div class="block block-products-carousel">
            <div class="container">
                <div class="block__title">
                    <h2 class="decor-header decor-header--align--center">Promociones</h2>
                </div>
                <div class="block-products-carousel__slider slider slider--with-arrows">
                    <div class="owl-carousel">
                        @foreach($shop->products_offers() as $product)
                            <div class="product-card product-card--layout--grid">
                                @if($product->is_sale)
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--style--sale">Oferta</div>
                                    </div>
                                @endif

                                @if(!$product->is_sale && $product->new)
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--style--new">Nuevo</div>
                                    </div>
                                @endif

                                <div class="product-card__actions">
                                    <div class="product-card__actions-list">
                                        <button class="btn btn-light btn-svg-icon btn-sm" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#quickview-16')}}"></use>
                                            </svg>
                                        </button>
                                        <button class="btn btn-light btn-svg-icon btn-sm" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#wishlist-16')}}"></use>
                                            </svg>
                                        </button>
                                        <button class="btn btn-light btn-svg-icon btn-sm" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#compare-16')}}"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="product-card__image">
                                    @if($product->image)
                                        <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"><img srcset="{{Storage::url($product->image)}} 1x, {{Storage::url($product->image)}} 2x" src="{{Storage::url($product->image)}}" alt=""></a>
                                    @else
                                        <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt=""></a>
                                    @endif
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__category">
                                        <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$product->category->id,'category'=>$product->category->slug])}}">{{$product->category->name}}</a>
                                    </div>
                                    <div class="product-card__name">
                                        <a href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}">{{$product->title}}</a>
                                    </div>
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-title">Reviews (15)</div>
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <div class="rating__body">
                                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <svg class="rating__star " width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                    <svg class="rating__star " width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal')}}"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#star-normal-stroke')}}"></use>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__description">
                                        {!! $product->description_short !!}
                                    </div>
                                    <div class="product-card__prices-list">
                                        <div class="product-card__price">
                                            S/.{{ number_format($product->is_sale ? $product->price_sale : $product->price,2)}}
                                        </div>
                                    </div>
                                    <div class="product-card__buttons">
                                        <div class="product-card__buttons-list">
                                            <button class="btn btn-primary product-card__addtocart" data-product-id="{{$product->id}}" data-add-cart="true" type="button">Agregar a Carrito</button>
                                            <button class="btn btn-light btn-svg-icon product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#wishlist-16')}}"></use>
                                                </svg>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#compare-16')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- block-products-carousel-ofertas / end -->

        <!-- block-shop-categories -->
        {{--<div class="block block-shop-categories">
            <div class="container">
                <div class="block__title">
                    <h2 class="decor-header decor-header--align--center">Categorias Populares</h2>
                </div>
                <div class="categories-list">
                    @foreach($shop->categories() as $category)
                    <div class="card category-card">
                        <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$category->id,'category'=>$category->slug])}}">
                            <div class="category-card__image">
                                <img srcset="{{shop_asset($shop->theme,'images/categories/category1.jpg')}} 1x, {{shop_asset($shop->theme,'images/categories/category1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/categories/category1.jpg')}}" alt="">
                            </div>
                            <div class="category-card__name">{{$category->name}}</div>
                            <div class="category-card__products">{{$category->total}} Productos</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>--}}
    </div>
    <!-- page__body / end -->
</div>
<!-- page / end -->
@endsection
