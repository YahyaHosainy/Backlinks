@extends('layouts.landing-page-layout') @section('tags')
<meta charset="utf-8">
<title>You can't have multiple accounts | Backlinks Services</title>
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
    <div class="text-center mb-4">
        <i class="fas fa-exclamation-circle " style="color:#ff6464; font-size: 120px; "></i>
        <h1 class="mt-4"  style="color:#4b4b4b; font-size: 60px; ">Whoops!</h1>
    </div>

    <h1 class="text-center " style="font-size: 20px; color:#4b4b4b; ">
            <span >Sorry, You can't have multiple accounts ! if you think that this is a mistake </span> 
            <a style="color:#ff6464;" href="{{route('contact_us')}}">contact us</a> 
    </h1>
    <div class="text-center my-5">
        <div class="btn btn-danger back-to-dashboard-button shadow-sm ">
            <a href="{{route('login')}}">
                Login
            </a>
        </div>
    </div>
</div>
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