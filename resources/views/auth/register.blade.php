@extends('layouts.landing-page-layout')
@section('tags')
<title>Singup Page | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="Create new account on Backlinks Services"/>

<link rel="alternate" href="{{env('APP_URL')}}/register" hreflang="en-US"/>
<link href="{{env('APP_URL')}}/register" rel="canonical"/>


<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Signup Page | Backlinks Services"/>
<meta property="og:url" content="{{env('APP_URL')}}/register"/>
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/logo.png"/>
<meta property="og:description" content="Create new account on Backlinks Services"/>


<!-- Twittercard -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="Signup Page | Backlinks Services"/>
<meta name="twitter:domain" content="{{env('APP_URL')}}/register"/>
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/logo.png"/>
<meta name="twitter:description" content="Create new account on Backlinks Services"/>
<meta name="twitter:creator" content="@WebSEO_Direct"/>
<meta name="twitter:site" content="@WebSEO_Direct"/>

<!-- Microdata2 -->
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"https:\/\/webseo.direct","name":"Backlinks Services"}},{"@type":"ListItem","position":2,"item":{"@id":"https:\/\/webseo.direct\/register","name":"Singup"}}]}</script>
@stop
@section('content')

<!-- Start Dashboard Banner Two -->
<div class="home-banner-two-auth">
            <div class="container">
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->
            <a href="/"><img style="max-height:90px" class="mb-2"
                    src="{{ asset('assets/img/logo.png') }}" alt=""></a>

        </x-slot>
        <div class="my-4">
            <h1 class="text-center">Create new account on Backlinks Services</h1>
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
        @if (session()->has('warning'))
            <div class="alert alert-warning text-center">
                {{ session('warning') }}
            </div>
        @endif
        @if (session()->has('finger_print_required'))
        <div class="alert alert-danger text-center">
            finger print is required! Make sure you have javascript enabled and no chrome extensions are disabling your browser's fingerprint
        </div>
        @endif
        @if (session()->has('email-taken'))
        <div class="alert alert-danger text-center">
            this email is already registered <span><a href="{{route('login')}}" class="font-weight-bold mx-1 ">Login</a></span>
        </div>
        @endif
        <form method="POST" action="{{ route('register-new-user') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <input class="block mt-1 w-full form-control" type="text" name="name" @if(session()->has('name')) value="{{ session()->get('name') }}" @endif required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <input class="block mt-1 w-full form-control" type="email" name="email" @if(session()->has('email')) value="{{ session()->get('email') }}" @endif required autofocus autocomplete="email" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <input class='mr-2' type="checkbox"  name="terms-checkbox" id="terms-checkbox">
                <label for="terms-checkbox">I approve the terms of use <a href="{{route('terms_of_use')}}" class="text-success">Terms of use</a></label>
            </div>
            <x-jet-input type="hidden" name="finger_print" id="finger_print" />


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
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


@stop
@section('scripts')
<script>
  function initFingerprintJS() {
    FingerprintJS.load().then(fp => {
      // Get a visitor identifier.
      fp.get().then(result => {
        // visitor identifier:
        const visitorId = result.visitorId;
        document.getElementById("finger_print").value=visitorId;
      });
    });
  }
</script>
<script
  async
  src="{{ asset('assets/js/fingerprint.js') }}"
  onload="initFingerprintJS()"
></script>
@stop
