@extends('layouts.landing-page-layout') 
@section('tags')
<title>Forgot Password | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one." />
<link href="{{env('APP_URL')}}/forgot-password" rel="canonical" />

@stop 
@section('content')

<div>
    <div class="home-banner-two forgot-password-card ">

        <div>
            <a href="/"><img style="max-height:80px;" class="mb-2 mx-auto" src="{{ asset('assets/img/logo.png') }}" alt=""></a>
        </div>



        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </div>

</div>
@stop @section('scripts')
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