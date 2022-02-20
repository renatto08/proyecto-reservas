@extends('landing.layout')
@section('title','Nosotros')
@section('content')
<!-- Contact Section Begins -->	
<section id="contact" class="contact-section">
            <div class="container relative z-index9">
                <!-- Title And Description Section -->
                <div class="row title-description m-title margin-x-m-large-bottom">
                    <!-- Title -->
                    <div class="col-xs-12" data-animation="fadeInUp">
                        <h5>Get In Touch</h5>
                        <h2>Contact</h2>
                        <!-- Description -->
                        <div data-animation="fadeInUp">
                            <p  class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                        <!-- Description -->
                    </div>
                    <!-- Title -->
                </div>
                <!-- Title And Description Section -->
                <!-- Contact Row Begins -->
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="form-message" style="display: none;"></p>
                        <div class="contact-form">
                            <!-- Form Begins -->
                            <form name="contactform" class="" id="contactform" method="post" action="forms/process.php">
                                <div class="row">
                                    <!-- Field 1 -->	
                                    <div class="col-sm-6" data-animation="fadeInUp">
                                        <div class="input-text form-group">
                                            <input type="text" name="contact_name" class="input-name form-control" placeholder="Full Name" />
                                        </div>
                                    </div>
                                    <!-- Field 2 -->
                                    <div class="col-sm-6" data-animation="fadeInUp">
                                        <div class="input-email form-group">
                                            <input type="email" name="contact_email" class="input-email form-control" placeholder="Email"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Field 1 -->	
                                    <div class="col-sm-6" data-animation="fadeInUp">
                                        <div class="input-text form-group">
                                            <input type="text" name="subject" class="input-subject form-control" placeholder="Subject" />
                                        </div>
                                    </div>
                                    <!-- Field 2 -->
                                    <div class="col-sm-6" data-animation="fadeInUp">
                                        <div class="input-email form-group">
                                            <input type="text" name="url" class="url form-control" placeholder="Website Url"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- Field 3 -->
                                <div class="textarea-message form-group" data-animation="fadeInUp">
                                    <textarea name="contact_message" class="textarea-message form-control" placeholder="Message" rows="4" ></textarea>
                                </div>
                                <!-- Button -->
                                <button class="btn btn-default btn-theme-color" type="submit">Send Now</button>			
                            </form>
                            <!-- Form Ends -->
                        </div>
                    </div>
                </div>
                <!-- Contact Row Ends -->
            </div>
            <!-- Container -->
        </section>
        <!-- Contact Us Sction Ends -->
        <!-- Map Section -->
        <section id="map" class="map-section no-padding mh5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 no-padding mh5">
                        <div class="map">
                            <div class="map-canvas"
                                data-zoom="12"
                                data-lat="-35.2835"
                                data-lng="149.128"			  
                                data-type="roadmap"
                                data-title="Austin"
                                data-content="Company Name<br>
                                Contact: +012 (345) 6789<br>
                                <a href='mailto:info@youremail.com'>info@youremail.com</a>"							
                                style="height: 500px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 no-padding mh5" data-animation="fadeInUp">
                        <div class="image-bg bg-fixed bg-repeat bg-contain" data-background="{{shop_asset('landing','images/bg/map-bg.png')}}"></div>
                        <div class="bg-color-overlay semi-dark"></div>
                        <div class="contact-detail-block padding-large relative z-index9">
                            <!-- Title And Description Section -->
                            <div class="title-description small-title white-title  margin-x-large-bottom no-padding">
                                <h5>Find Our</h5>
                                <h2>Location</h2>
                                <address class="text-lowercase">
                                    <p class="text-color-white text-600 text-uppercase margin-sm-top">Zozothemes, Inc.</p>
                                    <p>795 Folsom Ave, Suite 600</p>
                                    <p>San Francisco, CA 94107</p>
                                    <p><a href="#" class="text-theme-color hvr-color-white-text"><i title="Phone" class="icon-phone"></i>(123) 456-7890</a></p>
                                    <p><a href="#" class="text-theme-color hvr-color-white-text"><i title="Phone" class="icon-fax"></i>(123) 456-7890</a></p>
                                    <p><a href="mailto:#" class="text-color-white hvr-theme-color-text"><i title="Phone" class="icon-mail"></i>zozothemes@gmail.com</a></p>
                                    <p><a href="#" class="text-theme-color hvr-color-white-text"><i title="Phone" class="icon-clock"></i>9: 00 - AM | 8: 00 - PM
                                        </a>
                                    </p>
                                </address>
                            </div>
                            <!-- Title And Description Section -->
                        </div>
                        <!-- contact-detail-block  -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </section>
        <!-- Ends Map Section -->
@endsection