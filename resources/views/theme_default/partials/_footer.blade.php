<!-- site__footer -->
<footer class="site__footer">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer__widgets">
                        <div class="row justify-content-between">
                            <!-- start-->
                            @if($shop->footer)
                            {!! $shop->footer !!}
                            @else
                                <div class="col-12 col-lg-8 col-sm-6"></div>
                            @endif
                            <!--
                            <div class="col-12 col-lg-4 col-sm-6 footer__aboutus">
                                <div class="footer-aboutus">
                                    <div class="footer-aboutus__title">
                                        <h4 class="footer-aboutus__header decor-header">About Us</h4>
                                    </div>
                                    <div class="footer-aboutus__text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Integer in feugiat lorem.
                                        Pellentque ac placerat tellus. Ut a lectus magna.
                                        Mauris sed coqut odio.
                                    </div>
                                    <ul class="footer-aboutus__contacts">
                                        <li class="footer-aboutus__contacts-item">
                                            <a href="">715 Park Ave, NY 10021 USA</a>
                                        </li>
                                        <li class="footer-aboutus__contacts-item"><a href="">meblya@example.com</a></li>
                                        <li class="footer-aboutus__contacts-item"><a href="">+1 754 000-00-00</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 col-sm-6 col-md-3">
                                <div class="footer-links" data-collapse data-collapse-opened-class="footer-links--opened" data-collapse-item>
                                    <div class="footer-links__title">
                                        <h4 class="footer-links__header" data-collapse-trigger>
                                            Information
                                            <svg class="footer-links__header-arrow" width="9px" height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-down-9x6"></use>
                                            </svg>
                                        </h4>
                                    </div>
                                    <div class="footer-links__content" data-collapse-content>
                                        <ul class="footer-links__list">
                                            <li class="footer-links__item"><a href="" class="footer-links__link">About Us</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Delivery Information</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Privacy Policy</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Brands</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Contact Us</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Returns</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Site Map</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 col-sm-6 col-md-3">
                                <div class="footer-links" data-collapse data-collapse-opened-class="footer-links--opened" data-collapse-item>
                                    <div class="footer-links__title">
                                        <h4 class="footer-links__header" data-collapse-trigger>
                                            My Account
                                            <svg class="footer-links__header-arrow" width="9px" height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-down-9x6"></use>
                                            </svg>
                                        </h4>
                                    </div>
                                    <div class="footer-links__content" data-collapse-content>
                                        <ul class="footer-links__list">
                                            <li class="footer-links__item"><a href="" class="footer-links__link">My Account</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Order History</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Wish List</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Newsletter</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Specials</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Gift Certificates</a></li>
                                            <li class="footer-links__item"><a href="" class="footer-links__link">Affiliate</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            -->

                            <div class="col-12 col-lg-4 footer__followus">
                                <div class="footer-followus">
                                    <div class="footer-followus__title">
                                        <h4 class="footer-followus__header">Suscribete</h4>
                                    </div>
                                    <div class="footer-followus__text">
                                        Registra tu correo y te enviaremos nuevas tendencias.
                                    </div>
                                    <form class="footer-followus__subscribe-form" method="post" action="{{route('shop.subscription',['code'=>$shop->code])}}">
                                        {{csrf_field()}}
                                        <input type="hidden" value="{{$shop->id}}" name="shop_id">
                                        <input type="hidden" value="SUBSCRIPCION" name="type">
                                        <input type="text" name="email" class="form-control form-control--footer" placeholder="Email / Telefono" required>
                                        <button type="submit" class="btn btn-primary">Añadirme</button>
                                    </form>
                                    <ul class="footer-followus__social-links">
                                        @if($shop->facebook)
                                        <li class="footer-followus__social-link"><a href="{{$shop->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                            @if($shop->twitter)
                                        <li class="footer-followus__social-link"><a href="{{$shop->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            @endif
                                            @if($shop->instagram)
                                        <li class="footer-followus__social-link"><a href="{{$shop->instagram}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                            @endif
                                            @if($shop->youtube)
                                        <li class="footer-followus__social-link"><a href="{{$shop->youtube}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            @endif
                                    </ul>
                                </div>
                            </div>

                            <!-- end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-sm-auto">
                    <div class="copyright">
                        <a href="">E-Commerce</a> by <a href="">Anonymus</a>
                    </div>
                </div>
                <div class="footer__payments col-auto">
                    <!--<img srcset="{{shop_asset($shop->theme,'images/payments.png')}} 1x, {{shop_asset($shop->theme,'images/payments@2x.png')}} 2x" src="{{shop_asset($shop->theme,'images/payments.png')}}" alt="">-->
                        <img class="ml-1" height="48px" src="{{shop_asset($shop->theme,'images/brands/amex.png')}}" alt="amex">
                        <img class="ml-2" height="48px" src="{{shop_asset($shop->theme,'images/brands/dinners.png')}}" alt="amex">
                        <img class="ml-2" height="48px" src="{{shop_asset($shop->theme,'images/brands/visa.png')}}" alt="amex">
                        <img class="ml-2" height="48px" src="{{shop_asset($shop->theme,'images/brands/master_card.png')}}" alt="amex">
                        <img class="ml-2" height="48px" src="{{shop_asset($shop->theme,'images/brands/paypal.png')}}" alt="amex">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- site__footer / end -->

<!-- scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('themes/default/js/main.js')}}"></script>
<!-- end scripts -->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

