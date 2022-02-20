@extends('landing.layout')
@section('title','Pagina Principal')
@section('content')
    <!-- Slider Begins -->
    <div id="rs-slider" class="rs-slider-section">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{{shop_asset('landing','images/bg/bg31.jpg')}}" data-delay="13000"  data-saveperformance="off"  data-title="Our Workplace">
                        <!-- MAIN IMAGE -->
                        <img src="{{shop_asset('landing','images/bg/portada.png')}}"  alt="kenburns1"  data-bgposition="center center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <!-- SUB LAYER  -->
                        <!-- LAYER NR. 2 -->
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
            <!-- wide Container -->
        </div>
        <!-- Slider Ends -->
        <!-- About Us Section -->
        <section id="welcome" class="welcome-section">
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp" data-animation-delay="300">
                        <h5>Welcome to</h5>
                        <h2><b>INTERMODA</b></h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p  class="description">Somos el grupo textil peruano líder en la venta por catálogo. Generamos moda, entregamos amor y actitud</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- About Us Content -->
                <div class="row tooltip-theme-bg">
                    <!-- Content Block Begins -->
                    <div class="col-md-3 col-sm-6 margin-large-top-1024" data-animation="fadeInLeft">
                        <!-- Content -->
                        <div class="text-center padding-large hvr-box-shadow semi-dark-shadow" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                            typesetting">
                            <div class="icon-part border-radius-block block-center margin-x-sm-bottom"><i class="icon-home5"></i>
                            </div>
                            <h4 class="text-capitalize no-margin">FIXZY</h4>
                        </div>
                        <!-- Ends Content -->
                    </div>
                    <!-- Content Block Begins -->
                    <!-- Content Block Begins -->
                    <div class="col-md-3 col-sm-6 margin-large-top-1024" data-animation="fadeInLeft">
                        <!-- Content -->
                        <div class="text-center padding-large hvr-box-shadow semi-dark-shadow" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                            typesetting">
                            <div class="icon-part border-radius-block block-center margin-x-sm-bottom"><i class="icon-users6"></i>
                            </div>
                            <h4 class="text-capitalize no-margin">RABBIT</h4>
                        </div>
                        <!-- Ends Content -->
                    </div>
                    <!-- Content Block Begins -->
                    <!-- Content Block Begins -->
                    <div class="col-md-3 col-sm-6 margin-large-top-1024" data-animation="fadeInLeft">
                        <!-- Content -->
                        <div class="text-center padding-large hvr-box-shadow semi-dark-shadow" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                            typesetting">
                            <div class="icon-part border-radius-block block-center margin-x-sm-bottom"><i class="icon-pagelines"></i>
                            </div>
                            <h4 class="text-capitalize no-margin">CATALINA</h4>
                        </div>
                        <!-- Ends Content -->
                    </div>
                    <!-- Content Block Begins -->
                    <!-- Content Block Begins -->
                    <div class="col-md-3 col-sm-6 margin-large-top-1024" data-animation="fadeInLeft">
                        <!-- Content -->
                        <a href="http://intermodaperu.com/backoffice/" target="_blank">
                            <div class="text-center padding-large hvr-box-shadow semi-dark-shadow" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                                typesetting">
                                <div class="icon-part border-radius-block block-center margin-x-sm-bottom"><i class="icon-connection-50"></i>
                                </div>
                                <h4 class="text-capitalize no-margin">INTRANET PEDIDOS</h4>
                            </div>
                        </a>
                        <!-- Ends Content -->
                    </div>
                    <!-- Content Block Begins -->
                </div>
                <!-- About Us Content -->
            </div>
            <!-- Container -->
        </section>
        <!-- Ends About Us section -->
        <!-- Service Section -->
        <section id="services" class="service-section">
            <div class="image-bg bg-no-repeat bg-cover" data-background="{{shop_asset('landing','images/bg/bg33.jpg')}}"></div>
            <div class="bg-color-overlay"></div>
            <div class="container relative z-index9">
                <!-- Title And Description Section -->
                <div class="row title-description m-title white-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp">
                        <h5>Nuestras últimas</h5>
                        <h2>campañas</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p class="description text-color-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- services Content Begins -->
                <div class="owl-example3 owl-carousel owl-btns-center">
                    <div class="item light-bg">
                        <img src="{{shop_asset('landing','images/fixzy_2020_02.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                        <h4>General Contracting</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
                    </div>
                    <div class="item light-bg">
                        <img src="{{shop_asset('landing','images/fixzy_2020_01.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                        <h4>CONSTRUCTION CONSULTANT</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
                    </div>
                    <div class="item light-bg">
                        <img src="{{shop_asset('landing','images/fixzy_2019_09.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                        <h4>HOUSE RENOVATION</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
                    </div>
                    <div class="item light-bg">
                        <img src="{{shop_asset('landing','images/build/4.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                        <h4>METAL ROOFING</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
                    </div>
                    <div class="item light-bg">
                        <img src="{{shop_asset('landing','images/build/5.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                        <h4>Flooring & Tiling</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id pariatur molestiae illum cum facere deserunt a enim harum eaque fugit.</p>
                    </div>
                </div>
                <!-- Ends services Content -->
            </div>
            <!-- container -->
        </section>
        <!-- Section -->
        <!-- Love It Section -->
        <section id="love-it" class="love-it-section">
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp">
                        <h5>Why you'll</h5>
                        <h2> Love it ?</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p  class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- Why You Love It Block -->
                <div class="row">
                    <!-- Option Images -->
                    <div class="col-md-7">
                        <div class="option-image-block relative" data-animation="fadeInUp">
                            <img src="{{shop_asset('landing','images/content/contruction.png')}}" alt="Mobile" class="img-responsive" width="1000" height="580">
                            <!-- Legend Content -->
                            <div class="legend">
                                <!-- Left Legend -->
                                <div class="legend1">
                                    <span class="option-bottom border-radius-block" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                                        typesetting"></span>
                                    <span class="option-top border-radius-block"></span>
                                </div>
                                <!-- Left Legend -->
                                <!-- Center Legend -->
                                <div class="legend2">
                                    <span class="option-bottom border-radius-block" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                                        typesetting"></span>
                                    <span class="option-top border-radius-block"></span>
                                </div>
                                <!-- Center Legend -->
                                <!-- Right Legend -->
                                <div class="legend3 no-display">
                                    <span class="option-bottom border-radius-block" data-toggle="tooltip" data-placement="top" title="Lorem Ipsum is simply dummy text of the printing and
                                        typesetting"></span>
                                    <span class="option-top border-radius-block"></span>
                                </div>
                                <!-- Right Legend -->
                            </div>
                            <!-- Legends Content -->
                        </div>
                        <!-- Option Image Block -->
                    </div>
                    <!-- Ends Option Images -->
                    <div class="col-md-5" data-animation="fadeInUp">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Panel 1 -->
                            <div class="panel panel-default">
                                <!-- Panel Heading -->
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Advanced Construction Tools
                                        </a>
                                    </h4>
                                </div>
                                <!-- Panel Heading -->
                                <!-- Panel Content -->
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body text-color-gray">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                </div>
                                <!-- Panel Content -->
                            </div>
                            <!-- Ends Panel -->
                            <!-- Panel 2 -->
                            <div class="panel panel-default">
                                <!-- Panel Heading -->
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Experienced and Skilled Engineers
                                        </a>
                                    </h4>
                                </div>
                                <!-- Panel Heading -->
                                <!-- Panel Content -->
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body text-color-gray">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                                    </div>
                                </div>
                                <!-- Panel Content -->
                            </div>
                            <!-- Ends Panel -->
                            <!-- Panel 1 -->
                            <div class="panel panel-default">
                                <!-- Panel Heading -->
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Superier Quality of products
                                        </a>
                                    </h4>
                                </div>
                                <!-- Panel Heading -->
                                <!-- Panel Content -->
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body text-color-gray">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    </div>
                                </div>
                                <!-- Panel Content -->
                            </div>
                            <!-- Ends Panel -->
                        </div>
                        <!-- Panel Gruop Begins -->
                        <p class="no-margin margin-sm-top padding-large bg-semi-dark text-color-white text-italic"><span class="text30 icon-right-quote-alt margin-sm-right"></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales <span class="tooltip-white-bg tooltip-sm"><a href="#" class="text-color-white text-quote hvr-theme-color-text" title="" data-placement="top" data-toggle="tooltip" data-original-title="Tooltip Light">Tooltip Light</a></span> lacinia.<span class="text30 icon-left-quote-alt margin-sm-left pull-right"></span></p>
                    </div>
                    <!-- col -->
                </div>
                <!-- Ends Why You Love It Block -->
            </div>
            <!-- container -->
        </section>
        <!-- Love It Section -->
        <!-- Fact Section -->
        <section id="fact" class="fact-section bg-light border-lighter-tb padding-large-top  padding-large-bottom">
            <div class="container z-index9 relative">
                <!-- Fun Content Begins -->
                <div class="row text-upps">
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft" data-animation-delay="300">
                        <div class="padding-large text-color-black text-center">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-black border-dash center-border">PROJECTS COMPLETED</h4>
                            <h3 class="no-margin text-300 text-color-black count-number" data-count="2025"><span class="counter"></span>+</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft">
                        <div class="padding-large text-color-black text-center">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-black border-dash center-border">WORKERS EMPLOYED</h4>
                            <h3 class="no-margin text-300 text-color-black count-number" data-count="3557"><span class="counter"></span>+</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft">
                        <div class="padding-large text-color-black text-center">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-black border-dash center-border">BESTBUILD</h4>
                            <h3 class="no-margin text-300 text-color-black count-number" data-count="1545"><span class="counter"></span>+</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft">
                        <div class="padding-large text-color-black text-center">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-black border-dash center-border">MACHINES</h4>
                            <h3 class="no-margin text-300 count-number text-color-black" data-count="3075"><span class="counter"></span>+</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                </div>
                <!-- Ends Fun Content -->
            </div>
            <!-- container -->
        </section>
        <!-- Fact Section -->
        <!-- Works Section -->
        <section id="works" class="works-section">
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp">
                        <h5>What We love</h5>
                        <h2>Our GALLERY</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p  class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Portfolio Filter Begins -->
                        <ul class="margin-x-m-large-bottom text-center nav nav-pills project-filters" id="filters" data-animation="fadeInUp">
                            <li><a href="#" data-filter=".all" class="filter active text-uppercase text-color-gray text-600 hvr-theme-color-text">Show All</a></li>
                            <li><a href="#" data-filter=".web" class="filter text-uppercase text-color-gray text-600 hvr-theme-color-text">INTERIOR</a></li>
                            <li><a href="#" data-filter=".graphic" class="filter text-uppercase text-color-gray text-600 hvr-theme-color-text">GARDEN</a></li>
                            <li><a href="#" data-filter=".photo" class="filter text-uppercase text-color-gray text-600 hvr-theme-color-text">PAINTING</a></li>
                            <li><a href="#" data-filter=".brand" class="filter text-uppercase text-color-gray text-600 hvr-theme-color-text">DESIGN AND BUILD</a></li>
                            <li><a href="#" data-filter=".mock" class="filter text-uppercase text-color-gray text-600 hvr-theme-color-text">SOLAR SYSTEMS</a></li>
                        </ul>
                        <!-- Portfolio Container Begins -->
                        <div class="project-grid">
                            <div class="grid-sizer"></div>
                            <!-- portfolio item 1 -->
                            <div class="item w3 all web photo">
                                <div class="portfolio-item effect-parent relative">
                                    <!-- Work Image -->
                                    <img src="{{shop_asset('landing','images/works/15.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                                    <!-- Overlay Bg Color -->
                                    <div class="effect overlay theme-bg-color"></div>
                                    <!-- Overlay Top Caption -->
                                    <div class="overlay-caption text-color-white padding-large">
                                        <p class=" text-italic no-margin border-dash white padding-sm-bottom margin-sm-bottom"> In Lorem Ipsum Business </p>
                                        <h4 class="no-margin text-color-white"> Title </h4>
                                    </div>
                                    <!-- Overlay Bottom Caption -->
                                    <ul class="text-center overlay-caption bottom text-color-white padding-large links">
                                        <li><a  class="hvr-theme-color-text" title="Portfolio" href="{{shop_asset('landing','images/works/15.jpg')}}" data-rel="prettyPhoto[gallery01]"><i class="icon-search3"></i></a>
                                        </li>
                                        <li><a class="hvr-theme-color-text" href="portfolio-single.html"><i class="icon-hyperlink"></i></a></li>
                                        <li><a class="hvr-theme-color-text" href="#"><i class="icon-heart3"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Portfolio Item -->
                            </div>
                            <!-- portfolio item 1 -->
                            <!-- portfolio item 2 -->
                            <div class="item w3 all brand photo">
                                <div class="portfolio-item effect-parent relative">
                                    <!-- Work Image -->
                                    <img src="{{shop_asset('landing','images/works/16.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                                    <!-- Overlay Bg Color -->
                                    <div class="effect overlay theme-bg-color"></div>
                                    <!-- Overlay Top Caption -->
                                    <div class="overlay-caption text-color-white padding-large">
                                        <p class=" text-italic no-margin border-dash white padding-sm-bottom margin-sm-bottom"> In Lorem Ipsum Business </p>
                                        <h4 class="no-margin text-color-white"> Title </h4>
                                    </div>
                                    <!-- Overlay Bottom Caption -->
                                    <ul class="text-center overlay-caption bottom text-color-white padding-large links">
                                        <li><a  class="hvr-theme-color-text" title="Portfolio" href="{{shop_asset('landing','images/works/16.jpg')}}" data-rel="prettyPhoto[gallery01]"><i class="icon-search3"></i></a>
                                        </li>
                                        <li><a class="hvr-theme-color-text" href="portfolio-single.html"><i class="icon-hyperlink"></i></a></li>
                                        <li><a class="hvr-theme-color-text" href="#"><i class="icon-heart3"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Portfolio Item -->
                            </div>
                            <!-- portfolio item 2 -->
                            <!-- portfolio item 3 -->
                            <div class="item w3 all web photo">
                                <div class="portfolio-item effect-parent relative">
                                    <!-- Work Image -->
                                    <img src="{{shop_asset('landing','images/works/17.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                                    <!-- Overlay Bg Color -->
                                    <div class="effect overlay theme-bg-color"></div>
                                    <!-- Overlay Top Caption -->
                                    <div class="overlay-caption text-color-white padding-large">
                                        <p class=" text-italic no-margin border-dash white padding-sm-bottom margin-sm-bottom"> In Lorem Ipsum Business </p>
                                        <h4 class="no-margin text-color-white"> Title </h4>
                                    </div>
                                    <!-- Overlay Bottom Caption -->
                                    <ul class="text-center overlay-caption bottom text-color-white padding-large links">
                                        <li><a  class="hvr-theme-color-text" title="Portfolio" href="{{shop_asset('landing','images/works/17.jpg')}}" data-rel="prettyPhoto[gallery01]"><i class="icon-search3"></i></a>
                                        </li>
                                        <li><a class="hvr-theme-color-text" href="portfolio-single.html"><i class="icon-hyperlink"></i></a></li>
                                        <li><a class="hvr-theme-color-text" href="#"><i class="icon-heart3"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Portfolio Item -->
                            </div>
                            <!-- portfolio item 3 -->
                            <!-- portfolio item 4 -->
                            <div class="item w3 all web graphic photo mock">
                                <div class="portfolio-item effect-parent relative">
                                    <!-- Work Image -->
                                    <img src="{{shop_asset('landing','images/works/18.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                                    <!-- Overlay Bg Color -->
                                    <div class="effect overlay theme-bg-color"></div>
                                    <!-- Overlay Top Caption -->
                                    <div class="overlay-caption text-color-white padding-large">
                                        <p class=" text-italic no-margin border-dash white padding-sm-bottom margin-sm-bottom"> In Lorem Ipsum Business </p>
                                        <h4 class="no-margin text-color-white"> Title </h4>
                                    </div>
                                    <!-- Overlay Bottom Caption -->
                                    <ul class="text-center overlay-caption bottom text-color-white padding-large links">
                                        <li><a  class="hvr-theme-color-text" title="Portfolio" href="{{shop_asset('landing','images/works/18.jpg')}}" data-rel="prettyPhoto[gallery01]"><i class="icon-search3"></i></a>
                                        </li>
                                        <li><a class="hvr-theme-color-text" href="portfolio-single.html"><i class="icon-hyperlink"></i></a></li>
                                        <li><a class="hvr-theme-color-text" href="#"><i class="icon-heart3"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Portfolio Item -->
                            </div>
                            <!-- portfolio item 4 -->
                            <!-- portfolio item 5 -->
                            <div class="item w3 all web mock">
                                <div class="portfolio-item effect-parent relative">
                                    <!-- Work Image -->
                                    <img src="{{shop_asset('landing','images/works/19.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                                    <!-- Overlay Bg Color -->
                                    <div class="effect overlay theme-bg-color"></div>
                                    <!-- Overlay Top Caption -->
                                    <div class="overlay-caption text-color-white padding-large">
                                        <p class=" text-italic no-margin border-dash white padding-sm-bottom margin-sm-bottom"> In Lorem Ipsum Business </p>
                                        <h4 class="no-margin text-color-white"> Title </h4>
                                    </div>
                                    <!-- Overlay Bottom Caption -->
                                    <ul class="text-center overlay-caption bottom text-color-white padding-large links">
                                        <li><a  class="hvr-theme-color-text" title="Portfolio" href="{{shop_asset('landing','images/works/19.jpg')}}" data-rel="prettyPhoto[gallery01]"><i class="icon-search3"></i></a>
                                        </li>
                                        <li><a class="hvr-theme-color-text" href="portfolio-single.html"><i class="icon-hyperlink"></i></a></li>
                                        <li><a class="hvr-theme-color-text" href="#"><i class="icon-heart3"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Portfolio Item -->
                            </div>
                            <!-- portfolio item 5 -->
                            <!-- portfolio item 6 -->
                            <div class="item w3 all web graphic photo">
                                <div class="portfolio-item effect-parent relative">
                                    <!-- Work Image -->
                                    <img src="{{shop_asset('landing','images/works/20.jpg')}}" alt="image" class="img-responsive" height="600" width="600">
                                    <!-- Overlay Bg Color -->
                                    <div class="effect overlay theme-bg-color"></div>
                                    <!-- Overlay Top Caption -->
                                    <div class="overlay-caption text-color-white padding-large">
                                        <p class=" text-italic no-margin border-dash white padding-sm-bottom margin-sm-bottom"> In Lorem Ipsum Business </p>
                                        <h4 class="no-margin text-color-white"> Title </h4>
                                    </div>
                                    <!-- Overlay Bottom Caption -->
                                    <ul class="text-center overlay-caption bottom text-color-white padding-large links">
                                        <li><a  class="hvr-theme-color-text" title="Portfolio" href="{{shop_asset('landing','images/works/20.jpg')}}" data-rel="prettyPhoto[gallery01]"><i class="icon-search3"></i></a>
                                        </li>
                                        <li><a class="hvr-theme-color-text" href="portfolio-single.html"><i class="icon-hyperlink"></i></a></li>
                                        <li><a class="hvr-theme-color-text" href="#"><i class="icon-heart3"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Portfolio Item -->
                            </div>
                            <!-- portfolio item 6 -->
                        </div>
                        <!-- end portfolioContainer -->
                    </div>
                    <!-- Col 12 -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </section>
        <!-- Ends Works Section -->
        <!-- Customer Section Begins -->
        <section id="customer" class="customer-section">
            <div class="image-bg bg-fixed bg-no-repeat" data-background="{{shop_asset('landing','images/bg/bg33.jpg')}}"></div>
            <div class="bg-color-overlay"></div>
            <div class="container z-index9 relative">
                <!-- Title And Description Section -->
                <div class="row title-description m-title white-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp">
                        <h5>Our Satisfied</h5>
                        <h2>Customers</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p class="description text-color-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- customer Content Begins -->
                <div class="owl-example5 owl-carousel owl-btns-center theme-color-owl-btn" data-animation="fadeInUp">
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/1.png')}}" class="img-responsive" height="240" width="240"></div>
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/2.png')}}" class="img-responsive" height="240" width="240"></div>
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/3.png')}}" class="img-responsive" height="240" width="240"></div>
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/4.png')}}" class="img-responsive" height="240" width="240"></div>
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/5.png')}}" class="img-responsive" height="240" width="240"></div>
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/6.png')}}" class="img-responsive" height="240" width="240"></div>
                    <div class="item"><img alt="Clients" src="{{shop_asset('landing','images/clients/7.png')}}" class="img-responsive" height="240" width="240"></div>
                </div>
                <!-- customer Content Begins -->
            </div>
            <!-- container -->
        </section>
        <!-- Ends customer Section -->
        <!-- Happy Theme Users Section -->
        <section id="happy-users" class="happy-user-section bg-light padding-large">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center" data-animation="fadeInUp">
                        <h2 class="no-margin text-color-black text-300 count-number" data-count="1200"><span> Join The </span>
                            <span class="counter"></span> + <span> Satisfied <b class="theme-color-text text-300">pearl</b> Users! </span>
                            <button class="btn btn-default btn-theme-color-inverse hvr-border margin-large-left" type="button">Purchase It !</button>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ends Theme Users Section -->
        <!-- Footer Section Begins -->
        <section id="footer" class="footer-section padding-x-x-large-top">
            <div class="container relative z-index9">
                <div class="row">
                    <!-- Footer About Block -->
                    <div class="col-sm-3" data-animation="fadeInUp">
                        <!-- About -->
                        <div class="about-footer">
                            <a class="navbar-brand text-color-white no-float no-padding" href="#"><span class="logo-first-letter">P</span>ear<span class="theme-color-text text-600">l</span></a>
                            <p class="no-margin text-color-light-gray margin-sm-top">Pearl is a premium Html5 Multi Purpose theme with Fully Responsive Layout. It’s extremely customizable, Flexible And Editable.</p>
                            <p class="no-margin margin-sm-top"><a href="#" class="text-theme-color hvr-color-white-text"><i class=" icon-chevron-thin-right"></i> &nbsp;Buy Pearl Theme</a></p>
                        </div>
                        <!-- About Footer -->
                    </div>
                    <!-- Footer About Block -->
                    <!-- Footer Recent Post Block -->
                    <div class="col-sm-3" data-animation="fadeInUp">
                        <!-- About -->
                        <div class="recent-footer before-icon">
                            <!-- Footer Block Title -->
                            <h4 class="text-color-white no-margin margin-sm-bottom">Recent Post</h4>
                            <!-- Recent Post -->
                            <ul class="recent-post">
                                <li><a href="#" class="bottom-border-light semi-dark text-color-light-gray hvr-theme-color-text">Blog image Post</a></li>
                                <li><a href="#" class="bottom-border-light semi-dark text-color-light-gray hvr-theme-color-text">Vimeo video Post</a></li>
                                <li><a href="#" class="bottom-border-light semi-dark text-color-light-gray hvr-theme-color-text">Recent tweet</a></li>
                                <li><a href="#" class="bottom-border-light semi-dark text-color-light-gray hvr-theme-color-text">Blog Audio Post</a></li>
                                <li><a href="#" class="bottom-border-light semi-dark text-color-light-gray hvr-theme-color-text">Youtube Video Post</a></li>
                            </ul>
                            <!-- Recent Post -->
                        </div>
                        <!-- About Footer -->
                    </div>
                    <!-- Footer Recent Post Block -->
                    <!-- Footer Recent Post Block -->
                    <div class="col-sm-3" data-animation="fadeInUp">
                        <!-- About -->
                        <div class="recent-footer clearfix">
                            <!-- Footer Block Title -->
                            <h4 class="text-color-white no-margin margin-sm-bottom">Tags</h4>
                            <!-- Recent Post -->
                            <ul class="tags">
                                <li><a href="#" class="">Travel</a></li>
                                <li><a href="#" class="">Sports</a></li>
                                <li><a href="#" class="">Audio</a></li>
                                <li><a href="#" class="">Development</a></li>
                                <li><a href="#" class="">Drawing</a></li>
                                <li><a href="#" class="">Design</a></li>
                                <li><a href="#" class="">Media</a></li>
                                <li><a href="#" class="">Quote</a></li>
                                <li><a href="#" class="">Html5 & CSS3</a></li>
                                <li><a href="#" class="">Wordpress</a></li>
                            </ul>
                            <!-- Recent Post -->
                        </div>
                        <!-- About Footer -->
                    </div>
                    <!-- Footer Recent Post Block -->
                    <!-- Footer Recent Post Block -->
                    <div class="col-sm-3" data-animation="fadeInUp">
                        <!-- About -->
                        <div class="recent-footer">
                            <!-- Footer Block Title -->
                            <h4 class="text-color-white no-margin margin-sm-bottom">Flickr</h4>
                            <div class="flickr my-feeds">
                                <div class="social-feed instagram-feed"></div>
                            </div>
                        </div>
                        <!-- About Footer -->
                    </div>
                    <!-- Footer Recent Post Block -->
                </div>
                <!-- row -->
            </div>
            <!-- Container -->
            <!-- Cpoy Rights Section Begins -->
            <div id="coprights" class="copyrights-section padding-sm-top padding-sm-bottom margin-x-x-large-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" data-animation="fadeInUp">
                            <p class="no-margin text-color-light-gray">&copy; &nbsp; 2015 <a href="#" class="theme-color-text hvr-theme-color-text">Pearl</a> theme by
                                <span class="text-color-white hvr-theme-color-text">Zozothemes</span> &nbsp; All rights Reserved
                            </p>
                        </div>
                        <div class="col-sm-6" data-animation="fadeInUp">
                            <ul class="social-links light text-right no-icon-border tooltip-sm tooltip-white-bg">
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="twitter"><i class="icon-twitter5"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="youtube"><i class="icon-youtube3"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="flickr"><i class="icon-flickr"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="facebook"><i class="icon-facebook5"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="google"><i class="icon-google2"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="github"><i class="icon-github2"></i></a></li>
                                <li><a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="linkedin"><i class="icon-linkedin2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cpoy Rights Section Begins -->
@endsection