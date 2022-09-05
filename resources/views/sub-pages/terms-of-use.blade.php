@extends('layouts.landing-page-layout')
@section('tags')
<title>Terms of Use | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="The use of services provided by Backlinks Services establishes agreement to these terms."/>

<link rel="alternate" href="{{env('APP_URL')}}/terms-of-use" hreflang="en-US"/>
<link href="{{env('APP_URL')}}/terms-of-use" rel="canonical"/>


<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Terms of Use | Backlinks Services"/>
<meta property="og:url" content="{{env('APP_URL')}}/terms-of-use"/>
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/logo.png"/> 
<meta property="og:description" content="The use of services provided by Backlinks Services establishes agreement to these terms."/> 


<!-- Twittercard -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="Terms of Use | Backlinks Services"/>
<meta name="twitter:domain" content="{{env('APP_URL')}}/terms-of-use"/>
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/logo.png"/>
<meta name="twitter:description" content="The use of services provided by Backlinks Services establishes agreement to these terms."/>
<meta name="twitter:creator" content="@WebSEO_Direct"/>
<meta name="twitter:site" content="@WebSEO_Direct"/>

<!-- Microdata2 -->
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"https:\/\/webseo.direct","name":"Backlinks Services"}},{"@type":"ListItem","position":2,"item":{"@id":"https:\/\/webseo.direct\/terms-of-use","name":"Terms of Use"}}]}</script>

@stop
@section('content')




<!-- Start Faq Section -->
<section class="row">
    <div class="container p-5 push-terms-top">
        <div class="faq-area-content">
            <h1>Terms of Use</h1>
          
        </div>




        <div class="row justify-content-between">
            <div class="col-lg-6">
            <p class="mb-5" style="text-align: justify">The use of services provided by Backlinks Services establishes agreement
                to these terms. By
                registering or
                using our services, you agree that you have read and fully understood the following terms of service.
                Backlinks Services would not help liability for loss in any way for users who have not read the below terms
                of use.</p>
                <div class="faq-accordion">
                    <ul class="accordion">

                        <li class="accordion-item">
                            <h2 class="accordion-title active" href="javascript:void(0)"><i class="fa fa-plus"></i>
                                General</h2>
                            <p class="accordion-content text-justify show  ">
                                By placing an order with Backlinks Services, you automatically accept all the below-listed
                                terms of services, whether you read them or not.
                                <br>
                                <br>
                                We reserve the right to change these terms of service without notice. You are expected
                                to read all terms of use before placing every order to ensure you are up to date with
                                any future changes.
                                <br>
                                <br>
                                Backlinks Services does not guarantee a delivery time for any services. We offer our best
                                estimation for when the order will be delivered. It is only an estimation, and WebSEO
                                direct will not refund orders that are processing if you feel they are taking too long.
                                Backlinks Services tries hard to deliver what is expected exactly from us by our resellers.
                                In this case, we reserve the right to change a service type if we deem it necessary to
                                complete an order.


                            </p>
                        </li>

                        <li class="accordion-item">
                            <h2 class="accordion-title " href="javascript:void(0)"><i class="fa fa-plus"></i>
                                Fiverr, eBay and Other Popular Website Sellers</h2>
                            <p class="accordion-content text-justify ">
                                Backlinks Services DOES NOT guarantee full delivery within 24 hours. We make no guarantee for
                                delivery time at all. We provide our best estimation for orders during the placing of
                                orders; however, these are estimates. We will not be held responsible for the loss of
                                funds, negative reviews, or you being banned for late delivery. If you are selling on a
                                website that requires time-sensitive results, uses Backlinks Services at your own risk.


                            </p>
                        </li>

                        <li class="accordion-item">
                            <h2 class="accordion-title " href="javascript:void(0)"><i class="fa fa-plus"></i>
                                Payment/Refund Policy</h2>
                            <p class="accordion-content text-justify ">
                                No refunds will be made. After a deposit has been completed, there is no way to reverse
                                it. It would help if you used your balance on orders from Backlinks Services.
                                You agree that once you complete a payment, you will not file a dispute or a chargeback
                                against us for any reason.
                                If you file a dispute or chargeback against us after a deposit, we reserve the right to
                                terminate all future orders, ban you from our site.
                                Fraudulent activity, such as using unauthorized or stolen credit cards, will lead to
                                your account termination. There are no exceptions.


                            </p>
                        </li>

                        <li class="accordion-item">
                            <h2 class="accordion-title " href="javascript:void(0)"><i class="fa fa-plus"></i>
                                Free Balance Policy</h2>
                            <p class="accordion-content text-justify ">
                                Backlinks Services offers many ways to get a FREE balance, but we always have the right to
                                review it and deduct it from your account balance with any reason we may it is a kind of
                                abuse.
                                If we decide to deduct some or all of the free balance from your account balance and
                                your account balance becomes negative, the account will automatically be suspended.
                                If your account is suspended due to a negative balance, you can ask to make a custom
                                payment to settle your balance to activate your account.


                            </p>
                        </li>

                        <li class="accordion-item">
                            <h2 class="accordion-title " href="javascript:void(0)"><i class="fa fa-plus"></i>
                                Reports</h2>
                            <p class="accordion-content text-justify ">
                                The reports for your submitted order(s) will be stored on our servers for up to 180
                                days. After that, it may automatically be deleted!

                            </p>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="col-lg-4 my-auto  ">
                <div class="faq-image">
                    <img src="{{ asset('assets/img/paper.png') }}" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Faq Section -->
<div style="height:100px">
</div>

@stop

@section('scripts')
@livewireScripts

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
