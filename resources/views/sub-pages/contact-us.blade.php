@extends('layouts.landing-page-layout')
@section('tags')
<title>Contact Us | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="We care about all messages we receive." />
<meta property="og:url" content="{{env('APP_URL')}}/contact-us" />

<link rel="alternate" href="{{env('APP_URL')}}/contact-us" hreflang="en-US"/>
<link href="{{env('APP_URL')}}/contact-us" rel="canonical" />


<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Contct Us | Backlinks Services"/>
<meta property="og:url" content="{{env('APP_URL')}}/contact-us"/>
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/about.jpg"/> 
<meta property="og:description" content="We care about all messages we receive."/> 


<!-- Twittercard -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="Contact Us | Backlinks Services"/>
<meta name="twitter:domain" content="{{env('APP_URL')}}/contact-us"/>
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/about.jpg"/>
<meta name="twitter:description" content="We care about all messages we receive."/>
<meta name="twitter:creator" content="@WebSEO_Direct"/>
<meta name="twitter:site" content="@WebSEO_Direct"/>

<!-- Microdata2 -->
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"https:\/\/webseo.direct","name":"Backlinks Services"}},{"@type":"ListItem","position":2,"item":{"@id":"https:\/\/webseo.direct\/contact-us","name":"Contact Us"}}]}</script>

@stop

@section('content')
<br>
<br>
<section class="contact-area ptb-100">
    <div class="container">
    <div class="contact-area-content pb-4">
            <h1>CONTACT US</h1>
            <span class="">We care about all messages we receive</span>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="contact-box">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="content">
                        <li>Phone / Fax</li>
                        <p><a href="#">+1 (484) 473-1930</a></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="contact-box">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="content">
                        <li>E-mail</li>
                        <p><a href="#">admin@webseo.direct </a></p>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="contact-box">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <div class="content">
                        <li>Location</li>
                        <p>30 N Gould St,
                            <span> Wyoming, USA.</span></p>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <form id="contactForm" novalidate="true">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" required=""
                                    data-error="Please enter your name" placeholder="Your Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required=""
                                    data-error="Please enter your email" placeholder="Your Email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" name="phone_number" id="phone_number" required=""
                                    data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required=""
                                    data-error="Please enter your subject" placeholder="Your Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control textarea-hight" id="message" cols="30"
                                    rows="5" required="" data-error="Write your message"
                                    placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="send-btn-one disabled"
                                style="pointer-events: all; cursor: pointer;">
                                Send Message
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop




@section('scripts')

<!-- jQuery Min JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- Popper Min JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!-- Bootstrap Min JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- MeanMenu JS  -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- Appear Min JS -->
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<!-- Odometer Min JS -->
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Nice Select Min JS -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Mixitup Min JS -->
<script src="{{ asset('assets/js/jquery.mixitup.min.js') }}"></script>
<!-- WOW Min JS -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- Parallax Min JS -->
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<!-- Ajaxchimp JS -->
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

@stop
