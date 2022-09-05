@extends('layouts.landing-page-layout')
@section('tags')
<title>About Us | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="Backlinks Services allows website owners and resellers to buy backlinks cheap using our best backlinks building strategy." />
<meta property="og:url" content="{{env('APP_URL')}}/about" />

<link rel="alternate" href="{{env('APP_URL')}}/about" hreflang="en-US"/>
<link href="{{env('APP_URL')}}/about" rel="canonical" />


<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="About Us | Backlinks Services"/>
<meta property="og:url" content="{{env('APP_URL')}}/about"/>
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/about.jpg"/> 
<meta property="og:description" content="Backlinks Services allows website owners and resellers to buy backlinks cheap using our best backlinks building strategy."/> 


<!-- Twittercard -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="About Us | Backlinks Services"/>
<meta name="twitter:domain" content="{{env('APP_URL')}}/about"/>
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/about.jpg"/>
<meta name="twitter:description" content="Backlinks Services allows website owners and resellers to buy backlinks cheap using our best backlinks building strategy."/>
<meta name="twitter:creator" content="@WebSEO_Direct"/>
<meta name="twitter:site" content="@WebSEO_Direct"/>

<!-- Microdata2 -->
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"https:\/\/webseo.direct","name":"Backlinks Services"}},{"@type":"ListItem","position":2,"item":{"@id":"https:\/\/webseo.direct\/about","name":"About Us"}}]}</script>


@stop
@section('content')

<!-- Start About Section -->
<div class="p-3">

</div>
<section class="about-section pt-100 pb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-image push-about-top">
                    <img src="{{ asset('assets/img/about.jpg') }}" alt="image">
                </div>
                <div class="banner-btn text-center mt-4 " data-toggle="modal" data-target="#videoModal">
                                <button class="video-btn font-weight-bold my-auto align-middle" style="font-size:20px">Watch Video <i class="flaticon-play-button text-danger mx-3 my-auto align-middle" style="font-size:20px"></i></button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <iframe class="w-100 youtube-modal" loading="lazy" src="https://www.youtube.com/embed/MyN_RQsm4eM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                                            </div>
                                    </div>
                                </div>
                            </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about-area-content">
                    <span>About Us</span>
                    <h1>We are an SEO Backlinks Panel where you can buy quality backlinks effortlessly.</h1>
                    <div  style="  text-align: justify;">
                    <p >Backlinks Services allows website owners and resellers to buy backlinks cheap using our best backlinks building strategy.</p>
                    <p>Just signup or sign in and go to the make order section in your dashboard, pick one among our various available types of backlinks, and follow the instructions step by step easy to get 100% safe backlinks smoothly at the best price you can ever find.
                        You will see your website ranking improves gradually after 2-8 weeks on average to update SEO optimization Score or SEO ranking on Google SERPs.<p></p>
                        All backlinks are reviewed and follow up by a human; it is not a fully automated process. We are using automation for the submission process only to achieve fast processing and offer lower prices.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-6 col-6">
                        <div class="single-fun-facts">
                            <li><span class="sign-icon mr-2">+</span><span class="odometer" id="projectsNumber">00</span>
                            </li>
                            <p>Project Completed</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6 col-6">
                        <div class="single-fun-facts">
                            <li><span class="sign-icon mr-2">+</span><span class="odometer" id="clientsNumber">00</span>
                            </li>
                            <p>Satisfied Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->


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
        <script>
            let startingDate = new Date('11/11/2020');
            let currentDate = new Date();
            //calculate the time difference of two dates
            let Difference_In_Time = currentDate.getTime() - startingDate.getTime();
            // calculate the nubmer of days between two dates
            let Difference_In_Days = Math.floor(Difference_In_Time / (1000 * 3600 * 24));
            //increase each day by 20 project and 5 clients
            let numberOfProjectsToAdd = Difference_In_Days * 20;
            let numberOfClientsToAdd = Difference_In_Days * 5;
            //change dom values
            document.getElementById("projectsNumber").setAttribute("data-count", 202000 + numberOfProjectsToAdd);
            document.getElementById("clientsNumber").setAttribute("data-count", 36000 + numberOfClientsToAdd);

        </script>
        @stop
