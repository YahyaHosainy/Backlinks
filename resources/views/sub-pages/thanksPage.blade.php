@extends('layouts.landing-page-layout') @section('tags')
<meta charset="utf-8">
<title>Thank you | Backlinks Services</title>
@stop @section('content')


<!-- Start Dashboard Banner Two -->
<div class="home-banner-two" style="height:250px">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="main-banner-content">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- End  Dashboard Banner Two -->

<div class="container">

    <h1 class="text-center" style="font-size: 60px;font-family: 'Dancing Script', cursive; color:#4b4b4b; ">
        Thank you for your trust !
    </h1>
    <div class="text-center my-5">
        <div class="btn btn-success back-to-dashboard-button shadow-sm ">
            <a href="{{route('user-dashboard')}}">
                Back to Dashboard
            </a>
        </div>
    </div>
</div>
<!-- End Faq Section -->
<div style="height:100px">
</div>

@stop @section('scripts') @livewireScripts

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