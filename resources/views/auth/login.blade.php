@extends('layouts.landing-page-layout') @section('tags')
<title>Login Page | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="Login to your account on Backlinks Services" />

<link rel="alternate" href="{{env('APP_URL')}}/login" hreflang="en-US" />
<link href="{{env('APP_URL')}}/login" rel="canonical" />



<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Login Page | Backlinks Services" />
<meta property="og:url" content="{{env('APP_URL')}}/login" />
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/logo.png" />
<meta property="og:description" content="Login to your account on Backlinks Services" />


<!-- Twittercard -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Login Page | Backlinks Services" />
<meta name="twitter:domain" content="{{env('APP_URL')}}/login" />
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/logo.png" />
<meta name="twitter:description" content="Login to your account on Backlinks Services" />
<meta name="twitter:creator" content="@WebSEO_Direct" />
<meta name="twitter:site" content="@WebSEO_Direct" />

<!-- Microdata2 -->
<script type="application/ld+json">
  {
    "@context": "http:\/\/schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "item": {
        "@id": "https:\/\/backlinks.city",
        "name": "Backlinks Services"
      }
    }, {
      "@type": "ListItem",
      "position": 2,
      "item": {
        "@id": "https:\/\/backlinks.city\/login",
        "name": "Login"
      }
    }]
  }
</script>

@stop @section('content')

<!-- Start Dashboard Banner Two -->
<div class="home-banner-two">
  <div class="d-table">
    <div class="d-table-cell">
      <div class="container">

        <x-guest-layout>
          <x-jet-authentication-card>
            <x-slot name="logo">
              <!-- <x-jet-authentication-card-logo /> -->
              <a href="/"><img style="max-height:90px" class="mb-2" src="{{ asset('assets/img/logo.png') }}" alt=""></a>


            </x-slot>
            @if(session('verify-email'))
            <div class="text-center my-4 text-green-600" style="font-size:24px">
              <div>One last step ! Verify your email and let's get started</div>
              <p class="text-danger font-weight-bold">Check your junk or promotion box</p>
            </div>
            @endif
            <div class="my-4">
              <h1 class="text-center">Login to your account on Backlinks Services</h1>
            </div>

            <a href="{{ route('google-login') }}" class="btn btn-google collect-button btn-block">
                <img
                    src="/assets/img/Google__G__Logo-min.png"
                    alt="google image"
                    style="width:25px;float:left"
                    class="mr-2"
                >
                Continue with Google
            </a>

            <hr class="mb-2 mt-2">

            <x-jet-validation-errors class="mb-4" /> 
            @if(session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
            </div>
            @endif            
  

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
              </div>

              <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
              </div>

              <div class="block mt-4">
                <label class="flex items-center">
          <input type="checkbox" class="form-checkbox" name="remember">
          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
              </div>

              <div class="flex items-center justify-end mt-4">
                @if(Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a> @endif

                <x-jet-button class="ml-4">
                  {{ __('Login') }}
                </x-jet-button>
                <a class="pl-2 " href="/register">
      Register
        </a>
              </div>

            </form>

          </x-jet-authentication-card>
        </x-guest-layout>
      </div>
    </div>
  </div>

  <div class="banner-img-wrapper">
    <div class="banner-img-1">
      <img src="{{ asset('assets/img/left-shape.png') }}" alt="image">
    </div>

    <div class="banner-img-2">
      <img src="{{ asset('assets/img/right-shape.png') }}" alt="image">
    </div>
  </div>

  <div class="shape-img2"><img src="{{ asset('assets/img/shape/2.png') }}" alt="image">
  </div>
  <div class="shape-img3"><img src="{{ asset('assets/img/shape/3.png') }}" alt="image">
  </div>
  <div class="shape-img5"><img src="{{ asset('assets/img/shape/5.png') }}" alt="image">
  </div>
  <div class="shape-img6"><img src="{{ asset('assets/img/shape/6.png') }}" alt="image">
  </div>
  <div class="shape-img7"><img src="{{ asset('assets/img/shape/2.png') }}" alt="image">
  </div>
  <div class="shape-img8"><img src="{{ asset('assets/img/shape/10.png') }}" alt="image">
  </div>
  <div class="shape-img9"><img src="{{ asset('assets/img/shape/7.png') }}" alt="image">
  </div>
  <div class="shape-img10"><img src="{{ asset('assets/img/shape/5.png') }}" alt="image">
  </div>
  <div class="shape-img11"><img src="{{ asset('assets/img/shape/11.png') }}" alt="image">
  </div>
</div>
<!-- End  Dashboard Banner Two -->


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

@stop