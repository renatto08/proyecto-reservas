
<!-- Top to Bottom Button -->
<div id="top" class="elevator"></div>
<div id="bottom" class="elevator"></div>
<!-- Top to Bottom Button Ends -->
<!-- Top bar -->
<div id="topbar" class="topbar-section relative">
    <div class="container relative">
        <div class="row">
            <div class="col-xs-12">
                <div class="top-left vertical-left-align-middle-block">
                    <ul class="no-margin">
                        <li><a href="#" class="hvr-theme-color-text"><img src="{{shop_asset('landing','images/fra-flag.png')}}" alt="Flag"></a></li>
                        <li><a href="#" class="hvr-theme-color-text"><img src="{{shop_asset('landing','images/ger-flag.png')}}" alt="Flag"></a></li>
                        <li><a href="#" class="hvr-theme-color-text"><img src="{{shop_asset('landing','images/eng-flag.png')}}" alt="Flag"></a></li>
                        <li><a href="#" class="hvr-theme-color-text"><i class="icon-mail"></i>fixzyperu@hotmail.com</a></li>
                    </ul>
                </div>
                <div class="top-right pull-right">
                    <ul class="social-links light no-icon-border text14">
                        <li><a href="#"><i class="icon-twitter4"></i></a></li>
                        <li><a href="#"><i class="icon-youtube3"></i></a></li>
                        <li><a href="#"><i class="icon-flickr"></i></a></li>
                        <li><a href="#"><i class="icon-facebook5"></i></a></li>
                        <li><a href="#"><i class="icon-google2"></i></a></li>
                        <li><a href="#"><i class="icon-github2"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ends Topbar -->
<!-- Header Begins -->
<header id="header" class="navbar-light">
    <div class="sticker">
        <nav class="navbar navbar-default no-margin">
            <div class="container relative">
                <div class="navbar-header">
                    <!-- Mobile View Menu Toogle Btn -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Site Logo -->
                    <a class="navbar-brand vertical-left-align-middle-block" href="index.html"><img alt="logo" src="{{shop_asset('landing','images/logo-dark.png')}}" height="37" width="72"></a>
                </div>
                 <!-- Nav Menu -->
                 <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Mega Menu Begins -->
                                <li class="zozo-megamenu-menu dropdown">
                                    <a href="{{url('/')}}" class="active">Inicio</a>
                                </li>
                                <!-- Mega Menu Begins -->
                                <!-- Dropdown Menu begins -->
                                <li class="dropdown">
                                    <a href="{{route('about')}}">Nosotros</a>
                                </li>
                                <!-- Dropdown Menu Ends -->

                                <!-- Dropdown Menu Begins -->
                                <li class="dropdown">
                                    <a href="{{route('catalogo')}}">Catálogos</a>
                                </li>
                                <!-- Dropdown Menu Ends -->
                                <!-- Dropdown Menu begins -->
                                <li class="zozo-megamenu-menu dropdown">
                                    <a href="{{route('contact')}}">Contáctanos</a>
                                </li>
                                <!-- Dropdown Menu Ends -->
                                <!-- Header Contact -->
                                <li class="dropdown header-toggle hidden-767"><a class="cursor-pointer header-contact"><span><i class="icon-iphone"></i></span></a></li>
                                <!-- Header Contact -->
                                <li class="dropdown header-toggle hidden-767"><a class="cursor-pointer header-search"><span><i class="icon-search3"></i></span></a></li>
                            </ul>
                            <!-- Right navbar Ends -->
                        </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
            <!-- Toggle Menus -->
            <!-- Header Contact Content -->
            <div class="text-color-black hide-show-content header-contact-content">
                <div class="container relative">
                    <span class="header-phone">Call Us <strong>+0 (123) 456 78 90</strong></span>
                    <button class="close"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- Header Contact Content -->
            <!-- Header Search Content -->
            <div class="text-color-black hide-show-content header-search-content">
                <div class="container relative">
                    <form class="navbar-form navbar-transparent no-margin">
                        <div class="form-group">
                            <input type="text" placeholder="type your text & hit Enter" class="form-control" id="s" name="s" value="">
                        </div>
                    </form>
                    <button class="close"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- Header Search Content -->
            <!-- Toggle Menus -->
        </nav>
        <!-- nav Ends -->
    </div>
    <!-- Sticky ends -->
</header>
<!-- Header Ends -->