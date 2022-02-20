@extends('landing.layout')
@section('title','Nosotros')
@section('content')
<!-- Welcome Section -->
<section id="welcome" class="welcome-setion">
    <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp" data-animation-delay="300">
                        <h5>Welcome To</h5>
                        <h2>Pearl</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp" data-animation-delay="300">
                            <p  class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <div class="row">
                    <!-- Starts -->
                    <div class="col-sm-4">
                        <!-- Block Begins -->
                        <div class="padding-large-bottom">
                            <p class="numbering no-margin text-16 text-700 theme-color-text no-padding">01.</p>
                            <h4 class="no-margin margin-sm-bottom">Mission</h4>
                            <img src="{{shop_asset('landing','images/about-us/4.jpg')}}" class="img-responsive" alt="Welcome Plan" height="400" width="750">
                            <p  class="no-margin margin-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Block Begins -->
                    </div>
                    <!-- Ends Col -->
                    <!-- Starts -->
                    <div class="col-sm-4">
                        <!-- Block Begins -->
                        <div class="padding-large-bottom">
                            <p class="numbering no-margin text-16 text-700 theme-color-text no-padding">02.</p>
                            <h4 class="no-margin margin-sm-bottom">Vission</h4>
                            <img src="{{shop_asset('landing','images/about-us/5.jpg')}}" class="img-responsive" alt="Welcome Plan" height="400" width="750">
                            <p  class="no-margin margin-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Block Begins -->
                    </div>
                    <!-- Ends Col -->
                    <!-- Starts -->
                    <div class="col-sm-4">
                        <!-- Block Begins -->
                        <div class="">
                            <p class="numbering no-margin text-16 text-700 theme-color-text no-padding">03.</p>
                            <h4 class="no-margin margin-sm-bottom">Mission</h4>
                            <img src="{{shop_asset('landing','images/about-us/6.jpg')}}" class="img-responsive" alt="Welcome Plan" height="400" width="750">
                            <p  class="no-margin margin-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Block Begins -->
                    </div>
                    <!-- Ends Col -->
                </div>
                <!-- Row -->
            </div>
            <!-- container -->
        </section>
        <!-- Ends Welcome Section -->
        <!-- Fact Section -->
        <section id="fact" class="fact-section">
            <div class="image-bg bg-fixed bg-no-repeat bg-cover" data-background="{{shop_asset('landing','images/bg/bg1.jpg')}}"></div>
            <div class="bg-color-overlay"></div>
            <div class="container z-index9 relative">
                <!-- Fun Content Begins -->
                <div class="row">
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft" data-animation-delay="300">
                        <div class="count-block padding-large text-color-white text-center bg-semi-light-gray">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-white border-dash center-border">Requirements</h4>
                            <h3 class="no-margin text-color-white text-300 count-number" data-count="20"><span class="counter"></span>%</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft">
                        <div class="count-block padding-large text-color-white text-center bg-semi-light-gray">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-white border-dash center-border">Analysis</h4>
                            <h3 class="no-margin text-color-white text-300 count-number" data-count="35"><span class="counter"></span>%</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft">
                        <div class="count-block padding-large text-color-white text-center bg-semi-light-gray">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-white border-dash center-border">Implementation</h4>
                            <h3 class="no-margin text-color-white text-300 count-number" data-count="15"><span class="counter"></span>%</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                    <!-- Counter Block -->
                    <div class="col-sm-3" data-animation="fadeInLeft">
                        <div class="count-block padding-large text-color-white text-center bg-semi-light-gray">
                            <h4 class="no-margin margin-sm-bottom padding-sm-bottom text-color-white border-dash center-border">Testing</h4>
                            <h3 class="no-margin text-color-white text-300 count-number" data-count="30"><span class="counter"></span>%</h3>
                        </div>
                    </div>
                    <!-- Ends Counter Block -->
                </div>
                <!-- Ends Fun Content -->
            </div>
            <!-- container -->
        </section>
        <!-- Fact Section -->
        <!-- Love It Section -->
        <section id="love-it" class="love-it-section">
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp" data-animation-delay="300">
                        <h5>Why you'll</h5>
                        <h2>Love it</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp" data-animation-delay="300">
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
                    <div class="col-md-6">
                        <!-- Slider Inner -->
                        <div class="owl-example6 owl-carousel owl-btns-center theme-color-owl-btn">
                            <!-- Item Begins -->
                            <div class="item no-margin"><img  alt="about" src="{{shop_asset('landing','images/about-us/mob1.png')}}" class="img-responsive block-center" height="193" width="560"></div>
                            <div class="item no-margin"><img  alt="about" src="{{shop_asset('landing','images/about-us/mob2.png')}}" class="img-responsive block-center" height="193" width="560"></div>
                            <div class="item no-margin"><img  alt="about" src="{{shop_asset('landing','images/about-us/mob3.png')}}" class="img-responsive block-center" height="193" width="560"></div>
                        </div>
                        <!-- Ends Slider -->	
                    </div>
                    <!-- Ends Option Images -->
                    <div class="col-md-6" data-animation="fadeInUp">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Panel 1 -->
                            <div class="panel panel-default">
                                <!-- Panel Heading -->
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Theme of Pearl Brunch 3 wolf?		 					
                                        </a>
                                    </h4>
                                </div>
                                <!-- Panel Heading -->
                                <!-- Panel Content -->
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body text-color-gray">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor  							
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
                                        Pearl Agency is a piece of here? 							
                                        </a>
                                    </h4>
                                </div>
                                <!-- Panel Heading -->
                                <!-- Panel Content -->
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body text-color-gray">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor 
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
                                        There is a piece of literature here?							
                                        </a>
                                    </h4>
                                </div>
                                <!-- Panel Heading -->
                                <!-- Panel Content -->
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body text-color-gray">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor 
                                    </div>
                                </div>
                                <!-- Panel Content -->
                            </div>
                            <!-- Ends Panel -->
                        </div>
                        <!-- Panel Gruop Begins -->
                    </div>
                    <!-- col -->
                </div>
                <!-- Ends Why You Love It Block -->
            </div>
            <!-- container -->
        </section>
        <!-- Love It Section -->
        <!-- Video Section -->
        <section id="who-we-are" class="who-we-are-section no-padding">
            <div class="image-bg bg-fixed bg-no-repeat bg-cover bg-pos-50-100" data-background="{{shop_asset('landing','images/bg/bg5.jpg')}}"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <div id="video" class="video-bg video-block-dimention">
                            <div class="movie" data-property="{videoURL:'https://youtu.be/v1uyQZNg2vE',containment:'#video',startAt:6, mute:true, autoPlay:true, showControls:false}">
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-md-6 no-padding theme-bg-color" data-animation="fadeInUp" data-animation-delay="300">
                        <div class="who-we-are-block padding-x-x-large video-about-block video-block-dimention ">
                            <!-- Title And Description Section -->
                            <div class="title-description small-title white-title no-padding">
                                <h5>Who We Are ? </h5>
                                <h2>More About Us</h2>
                            </div>
                            <!-- Title And Description Section -->
                            <!-- Item Begins -->
                            <div class="video-about-content">
                                <p class="text-color-white no-margin">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap <span class="text-just-hand text-800 text-hight-light"> popularised in the 1960s </span> with the release of Letraset sheets containing</p>
                                <ul class="margin-sm-top">
                                    <li class="no-margin likes text-16 text-color-white">
                                        <i class="icon-check2 text-20 margin-x-sm-right"></i>There Was a crambled it to make a type specimen book.
                                    </li>
                                    <li class="no-margin likes text-16 text-color-white margin-x-sm-top">
                                        <i class="icon-check2 text-20 margin-x-sm-right"></i>The pearl theme essentially unchanged
                                    </li>
                                    <li class="no-margin likes text-16 text-color-white margin-x-sm-top">
                                        <i class="icon-check2 text-20 margin-x-sm-right"></i>It Will popular in the 2015s
                                    </li>
                                    <li class="no-margin likes text-16 text-color-white margin-x-sm-top">
                                        <i class="icon-check2 text-20 margin-x-sm-right"></i>Each Page is Created unknown printer took a galley of type
                                    </li>
                                </ul>
                                <ul class="button-set margin-large-top">
                                    <li><a href="#" class="btn btn-default btn-white">Join Us</a></li>
                                    <li><a href="#" class="btn btn-default btn-white">Learn More</a></li>
                                </ul>
                            </div>
                            <!-- Item Ends -->
                        </div>
                        <!-- Who We Are Block -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
                <div class="clearfix"></div>
            </div>
            <!-- container -->
        </section>
        <!-- Ends Video Section -->		
        <!-- Development Section -->
        <section id="development" class="development-section">
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp" data-animation-delay="300">
                        <h5>Why you'll</h5>
                        <h2> Development</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp" data-animation-delay="300">
                            <p  class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- Why You Love It Block -->
                <div class="row">
                    <div class="col-md-6" data-animation="fadeInUp">
                        <!-- Tab Begins -->
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab-about-us" aria-controls="tab-about-us" role="tab" data-toggle="tab">About us</a></li>
                                <li role="presentation"><a href="#tab-what-do" aria-controls="tab-what-do" role="tab" data-toggle="tab">What We Do ?</a></li>
                                <li role="presentation"><a href="#tab-team" aria-controls="tab-team" role="tab" data-toggle="tab">Our Team</a></li>
                                <li role="presentation"><a href="#tab-carrers" aria-controls="tab-carrers" role="tab" data-toggle="tab">Carrers</a></li>
                            </ul>
                            <!-- Tab panes Container-->
                            <div class="tab-content">
                                <!-- Tab Begins -->
                                <div role="tabpanel" class="tab-pane active fade in" id="tab-about-us">
                                    <!-- Tab Content Body -->
                                    <div class="tab-body padding-large-top padding-large-bottom">
                                        <h4 class="no-margin">About us</h4>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was <span class="text-just-hand text-800 theme-color-text text-hight-light">popularised in the 1960s</span> with the release of Letraset sheets containing</p>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                                            dummy text.
                                        </p>
                                        <button class="btn btn-default btn-theme-color margin-sm-top" type="button">Learn more</button>
                                    </div>
                                    <!-- Tab Content Body -->
                                </div>
                                <!-- Ends Tab -->
                                <!-- Tab Begins -->
                                <div role="tabpanel" class="tab-pane fade" id="tab-what-do">
                                    <!-- Tab Content Body -->
                                    <div class="tab-body padding-sm-top padding-sm-bottom">
                                        <h4 class="no-margin">What We Do ?</h4>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type <span class="text-just-hand text-800 theme-color-text text-hight-light">specimen book.</span> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                                            dummy text.
                                        </p>
                                        <button class="btn btn-default btn-theme-color margin-sm-top" type="button">Learn more</button>
                                    </div>
                                    <!-- Tab Content Body -->
                                </div>
                                <!-- Ends Tab -->
                                <!-- Tab Begins -->
                                <div role="tabpanel" class="tab-pane fade" id="tab-team">
                                    <!-- Tab Content Body -->
                                    <div class="tab-body padding-sm-top padding-sm-bottom">
                                        <h4 class="no-margin">Our Team</h4>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and <span class="text-just-hand text-800 theme-color-text text-hight-light">typesetting industry.</span> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <span class="text-just-hand text-800  text-hight-light theme-color-text">Ipsum has been</span> the industry's standard 
                                            dummy text.
                                        </p>
                                        <button class="btn btn-default btn-theme-color margin-sm-top" type="button">Learn more</button>
                                    </div>
                                    <!-- Tab Content Body -->
                                </div>
                                <!-- Ends Tab -->
                                <!-- Tab Begins -->
                                <div role="tabpanel" class="tab-pane fade" id="tab-carrers">
                                    <!-- Tab Content Body -->
                                    <div class="tab-body padding-sm-top padding-sm-bottom">
                                        <h4 class="no-margin">Carrers</h4>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the <span class="text-just-hand text-800 theme-color-text text-hight-light">release of Letraset sheets</span> containing</p>
                                        <p class="margin-x-sm-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                                            dummy text.
                                        </p>
                                        <button class="btn btn-default btn-theme-color margin-sm-top" type="button">Learn more</button>
                                    </div>
                                    <!-- Tab Content Body -->
                                </div>
                                <!-- Ends Tab -->
                            </div>
                            <!-- Ends Tab panes Container-->
                        </div>
                        <!-- Tap Ends -->
                    </div>
                    <!-- col -->
                    <!-- Option Images -->
                    <div class="col-md-6">
                        <div class="option-image-block relative" data-animation="fadeInUp">
                            <!-- Slider Inner -->
                            <div class="owl-example6 owl-carousel owl-btns-center theme-color-owl-btn">
                                <!-- Item Begins -->
                                <div class="item no-margin"><img  alt="about" src="{{shop_asset('landing','images/about-us/1.jpg')}}" class="img-responsive block-center" height="500" width="750"></div>
                                <div class="item no-margin"><img  alt="about" src="{{shop_asset('landing','images/about-us/2.jpg')}}" class="img-responsive block-center" height="500" width="750"></div>
                                <div class="item no-margin"><img  alt="about" src="{{shop_asset('landing','images/about-us/3.jpg')}}" class="img-responsive block-center" height="500" width="750"></div>
                            </div>
                            <!-- Ends Slider -->	
                        </div>
                        <!-- Option Image Block -->
                    </div>
                    <!-- Ends Option Images -->
                </div>
                <!-- Ends Why You Love It Block -->
            </div>
            <!-- container -->
        </section>
        <!-- Ends Development Section -->
        <!-- Skill Section -->
        <section id="skill" class="skills-section">
            <div class="image-bg bg-fixed bg-no-repeat bg-pos-50-50 bg-cover" data-background="{{shop_asset('landing','images/bg/bg2.jpg')}}"></div>
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title white-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp">
                        <h5>We Got</h5>
                        <h2>Skills</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p  class="description text-color-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- Skill Content Begins -->
                <div class="row text-center text-color-white">
                    <!-- Skill Box 1 -->
                    <div class="col-md-3 col-sm-6" data-animation="fadeInUp" data-animation-delay="400">
                        <div class="piechart" data-percent="75" data-barcolor="#F12B63">
                            <span class="perchentage"><span>%</span></span>
                            <h3 class="text-center text-500 text-color-white">Wordpress Expert</h3>
                        </div>
                    </div>
                    <!-- Skill Box 2 -->
                    <div class="col-md-3 col-sm-6" data-animation="fadeInUp">
                        <div class="piechart" data-percent="90" data-barcolor="#F12B63">
                            <span class="perchentage"></span>
                            <h3 class="text-center text-500 text-color-white">UX Design</h3>
                        </div>
                    </div>
                    <!-- Skill Box 3 -->
                    <div class="col-md-3 col-sm-6" data-animation="fadeInUp">
                        <div class="piechart" data-percent="60" data-barcolor="#F12B63">
                            <span class="perchentage"></span>
                            <h3 class="text-center text-500 text-color-white">Adobe Photoshop</h3>
                        </div>
                    </div>
                    <!-- Skill Box 4 -->
                    <div class="col-md-3 col-sm-6" data-animation="fadeInUp">
                        <div class="piechart" data-percent="65" data-barcolor="#F12B63">
                            <span class="perchentage"></span>
                            <h3 class="text-center text-500 text-color-white">PHP Database</h3>
                        </div>
                    </div>
                </div>
                <!-- Skill Content Begins -->
            </div>
            <!-- container -->
        </section>
        <!-- Section -->	
        <!-- Team Section Begins -->	
        <section id="team" class="team-section">
            <div class="container">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12">
                        <h5>Our Creative</h5>
                        <h2>Team</h2>
                        <!-- Description -->
                        <div>
                            <p  class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- Team Member Content Begins -->
                <div class="owl-example4 owl-carousel owl-btns-center theme-color-owl-btn">
                    <div class="item">
                        <!-- Member Block -->
                        <div class="member-block relative" data-animation="flipInY">
                            <!-- Member Image -->
                            <img alt="team Member" class="img-responsive" src="{{shop_asset('landing','images/team/1.jpg')}}" height="760" width="760">
                            <!-- Member Small Details -->
                            <div class="member-details padding-sm text-center bg-light-gray">
                                <h4 class="border-dash center-border padding-sm-bottom no-margin margin-sm-bottom">John Deo</h4>
                                <p class="no-margin member-position text-color-gray">Founder</p>
                            </div>
                            <!-- Member Small Details -->
                            <!-- Member Full Details -->
                            <div class="member-details-full member-details-full-y absolute padding-sm text-center theme-bg-color text-color-white">
                                <!-- Member Small Image -->
                                <img alt="team Member" class="img-responsive margin-sm-bottom block-center" src="{{shop_asset('landing','images/team/1.jpg')}}" height="760" width="760">
                                <!-- Member Caption -->
                                <p  class="no-margin margin-sm-bottom">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has standard dummy text ever
                                    since the 1500s
                                </p>
                                <h4 class="border-dash center-border white padding-sm-bottom no-margin margin-sm-bottom text-color-white">John Deo</h4>
                                <p class="no-margin member-position text-color-white">Founder</p>
                                <!-- Member Social Links -->
                                <ul class="social-links margin-sm-top tooltip-sm tooltip-white-bg">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="icon-facebook3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="icon-twitter3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="github"><i class="icon-mark-github"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="icon-linkedin-with-circle"></i></a></li>
                                </ul>
                                <!-- Member Social Links -->
                            </div>
                            <!-- Member Full Details -->
                        </div>
                        <!-- Ends Member Block -->
                    </div>
                    <!-- Member 1 Ends -->
                    <!-- Member Item 2 -->
                    <div class="item">
                        <!-- Member Block -->
                        <div class="member-block relative" data-animation="flipInY">
                            <!-- Member Image -->
                            <img alt="team Member" class="img-responsive" src="{{shop_asset('landing','images/team/2.jpg')}}" height="750" width="750">
                            <!-- Member Small Details -->
                            <div class="member-details padding-sm text-center bg-light-gray">
                                <h4 class="border-dash center-border padding-sm-bottom no-margin margin-sm-bottom">John Deo</h4>
                                <p class="no-margin member-position text-color-gray">Founder</p>
                            </div>
                            <!-- Member Small Details -->
                            <!-- Member Full Details -->
                            <div class="member-details-full member-details-full-y absolute padding-sm text-center theme-bg-color text-color-white">
                                <!-- Member Small Image -->
                                <img alt="team Member" class="img-responsive margin-sm-bottom block-center" src="{{shop_asset('landing','images/team/2.jpg')}}" height="750" width="750">
                                <!-- Member Caption -->
                                <p  class="no-margin margin-sm-bottom">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has standard dummy text ever
                                    since the 1500s
                                </p>
                                <h4 class="border-dash center-border white padding-sm-bottom no-margin margin-sm-bottom text-color-white">John Deo</h4>
                                <p class="no-margin member-position text-color-white">Founder</p>
                                <!-- Member Social Links -->
                                <ul class="social-links margin-sm-top tooltip-sm tooltip-white-bg">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="icon-facebook3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="icon-twitter3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="github"><i class="icon-mark-github"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="icon-linkedin-with-circle"></i></a></li>
                                </ul>
                                <!-- Member Social Links -->
                            </div>
                            <!-- Member Full Details -->
                        </div>
                        <!-- Ends Member Block -->
                    </div>
                    <!-- Member 2 Ends -->
                    <!-- Member Item 3 -->
                    <div class="item">
                        <!-- Member Block -->
                        <div class="member-block relative" data-animation="flipInY">
                            <!-- Member Image -->
                            <img alt="team Member" class="img-responsive" src="{{shop_asset('landing','images/team/3.jpg')}}" height="750">
                            <!-- Member Small Details -->
                            <div class="member-details padding-sm text-center bg-light-gray">
                                <h4 class="border-dash center-border padding-sm-bottom no-margin margin-sm-bottom">John Deo</h4>
                                <p class="no-margin member-position text-color-gray">Founder</p>
                            </div>
                            <!-- Member Small Details -->
                            <!-- Member Full Details -->
                            <div class="member-details-full member-details-full-y absolute padding-sm text-center theme-bg-color text-color-white">
                                <!-- Member Small Image -->
                                <img alt="team Member" class="img-responsive margin-sm-bottom block-center" src="{{shop_asset('landing','images/team/3.jpg')}}" width="750">
                                <!-- Member Caption -->
                                <p  class="no-margin margin-sm-bottom">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has standard dummy text ever
                                    since the 1500s
                                </p>
                                <h4 class="border-dash center-border white padding-sm-bottom no-margin margin-sm-bottom text-color-white">John Deo</h4>
                                <p class="no-margin member-position text-color-white">Founder</p>
                                <!-- Member Social Links -->
                                <ul class="social-links margin-sm-top tooltip-sm tooltip-white-bg">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="icon-facebook3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="icon-twitter3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="github"><i class="icon-mark-github"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="icon-linkedin-with-circle"></i></a></li>
                                </ul>
                                <!-- Member Social Links -->
                            </div>
                            <!-- Member Full Details -->
                        </div>
                        <!-- Ends Member Block -->
                    </div>
                    <!-- Member 3 Ends -->
                    <!-- Member Item 4 -->
                    <div class="item">
                        <!-- Member Block -->
                        <div class="member-block relative" data-animation="flipInY">
                            <!-- Member Image -->
                            <img alt="team Member" class="img-responsive" src="{{shop_asset('landing','images/team/4.jpg')}}" height="750" width="750">
                            <!-- Member Small Details -->
                            <div class="member-details padding-sm text-center bg-light-gray">
                                <h4 class="border-dash center-border padding-sm-bottom no-margin margin-sm-bottom">John Deo</h4>
                                <p class="no-margin member-position text-color-gray">Founder</p>
                            </div>
                            <!-- Member Small Details -->
                            <!-- Member Full Details -->
                            <div class="member-details-full member-details-full-y absolute padding-sm text-center theme-bg-color text-color-white">
                                <!-- Member Small Image -->
                                <img alt="team Member" class="img-responsive margin-sm-bottom block-center" src="{{shop_asset('landing','images/team/4.jpg')}}" height="750" width="750">
                                <!-- Member Caption -->
                                <p  class="no-margin margin-sm-bottom">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has standard dummy text ever
                                    since the 1500s
                                </p>
                                <h4 class="border-dash center-border white padding-sm-bottom no-margin margin-sm-bottom text-color-white">John Deo</h4>
                                <p class="no-margin member-position text-color-white">Founder</p>
                                <!-- Member Social Links -->
                                <ul class="social-links margin-sm-top tooltip-sm tooltip-white-bg">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="icon-facebook3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="icon-twitter3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="github"><i class="icon-mark-github"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="icon-linkedin-with-circle"></i></a></li>
                                </ul>
                                <!-- Member Social Links -->
                            </div>
                            <!-- Member Full Details -->
                        </div>
                        <!-- Ends Member Block -->
                    </div>
                    <!-- Member 4 Ends -->
                    <!-- Member Item 5 -->
                    <div class="item">
                        <!-- Member Block -->
                        <div class="member-block relative" data-animation="flipInY">
                            <!-- Member Image -->
                            <img alt="team Member" class="img-responsive" src="{{shop_asset('landing','images/team/5.jpg')}}">
                            <!-- Member Small Details -->
                            <div class="member-details padding-sm text-center bg-light-gray">
                                <h4 class="border-dash center-border padding-sm-bottom no-margin margin-sm-bottom">John Deo</h4>
                                <p class="no-margin member-position text-color-gray">Founder</p>
                            </div>
                            <!-- Member Small Details -->
                            <!-- Member Full Details -->
                            <div class="member-details-full member-details-full-y absolute padding-sm text-center theme-bg-color text-color-white">
                                <!-- Member Small Image -->
                                <img alt="team Member" class="img-responsive margin-sm-bottom block-center" src="{{shop_asset('landing','images/team/5.jpg')}}" height="750" width="750">
                                <!-- Member Caption -->
                                <p  class="no-margin margin-sm-bottom">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has standard dummy text ever
                                    since the 1500s
                                </p>
                                <h4 class="border-dash center-border white padding-sm-bottom no-margin margin-sm-bottom text-color-white">John Deo</h4>
                                <p class="no-margin member-position text-color-white">Founder</p>
                                <!-- Member Social Links -->
                                <ul class="social-links margin-sm-top tooltip-sm tooltip-white-bg">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="icon-facebook3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="icon-twitter3"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="github"><i class="icon-mark-github"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="icon-linkedin-with-circle"></i></a></li>
                                </ul>
                                <!-- Member Social Links -->
                            </div>
                            <!-- Member Full Details -->
                        </div>
                        <!-- Ends Member Block -->
                    </div>
                    <!-- Member 5 Ends -->
                </div>
                <!-- Ends Team Member Content -->
            </div>
            <!-- container -->
        </section>
        <!-- Ends Team Section -->	
        <!-- Customer Section Begins -->
        <section id="customer" class="customer-section">
            <div class="image-bg bg-fixed bg-no-repeat bg-cover" data-background="{{shop_asset('landing','images/bg/bg5.jpg')}}"></div>
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
                            <p  class="description text-color-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
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
        <!-- Happy Theme users Section -->
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
        <!-- Ends Happy Theme users Section -->	
@endsection