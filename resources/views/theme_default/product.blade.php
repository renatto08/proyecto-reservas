@extends('theme_default.layout')
@section('title', ucfirst($product->title))
@push('header__meta')
    <meta property="og:url"           content="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$product->title}} :: {{$shop->name}}" />
    <meta property="og:description"   content="{{ strip_tags($product->description)}}" />
    <meta property="og:image"         content="{{ url(Storage::url($product->image))}}" />
@endpush
@section('content')

    <!-- page -->
    <div class="page">
        <!-- page__header -->
        <div class="page__header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ol class="page__header-breadcrumbs breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('shop.home',['code'=>$shop->code])}}">Principal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pagina Actual</li>
                        </ol>
                        <h1 class="page__header-title decor-header decor-header--align--center">Detalle del Producto</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <!-- block -->
            <div class="block">
                <div class="product container">
                    <div class="card product__info">
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <div class="owl-carousel" id="product-image">
                                        @if($product->gallery)
                                            @foreach($product->gallery as $item)
                                            <a href="{{Storage::url($item)}}" target="_blank">
                                                <img srcset="{{Storage::url($item)}} 1x, {{Storage::url($item)}} 2x" src="{{Storage::url($item)}}" alt="">
                                            </a>
                                            @endforeach
                                        @else

                                            <a href="images/products/product1-2-big.jpg" target="_blank">
                                                <img srcset="{{shop_asset($shop->theme,'images/products/product1-2-big.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-2-big@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-2-big.jpg')}}" alt="">
                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">
                                        @if($product->gallery)
                                            @foreach($product->gallery as $item)
                                            <a href="{{Storage::url($item)}}" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image" srcset="{{Storage::url($item)}} 1x, {{Storage::url($item)}} 2x" src="{{Storage::url($item)}}" alt="">
                                            </a>
                                            @endforeach
                                        @else
                                            <a href="" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image" srcset="{{shop_asset($shop->theme,'images/products/product1-3-big.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-3-big@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-3-big.jpg')}}" alt="">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__details">
                            <div class="product__categories-sku">
                                <div class="product__categories">
                                    <a href="">{{$product->category->name}}</a>
                                    <!--,
                                    <a href="">Chandeliers</a>-->
                                </div>
                                <div class="product__sku">ID: {{$product->id}}</div>
                            </div>
                            <div class="product__name">
                                <h2 class="decor-header">{{$product->title}}</h2>
                            </div>
                            <div class="product__rating">
                                <div class="product__rating-stars">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="product__rating-links">
                                    <a href="#">Reviews (5)</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;<a href="#">Escribe un Review</a>
                                </div>
                            </div>
                            <div class="product__description">
                                {!! $product->description !!}
                            </div>
                            <div class="product__price">
                                @if($product->is_sale)
                                <span class="product__price-new">S/.{{number_format($product->price_sale,2)}}</span>
                                <span class="product__price-old">S/.{{number_format($product->price,2)}}</span>
                                @else
                                <span class="product__price">S/.{{number_format($product->price,2)}}</span>
                                @endif
                            </div>
                            <form class="product__options">
                                <div class="form-group product__option">
                                    <label class="product__option-label">Color</label>
                                    <div class="radio-color">
                                        <div class="radio-color__list">
                                            <?php $keys = array();?>
                                            @foreach($product->colors as $color)
                                               @if(array_search($color->color,$keys)===false)
                                                <label class="radio-color__item radio-color__item--white" style="color: {{$color->color}};">
                                                    <input type="radio" name="color">
                                                    <span></span>
                                                </label>
                                                @endif
                                                <?php array_push($keys,$color->color); ?>
                                            @endforeach
                                            <!--<label class="radio-color__item radio-color__item--disabled" style="color: #5398ff;">
                                                <input type="radio" name="color" disabled>
                                                <span></span>
                                            </label>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="product__option-label">Talla</label>
                                    <div class="radio-select">
                                        <div class="radio-select__list">
                                            <?php $keys_sizes = array();?>
                                            @foreach($product->sizes as $size)
                                                    @if(array_search($size->size,$keys_sizes)===false)
                                                    <label>
                                                        <input type="radio" name="material">
                                                        <span>{{$size->size}}</span>
                                                    </label>
                                                    @endif
                                                    <?php array_push($keys_sizes,$size->size); ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="product__option-label">Cantidad</label>
                                    <div class="product__actions">
                                        <div class="product__actions-item">
                                            <div class="form-control-number product__quantity">
                                                <input class="form-control form-control-lg form-control-number__input" type="number" min="1" value="1">
                                                <div class="form-control-number__add"></div>
                                                <div class="form-control-number__sub"></div>
                                            </div>
                                        </div>
                                        <div class="product__actions-item">
                                            <button type="button" class="btn btn-primary btn-lg" data-add-cart="true" data-product-id="{{$product->id}}">Agregar a Carrito</button>
                                        </div>
                                        <div class="product__actions-item">
                                            <button type="button" class="btn btn-secondary btn-svg-icon btn-lg product__wishlist" data-add-wishlist="true" data-product-id="{{$product->id}}">
                                                <svg class="product-card__action-icon" width="16px" height="16px">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#wishlist-16')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product__actions-item">
                                            <button type="button" class="btn btn-secondary btn-svg-icon btn-lg product__compare">
                                                <svg class="product-card__action-icon" width="16px" height="16px">
                                                    <use xlink:href="{{shop_asset($shop->theme,'images/sprite.svg#compare-16')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="product__tags">
                                Tags: ~/~ <!-- <a href="">Bedroom</a>, <a href="">Chandelier</a>, <a href="">Lamp</a>-->
                            </div>
                            <div class="product__share-links share-links">
                                <ul class="share-links__list">
                                    <li class="share-links__item share-links__item--type--like">
                                        <div class="fb-share-button"
                                             data-href="{{route('shop.product',['code'=>$shop->code,'product_id'=>$product->id,'slug'=>$product->slug])}}"
                                             data-layout="button_count">
                                        </div>
                                    </li>
                                    <!--<li class="share-links__item share-links__item--type--like"><a href="">Like</a></li>
                                    <li class="share-links__item share-links__item--type--tweet"><a href="">Tweet</a></li>
                                    <li class="share-links__item share-links__item--type--pin"><a href="">Pin It</a></li>
                                    <li class="share-links__item share-links__item--type--counter"><a href="">4K</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card product__tabs tabs tabs--product">
                        <div class="tabs__list">
                            <a href="#tab-description" class="tabs__tab tabs__tab--active">Descripción</a>
                            <a href="#tab-specification" class="tabs__tab">Especificaciones</a>
                            <!--<a href="#tab-reviews" class="tabs__tab">Reviews</a>-->
                        </div>
                        <div class="tabs__tab-content tabs__tab-content--active" id="tab-description">
                            <div class="product__tab-description">
                                <div class="typography">
                                    <h2>Descripción completa del producto</h2>
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="tabs__tab-content" id="tab-specification">
                            <div class="product__tab-specification">
                                <div class="spec">
                                    <h2 class="spec__header decor-header">Espeficaci&oacute;n</h2>
                                    {!! $product->specification  !!}
                                    <!--
                                    <div class="spec__section">
                                        <h4 class="spec__section-title">Dimensions</h4>
                                        <div class="spec__row">
                                            <div class="spec__name">Length</div>
                                            <div class="spec__value">99 mm</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Width</div>
                                            <div class="spec__value">207 mm</div>
                                        </div>
                                        <div class="spec__row">
                                            <div class="spec__name">Height</div>
                                            <div class="spec__value">208 mm</div>
                                        </div>
                                    </div>-->
                                    <div class="spec__disclaimer">
                                        La información sobre las características técnicas, el conjunto de entrega, el país de fabricación y la apariencia
                                        de los productos es solo de referencia y se basa en la información más reciente disponible en el momento de la publicación.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="tabs__tab-content" id="tab-reviews">
                            <div class="product__tab-reviews">
                                <div class="reviews-view">
                                    <div class="reviews-view__list">
                                        <h2 class="reviews-view__header decor-header">Customer Reviews</h2>
                                        <div class="reviews-list">
                                            <ol class="reviews-list__content">
                                                <li class="reviews-list__item">
                                                    <div class="review">
                                                        <div class="review__avatar"><img srcset="{{shop_asset($shop->theme,'images/avatars/avatar1.jpg')}} 1x, {{shop_asset($shop->theme,'images/avatars/avatar1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/avatars/avatar1.jpg')}}" alt=""></div>
                                                        <div class="review__content">
                                                            <div class="review__author">Samantha Smith</div>
                                                            <div class="review__rating">
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="review__text">Phasellus id mattis nulla. Mauris velit nisi, imperdiet vitae sodales in, maximus ut lectus. Vivamus commodo scelerisque lacus, at porttitor dui iaculis id. Curabitur imperdiet ultrices fermentum.</div>
                                                            <div class="review__date">27 May, 2018</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                            <div class="reviews-list__pagination">
                                                <nav aria-label="Page navigation example">
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
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="reviews-view__form">
                                        <h2 class="reviews-view__header decor-header">Write A Review</h2>
                                        <div class="row">
                                            <div class="col-12 col-lg-9 col-xl-8">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="review-stars">Review Stars</label>
                                                        <select id="review-stars" class="form-control">
                                                            <option>5 Stars Rating</option>
                                                            <option>4 Stars Rating</option>
                                                            <option>3 Stars Rating</option>
                                                            <option>2 Stars Rating</option>
                                                            <option>1 Stars Rating</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="review-author">Your Name</label>
                                                        <input type="text" class="form-control" id="review-author" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="review-email">Email Address</label>
                                                        <input type="text" class="form-control" id="review-email" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="review-text">Your Review</label>
                                                    <textarea class="form-control" id="review-text" rows="6"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg">Post Your Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- block / end -->
            <!-- block-products-carousel -->
            <div class="block block-products-carousel">
                <div class="container">
                    <div class="block__title">
                        <h2 class="decor-header decor-header--align--center">Productos Relacionados</h2>
                    </div>
                    <div class="block-products-carousel__slider slider slider--with-arrows">
                        <div class="owl-carousel">
                            @foreach($product->relateds() as $row)
                            <div class="product-card product-card--layout--grid">
                                @if($row->is_sale)
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--style--sale">Oferta</div>
                                </div>
                                @endif
                                @if(!$row->is_sale && $row->new)
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
                                        <button class="btn btn-light btn-svg-icon btn-sm" data-add-wishlist="true" data-product-id="{{$row->id}}" type="button">
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
                                    @if($row->image)
                                        <a href="{{route('shop.product',['code' => $shop->code,'product_id'=>$row->id,'slug'=>$row->slug])}}"><img srcset="{{Storage::url($row->image)}} 1x, {{Storage::url($row->image)}} 2x" src="{{Storage::url($row->image)}}" alt="{{$row->title}}"></a>
                                    @else
                                        <a href="{{route('shop.product',['code' => $shop->code,'product_id'=>$row->id,'slug'=>$row->slug])}}"><img srcset="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}} 1x, {{shop_asset($shop->theme,'images/products/product1-1@2x.jpg')}} 2x" src="{{shop_asset($shop->theme,'images/products/product1-1.jpg')}}" alt=""></a>
                                    @endif
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__category">
                                        <a href="">{{$row->category->name}}</a>
                                    </div>
                                    <div class="product-card__name">
                                        <a href="{{route('shop.product',['code' => $shop->code,'product_id'=>$row->id,'slug'=>$row->slug])}}">{{$row->title}}</a>
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
                                        {!! $row->description_short !!}
                                    </div>
                                    <div class="product-card__prices-list">
                                        <div class="product-card__price">
                                            S/.{{number_format($row->is_sale ? $row->price_sale : $row->price,2)}}
                                        </div>
                                    </div>
                                    <div class="product-card__buttons">
                                        <div class="product-card__buttons-list">
                                            <button class="btn btn-primary product-card__addtocart" data-add-cart="true" data-product-id="{{$row->id}}" type="button">Agregar a Carrito</button>
                                            <button class="btn btn-light btn-svg-icon product-card__wishlist" data-add-wishlist="true" data-product-id="{{$row->id}}" type="button">
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
            <!-- block-products-carousel / end -->
        </div>
        <!-- page__body / end -->
    </div>
    <!-- page / end -->
@endsection
