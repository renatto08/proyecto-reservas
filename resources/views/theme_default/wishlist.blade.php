@extends('theme_default.layout')
@section('title','Lista de deseos')
@section('content')
    <!-- page -->
    <div class="page">
        <!-- page__header -->
        @include('theme_default.partials._page_header',['title_header'=>'Lista de deseos'])
        <!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <!-- block -->
            <div class="block">
                <div class="container">
                    @include('theme_default.partials._messages')
                    <div class="wishlist">
                        <table class="wishlist__table">
                            <thead class="wishlist__header">
                            <tr>
                                <td class="wishlist__column wishlist__column--image">Imagen</td>
                                <td class="wishlist__column wishlist__column--info">Producto</td>
                                <td class="wishlist__column wishlist__column--stock">Estado Stock</td>
                                <td class="wishlist__column wishlist__column--price">Precio</td>
                                <td class="wishlist__column wishlist__column--addtocart"></td>
                                <td class="wishlist__column wishlist__column--remove"></td>
                            </tr>
                            </thead>
                            <tbody class="wishlist__body">
                            @foreach($products as $prod)
                            <tr>
                                <td class="wishlist__column wishlist__column--image">
                                    @if($prod->image)
                                        <a href="{{route('shop.product', ['code'=>$shop->code,'product_id'=>$prod->id,'slug'=>$prod->slug])}}"><img srcset="{{Storage::url($prod->image)}} 1x, {{Storage::url($prod->image)}} 2x" src="{{Storage::url($prod->image)}}" alt=""></a>
                                    @else
                                        <a href="{{route('shop.product', ['code'=>$shop->code,'product_id'=>$prod->id,'slug'=>$prod->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt=""></a>
                                    @endif
                                </td>
                                <td class="wishlist__column wishlist__column--info">
                                    <div class="wishlist__product-category"><a href="shop-grid.html">{{$prod->category->name}}</a></div>
                                    <div class="wishlist__product-name"><a href="product.html">{{$prod->title}}</a></div>
                                    <div class="wishlist__product-rating">
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
                                </td>
                                <td class="wishlist__column wishlist__column--stock">
                                    <span class="stock-badge stock-badge--in-stock">En Stock</span>
                                </td>
                                <td class="wishlist__column wishlist__column--price">S/.{{number_format($prod->is_sale ? $prod->price_sale : $prod->price,2)}}</td>
                                <td class="wishlist__column wishlist__column--addtocart">
                                    <button type="button" class="btn btn-primary btn-sm" data-add-cart="true" data-product-id="{{$prod->id}}">Agregar a carrito</button>
                                </td>
                                <td class="wishlist__column wishlist__column--remove">
                                    <form action="{{route('shop.delete_wishlist',['code' => $shop->code])}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="index" value="{{$loop->index}}">
                                    <button type="submit" class="button-remove button-remove--lg">
                                        <svg width="10px" height="10px">
                                            <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#cross-10')}}"></use>
                                        </svg>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- block / end -->
        </div>
        <!-- page__body / end -->
    </div>
    <!-- page / end -->
@endsection