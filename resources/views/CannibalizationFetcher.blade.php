@extends('layouts.landing-page-layout')
@section('tags')
<title>Cannibalization Fetcher</title>

<meta charset="utf-8">
<meta name="description" content="This AI-Based Tool is helpful to identify the cannibalization in your website." />
<meta property="og:url" content="{{env('APP_URL')}}/cannibalization-fetcher" />

<link rel="alternate" href="{{env('APP_URL')}}/cannibalization-fetcher" hreflang="en-US"/>
<link href="{{env('APP_URL')}}/cannibalization-fetcher" rel="canonical" />


<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="Cannibalization Fetcher Services"/>
<meta property="og:url" content="{{env('APP_URL')}}/cannibalization-fetcher"/>
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/about.jpg"/> 
<meta property="og:description" content="This AI-Based Tool is helpful to identify the cannibalization in your website."/> 


<!-- Twittercard -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="Cannibalization Fetcher Services"/>
<meta name="twitter:domain" content="{{env('APP_URL')}}/cannibalization-fetcher"/>
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/about.jpg"/>
<meta name="twitter:description" content="This AI-Based Tool is helpful to identify the cannibalization in your website."/>
<meta name="twitter:creator" content="@WebSEO_Direct"/>
<meta name="twitter:site" content="@WebSEO_Direct"/>
<style>
  .background-beautify {
    background-color: #ffffff;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 900'%3E%3Cdefs%3E%3ClinearGradient id='a' x1='0' x2='0' y1='1' y2='0' gradientTransform='rotate(0,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%230FF'/%3E%3Cstop offset='1' stop-color='%23CF6'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' x1='0' x2='0' y1='0' y2='1' gradientTransform='rotate(151,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%23F00'/%3E%3Cstop offset='1' stop-color='%23FC0'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='%23FFF' fill-opacity='0' stroke-miterlimit='10'%3E%3Cg stroke='url(%23a)' stroke-width='7.919999999999999'%3E%3Cpath transform='translate(-21 -0.7999999999999998) rotate(-2 1409 581) scale(0.97776)' d='M1409 581 1450.35 511 1490 581z'/%3E%3Ccircle stroke-width='2.64' transform='translate(-33 18) rotate(0.3999999999999999 800 450) scale(0.99898)' cx='500' cy='100' r='40'/%3E%3Cpath transform='translate(0.20000000000000018 -9) rotate(-1 401 736) scale(0.99898)' d='M400.86 735.5h-83.73c0-23.12 18.74-41.87 41.87-41.87S400.86 712.38 400.86 735.5z'/%3E%3C/g%3E%3Cg stroke='url(%23b)' stroke-width='2.4'%3E%3Cpath transform='translate(108 2.8) rotate(-0.7 150 345) scale(1.00192)' d='M149.8 345.2 118.4 389.8 149.8 434.4 181.2 389.8z'/%3E%3Crect stroke-width='5.28' transform='translate(-17 -50) rotate(-7.199999999999999 1089 759)' x='1039' y='709' width='100' height='100'/%3E%3Cpath transform='translate(-52 12) rotate(-1.2000000000000002 1400 132) scale(0.95)' d='M1426.8 132.4 1405.7 168.8 1363.7 168.8 1342.7 132.4 1363.7 96 1405.7 96z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    background-attachment: fixed;
    background-size: cover;
  }
</style>

<!-- Microdata2 -->
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"https:\/\/webseo.direct","name":"Backlinks Services"}},{"@type":"ListItem","position":2,"item":{"@id":"https:\/\/webseo.direct\/about","name":"About Us"}}]}</script>

@stop
@section('content')


<!-- Start About Section -->
<section class="pt-100 pb-5 background-beautify">
  @if(Auth::Guest())
  <div class="container mt-5">
    <div class="font-sans text-gray-900 antialiased">
      <div
        class="
          min-h-screen
          flex flex-col
          items-center
          pt-6
          sm:pt-0
        "
      >

        <div
          class="
            w-full
            sm:max-w-md
            px-6
            py-4
            bg-white
            shadow-md
            overflow-hidden
            sm:rounded-lg
          "
        >
          <div id="loaderParent" v-if="whileMessage.length === 0">
            <div class="mt-0 mb-3">
              <h1 class="text-center mb-2" style="font-size: 24px; text-transform:uppercase;font-weight:bold;color:#202647">
                Fetch and Fix Keywords
              </h1>
              <h1 class="text-center mb-3" style="font-size: 24px;font-weight:bold;color:#202647">
                Cannibalization
              </h1>
              <p class="text-center">
                Keyword cannibalization occurs when you have more than one similar keyword on more than one page of content on your website. As a result, a search engine like Google is confused about which content to rank higher. This means maybe both web pages will be sent down in the SERP or at least rank the inappropriate one higher.
                This AI-Based Tool is helpful to identify the cannibalization in your website as we have developed it to collect information from Google Search Console to process and prepare an easy to read and fixed Excel Sheet
              </p>
              <p class="mb-0 mt-3"><small>Login to continue</small></p>
            </div>
            <a
              href="{{ route('login') }}"
              v-if="next"
              type="submit"
              class="
                btn
                btn-block
                items-center
                px-4
                py-2
                bg-gray-800
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
                hover:bg-gray-700
                active:bg-gray-900
                focus:outline-none
                focus:border-gray-900
                focus:shadow-outline-gray
                disabled:opacity-25
                transition
                ease-in-out
                duration-150
              "
            >
              Login
              <i class="fas fa-chevron-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <input id="user_email_holder" type="hidden" value="{!!Auth()->user()->email!!}">
  <input id="_csrf_token" type="hidden" value="{{ csrf_token() }}">
  <input id="has_google_token" type="hidden" value="{{$has_google_token ? 'Y' : 'N'}}">
  <input id="google-login" type="hidden" value="{{ route('google-login') }}">
  <input id="google-login-expired" type="hidden" value={{ $expire ? 'Y' : 'N' }}>
  <div id="cannibalizationFetcherApp"></div>
  @endif
</section>
<!-- End About Section -->
@stop

@section('scripts')
@livewireScripts

@if(!Auth::Guest())
<!-- jQuery Min JS -->
<script src="{{ asset('js/CannibalizationFetcher.js') }}"></script>
@endif

@stop
