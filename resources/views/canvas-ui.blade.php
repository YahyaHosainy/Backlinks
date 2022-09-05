@extends('layouts.landing-page-layout') 
@section('tags')

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/canvas-ui.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Karla&family=Merriweather:wght@400;700&display=swap">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.2/build/styles/github.min.css">
</head>

@stop 
@section('content')

<body class="mb-5">

<div id="ui">
    <router-view></router-view>
</div>


<script>
    window.CanvasUI = @json($config);
</script>

<script type="text/javascript" src="{{ mix('js/canvas-ui.js') }}"></script>
</body>
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


