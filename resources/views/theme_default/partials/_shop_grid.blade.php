<div class="container">
    <div class="row">
        <div class="col">
            <div class="products-view">
                <div class="products-view__options view-options">
                    <div class="view-options__layout">
                        <a href="{{route('shop.shop',['code'=>$shop->code,'view_list'=>false])}}" class="view-options__layout-button  view-options__layout-button--active ">
                            <svg width="14px" height="14px">
                                <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#grid-14')}}"></use>
                            </svg>
                        </a>
                        <a href="{{route('shop.shop',['code'=>$shop->code,'view_list'=>true])}}" class="view-options__layout-button ">
                            <svg width="14px" height="14px">
                                <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#list-14')}}"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="view-options__legend">Total {{$productos->count() * $productos->currentPage()}} de {{$productos->total()}} productos</div>
                    <div class="view-options__divider"></div>
                    <div class="view-options__control">
                        <label class="view-options__control-label" for="view-options-sort">Ordenar Por:</label>
                        <div class="view-options__control-content">
                            <select class="form-control form-control-sm" name="" id="view-options-sort">
                                <option value="">Defecto</option>
                                <option value="">Nombre (A-Z)</option>
                            </select>
                        </div>
                    </div>
                    <div class="view-options__control">
                        <label class="view-options__control-label" for="view-options-show">Ver:</label>
                        <div class="view-options__control-content">
                            <select class="form-control form-control-sm" name="" id="view-options-show">
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                                <option value="60">60</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="products-view__list products-list products-list--layout--full-grid-5">
                    @foreach($shop->products(15) as $prod)
                    <div class="products-list__item">
                        <div class="product-card product-card--layout--grid">
                            @if($prod->is_sale)
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--style--sale">Oferta</div>
                                </div>
                            @endif
                            @if(!$prod->is_sale && $prod->new)
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
                                    <button class="btn btn-light btn-svg-icon btn-sm" data-add-wishlist="true" data-product-id="{{$prod->id}}" type="button">
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
                                @if($prod->image)
                                <a href="{{route('shop.product',['code'=>$shop->code,'product_id' => $prod->id,'slug'=>$prod->slug])}}"><img srcset="{{Storage::url($prod->image)}} 1x, {{Storage::url($prod->image)}} 2x" src="{{Storage::url($prod->image)}}" alt=""></a>
                                @else
                                <a href="{{route('shop.product',['code'=>$shop->code,'product_id' => $prod->id,'slug'=>$prod->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt=""></a>
                                @endif
                            </div>
                            <div class="product-card__info">
                                <div class="product-card__category">
                                    <a href="{{route('shop.category',['code'=>$shop->code,'category_id'=>$prod->category->id,'category'=>$prod->category->slug])}}">{{$prod->category->name}}</a>
                                </div>
                                <div class="product-card__name">
                                    <a href="{{route('shop.product',['code'=>$shop->code,'product_id' => $prod->id,'slug'=>$prod->slug])}}">{{$prod->title}}</a>
                                </div>
                                <div class="product-card__rating">
                                    <div class="product-card__rating-title">Reviews ({{$prod->reviews()}})</div>
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
                                    {!! $prod->description !!}
                                </div>
                                <div class="product-card__prices-list">
                                    @if($prod->is_sale)
                                        <div class="product-card__price-old">
                                            S/. {{ number_format($prod->price,2)}}
                                        </div>
                                        <div class="product-card__price-new">
                                            S/. {{ number_format($prod->price_sale,2)}}
                                        </div>
                                    @else
                                        <div class="product-card__price">
                                            S/. {{ number_format($prod->is_sale? $prod->price_sale : $prod->price,2)}}
                                        </div>
                                    @endif
                                </div>
                                <div class="product-card__buttons">
                                    <div class="product-card__buttons-list">
                                        <button class="btn btn-primary product-card__addtocart" data-add-cart="true" data-product-id="{{$prod->id}}" type="button">Agregar Carrito</button>
                                        <button class="btn btn-light btn-svg-icon product-card__wishlist" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{asset('themes/default/images/sprite.svg#wishlist-16')}}"></use>
                                            </svg>
                                        </button>
                                        <button class="btn btn-light btn-svg-icon product-card__compare" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{asset('themes/default/images/sprite.svg#compare-16')}}"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="products-view__pagination">
                    {{$productos->appends(['view_list'=>$view_list,'new'=>$new,'offer'=>$offer])->links('theme_default.pagination.default',['shop'=>$shop])}}
                    <!--<nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous" tabindex="-1">
                                                                <span aria-hidden="true">
                                                                    <svg width="6px" height="9px">
                                                                        <use xlink:href="images/sprite.svg#arrow-left-6x9"></use>
                                                                    </svg>
                                                                </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                                                <span aria-hidden="true">
                                                                    <svg width="6px" height="9px">
                                                                        <use xlink:href="images/sprite.svg#arrow-right-6x9"></use>
                                                                    </svg>
                                                                </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>-->
                </div>
            </div>
        </div>
    </div>
</div>