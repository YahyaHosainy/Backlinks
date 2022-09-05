@extends('layouts.landing-page-layout') @section('tags')
<title>Our Premium Websites List | Backlinks Services</title>

<meta charset="utf-8">
<meta name="description" content="This is a list of websites that we have access to post backlinks there within articles or profiles. This list is updating frequently!" />

<link rel="alternate" href="{{env('APP_URL')}}/premium-sites" hreflang="en-US" />
<link href="{{env('APP_URL')}}/premium-sites" rel="canonical" />


<!-- Opengraph -->
<meta property="fb:app_id" content="684180525600147" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Our Premium Websites List | Backlinks Services" />
<meta property="og:url" content="{{env('APP_URL')}}/premium-sites" />
<meta property="og:image" content="{{env('APP_URL')}}/assets/img/webseodirectlogo.png" />
<meta property="og:description" content="This is a list of websites that we have access to post backlinks there within articles or profiles. This list is updating frequently!" />


<!-- Twittercard -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Our Premium Websites List | Backlinks Services" />
<meta name="twitter:domain" content="{{env('APP_URL')}}/premium-sites" />
<meta name="twitter:image" content="{{env('APP_URL')}}/assets/img/webseodirectlogo.png" />
<meta name="twitter:description" content="This is a list of websites that we have access to post backlinks there within articles or profiles. This list is updating frequently!" />
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
                "@id": "https:\/\/webseo.direct",
                "name": "Backlinks Services"
            }
        }, {
            "@type": "ListItem",
            "position": 2,
            "item": {
                "@id": "https:\/\/webseo.direct\/premium-sites",
                "name": "Premium Websites List"
            }
        }]
    }
</script>

@stop @section('content')
<div class="home-banner-two-auth py-5">
    <div class="d-table pt-5">
        <div class="d-table-cell pt-5">
            <div class="container">
                <h1 class="text-center  text-secondary text-underline" style="font-size: 55px;font-family: 'Dancing Script', cursive; ">
                    Our Pemium Websites
                </h1>
                <p class="text-center pb-5 pt-2" style="color:#304674; font-size:20px">
                    This is a list of websites that we have access to post backlinks there within articles or profiles. This list is updating frequently
                </p>
                <hr>
                <div class="row col-12  mt-5 mx-auto" id="post-data">

                    @include('sub-pages/premium-sites/data')

                </div>
                <div class="row py-5 mt-3 ajax-load" style="display:none">
                    <p class="text-center">
                        <img src="{{asset('assets/img/loader.gif')}}" class="w-50 mx-auto " alt=""> Loading More websites
                    </p>
                </div>
            </div>
        </div>
    </div>

    @stop @section('scripts') @livewireScripts

    <!-- jQuery Min JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- infinite scrolling -->
    <script>
        function loadMoreData(page) {
            $.ajax({
                    url: "?page=" + page,
                    type: 'get',
                    beforeSend: function() {
                        $(".ajax-load").show();
                    }
                }).done(function(data) {
                    if (data.html == "") {
                        $('.ajax-load').html("no more websites to load");
                        return;
                    }
                    $('.ajax-load').hide();
                    $('#post-data').append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, throwError) {
                    alert("Server not responding...")
                })
        }
        var page = 1;
        $(window).scroll(function() {
            console.log($(window).scrollTop() + $(window).height() >= $(document).height() - 40)

            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 460) {
                console.log('loading...')


                page++;
                loadMoreData(page);
            }

        });
    </script>
    <!-- Popper Min JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}" defer></script>
    <!-- Bootstrap Min JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <!-- MeanMenu JS  -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}" defer></script>
    <!-- Appear Min JS -->
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}" defer></script>
    <!-- Odometer Min JS -->
    <script src="{{ asset('assets/js/odometer.min.js') }}" defer></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}" defer></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}" defer></script>
    <!-- Nice Select Min JS -->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}" defer></script>
    <!-- Mixitup Min JS -->
    <script src="{{ asset('assets/js/jquery.mixitup.min.js') }}" defer></script>
    <!-- WOW Min JS -->
    <script src="{{ asset('assets/js/wow.min.js') }}" defer></script>
    <!-- Parallax Min JS -->
    <script src="{{ asset('assets/js/parallax.min.js') }}" defer></script>
    <!-- Ajaxchimp JS -->
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}" defer></script>
    <!-- Form Validator JS -->
    <script src="{{ asset('assets/js/form-validator.min.js') }}" defer></script>
    <!-- Contact JS -->
    <script src="{{ asset('assets/js/contact-form-script.js') }}" defer></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}" defer></script>

    @stop