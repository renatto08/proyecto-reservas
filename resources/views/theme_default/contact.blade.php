@extends('theme_default.layout')
@section('title','Contáctanos')
@section('content')
    <!-- page -->
    <div class="page">
        <!-- page__header -->
    @include('theme_default.partials._page_header',['title_header'=>'Contáctanos'])
    <!-- page__header / end -->
        <!-- page__body -->
        <div class="page__body">
            <!-- block -->
            <div class="block">
                <div class="container">
                    <div class="card mb-0">
                        <div class="contact-us">
                            <div class="contact-us__map">
                                @if($shop->contact_map)
                                    {!! $shop->contact_map !!}
                                @else
                                <iframe src='https://maps.google.com/maps?q=Holbrook-Palmer%20Park&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                @endif
                            </div>
                            <div class="contact-us__container">
                                <div class="row">

                                    <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                        {!! $shop->contact_description !!}
                                        <!--
                                        <h3 class="contact-us__header decor-header">Nuestras direcciones</h3>
                                        <div class="contact-us__address">
                                            <p>
                                                715 Fake Ave, Apt. 34, New York, NY 10021 USA<br>
                                                Email: meblya@example.com<br>
                                                Phone Number: +1 754 000-00-00
                                            </p>
                                            <p>
                                                <strong>Horario</strong><br>
                                                Monday to Friday: 8am-8pm<br>
                                                Saturday: 8am-6pm<br>
                                                Sunday: 10am-4pm
                                            </p>
                                            <p>
                                                <strong>Acerca de</strong><br>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit suscipit mi, non
                                                tempor nulla finibus eget. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </p>
                                        </div>-->
                                    </div>


                                    <div class="col-12 col-lg-6">
                                        <h3 class="contact-us__header decor-header">Dejanos un mensaje</h3>
                                        <form method="post" action="{{route('shop.subscription',['code'=>$shop->code])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$shop->id}}" name="shop_id">
                                            <input type="hidden" value="CONTACTO" name="type">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="form-name">Tu nombre</label>
                                                    <input type="text" name="name" id="form-name" class="form-control" placeholder="Nombres" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="form-email">Email</label>
                                                    <input type="email" name="email" id="form-email" class="form-control" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-subject">Asunto</label>
                                                <input type="text" name="subject" id="form-subject" class="form-control" placeholder="Asunto" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-message">Mensaje</label>
                                                <textarea id="form-message" name="message" class="form-control" rows="4" placeholder="Escribe un mensaje..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- block / end -->
        </div>
        <!-- page__body / end -->
    </div>
    <!-- page / end -->
@endsection