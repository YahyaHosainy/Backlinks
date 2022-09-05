@extends('layouts.welcome-page-layout') @section('css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" rel="preload" as="style">
    <!-- FlatIcon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.min.css') }}" rel="preload" as="style">
    <!-- Odometer Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}" rel="preload" as="style">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}" rel="preload" as="style">
    <!-- Font Awesome Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" rel="preload" as="style">
    <!-- Font Raleway -->
    <link href="{{ asset('assets/css/font-dancing.min.css') }}" rel="stylesheet" rel="preload" as="style">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" rel="preload" as="style">
    <!-- Responsive CSS -->
    <link rel="stylesheet" media='screen and (min-width: 100px) and (max-width: 1500px)'
        href="{{ asset('assets/css/responsive.min.css') }}" rel="preload" as="style" />

    <!-- Seo Settings -->
    {!! SEO::generate() !!}
    <!-- /Seo Settings -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="preload" as="style">
    <link rel="icon" type="image/png') }}" href="{{ asset('assets/img/favicon.png') }}"> @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer>
    </script>
    <meta name="turbolinks-visit-control" content="reload"> @stop @section('tags')

    <meta charset="utf-8">

    <link rel="alternate" href="{{ env('APP_URL') }}" hreflang="en-US" />
    <link href="{{ env('APP_URL') }}" rel="canonical" />


    <!-- Opengraph -->
    <meta property="fb:app_id" content="684180525600147" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:image" content="{{ env('APP_URL') }}/assets/img/webseodirectlogo.png" />


    <!-- Twittercard -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{ $twitter_title }}" />
    <meta name="twitter:domain" content="{{ env('APP_URL') }}" />
    <meta name="twitter:image" content="{{ env('APP_URL') }}/assets/img/logo.png" />
    <meta name="twitter:description" content="{{ $twitter_description }}" />
    <meta name="twitter:creator" content="@WebSEO_Direct" />
    <meta name="twitter:site" content="@WebSEO_Direct" />
    <!-- mcjs  -->
    <script id="mcjs" defer>
        ! function(c, h, i, m, p) {
            m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m,
                p)
        }(document, "script",
            "https://chimpstatic.com/mcjs-connected/js/users/c2c9da9151ad17ca8b5eb60b7/bc0177c5799d55432fc77ee30.js");

    </script>

    <!--  application/ld+json -->
    <script type="application/ld+json" defer>
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "{{ env('APP_URL') }}",
            "sameAs": ["https:\/\/linkedin.com\/company\/67933148", "https:\/\/twitter.com\/WebSEO_Direct",
                "https:\/\/facebook.com\/WebSeoDirect"
            ],
            "name": "Backlinks Services",
            "logo": "{{ env('APP_URL') }}/assets/img/logo.png"
        }

    </script>
    <script type="application/ld+json" defer>
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "url": "{{ env('APP_URL') }}",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ env('APP_URL') }}/{search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }

    </script>
    @stop @section('content')

    <!-- Start Dashboard Banner Two -->
    <div class="home-banner-two">
        <div class="d-table">
            <div class="d-table-cell container">
                <div class="container bg-white shadow-sm" style=" ">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-md-6">
                            <div class="main-banner-content">
                                <h1>Backlinks Services Backlinks Panel</h1>
                                <div style="  text-align: justify;
            ">

                                    <h2 class="green-under-title" style="font-size: 20px">Boost Your Search Engine Ranking</h2>
                                    <hr class="my-2">

                                    <p>Our SEO backlinks service will ensure your website climbs the search engine results
                                        page, and all it takes to buy backlinks is a few clicks.</p>
                                    <p style="  text-align: justify;
            "> We know the importance of permanent backlinks to improve your site ranking. Well, you are at the right place
                                        to
                                        achieve this goal and achieve the best publicity for your site at the lowest cost.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @if (Auth::Guest()) @livewire('register-form') @else
                            <div class="center-funds">
                                @livewire('customer-dashboard-home')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-img-wrapper">
            <div class="banner-img-1">
                <img src="{{ asset('assets/img/left-shape.png') }}" loading="lazy" alt="image">
            </div>

            <div class="banner-img-2">
                <img src="{{ asset('assets/img/right-shape.png') }}" loading="lazy" alt="image">
            </div>
        </div>

        <div class="shape-img2"><img src="{{ asset('assets/img/shape/2.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img3"><img src="{{ asset('assets/img/shape/3.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img5"><img src="{{ asset('assets/img/shape/5.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img6"><img src="{{ asset('assets/img/shape/6.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img7"><img src="{{ asset('assets/img/shape/2.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img8"><img src="{{ asset('assets/img/shape/10.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img9"><img src="{{ asset('assets/img/shape/7.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img10"><img src="{{ asset('assets/img/shape/5.png') }}" loading="lazy" alt="image">
        </div>
        <div class="shape-img11"><img src="{{ asset('assets/img/shape/11.png') }}" loading="lazy" alt="image">
        </div>
    </div>
    <!-- End  Dashboard Banner Two -->
    <hr class=" w-50 mx-auto">

    <section class="features-area pt-0 ">
        <div class="container ">
            <div class=" ">



                <div class="card mx-1 shadow mb-5 ">
                    <div class="card-header font-weight-bold row justify-content-center my-auto align-middle announce-header">                        
                        <i class="fas fa-bullhorn mr-4"></i>
                        <span class="my-auto">
                            <span style="">
                                5$ ONLY !
                            </span>
                            You will Get a Featured Backlink Web 2.0</span>
                    </div>
                    <div class="card-body announce-card">
                        <div class="card-text  ">
                            <ul>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2"></i>
                                    High Domain Authority (DA 30 - 100)
                                </li>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2" ></i>
                                    Mix do-follow and no-follow links
                                </li>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2" ></i>
                                    Unique Custom Image Design
                                </li>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2" ></i>
                                    Social Signals to the Backlinks
                                </li>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2" ></i>
                                    Real Website Visits to the Backlinks
                                </li>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2" ></i>
                                    Human-Quality Unique Content (Grammatical, Readable, Niche Relevant)
                                </li>
                                <li class="my-4">
                                    <i class="fas fa-check mx-2" ></i>
                                    Available languages (English, German, French, Portuguese, Italian, Spanish)
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </section>


    <!-- Start Features Area -->
    <section class="features-area pt-0">
        <div class="container">
            <div class="text-center ">
                <a href="{{ route('add-funds') }}">
                    <button class="free-bonus-button shadow-sm " style="max-width: 75%;">
                        <i class="fas fa-comment-dollar" class="mx-4 "></i> Fund ${{ $bonus }} and Get
                        ${{ $funds }} Free Bonus
                    </button>
                </a>
            </div>


            <div class="features-title">
                <span>FEATURES MAKE US LOVED</span>
                <h2>Why You Should Try Our SEO Backlinks Service</h2>
            </div>

            <div class="row ">
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex align-self-center">
                    <div class="single-features-item bg-b5a2f8 h-100">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>

                        <h3>Fast Delivery</h3>
                        <p>We know how important speed is to our customers, so we make it our business to deliver every
                            order in under 24 hours, and tier-2 may take up to 48 hours. </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 d-flex align-self-center">
                    <div class="single-features-item bg-f27e19 h-100">
                        <div class="icon">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>

                        <h3>Affordable</h3>
                        <p>All our backlink services come at reasonable prices, starting at $0.0001 per backlink — with a
                            low minimum quantity requirement and without compromising on quality.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 d-flex align-self-center">
                    <div class="single-features-item bg-1db294 h-100">
                        <div class="icon">
                            <i class="fas fa-tasks"></i>

                        </div>

                        <h3>Wide Range Of Services</h3>
                        <p>Backlinks are our specialty, but we offer a full range of related services to ensure you can get
                            everything you need to rise up the search engine rankings.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 d-flex align-self-center">
                    <div class="single-features-item bg-e80d82 h-100">
                        <div class="icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <h3>Manage Your Order Easily</h3>
                        <p>That’s why we ensure our process is simple enough for a child to manage, there are three ways to
                            make an order with us, and you can instantly check your order status for each one.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="features-animation">
            <div class="shape-img1">
                <img src="{{ asset('assets/img/shape/8.png') }}" loading="lazy" alt="image">
            </div>
            <div class="shape-img2">
                <img src="{{ asset('assets/img/shape/5.png') }}" loading="lazy" alt="image">
            </div>
        </div>
    </section>
    <!-- End Features Area -->
    <br>

    <!-- Start Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-title">
                <span>WHY US</span>
                <h2>What Makes Us The BEST?</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon bg-faddd4">
                            <i class="flaticon-landing-page"></i>
                        </div>

                        <h3>Weekly Updated Websites</h3>
                        <p>We do monitor our websites weekly by our crawling bot to confirm DA, DR, SS scores stand good to
                            make sure they are still a right and safe place to insert backlinks</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon bg-cafbf1">
                            <i class="flaticon-goal"></i>
                        </div>

                        <h3>Easy Ordering System</h3>
                        <p>Simply on one page, you can place your order with clear instructions to make your submission
                            effective and safe for you and our websites</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon bg-ddd5fb">
                            <i class="flaticon-contract"></i>
                        </div>

                        <h3>Relevant Niche Articles</h3>
                        <p>You have an option in order page to choose the niche of your business, so our AI article
                            generator will make niche relevant texts for your submission</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon bg-fcdeee">
                            <i class="flaticon-application"></i>
                        </div>

                        <h3>Downloadable Reports</h3>
                        <p>Within 48 hours, you will receive a fully organized order report in an excel file. It will be
                            easy to import to any backlinks monitors tool.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon bg-c5ebf9">
                            <i class="flaticon-seo"></i>
                        </div>

                        <h3>Penalty Free Strategies</h3>
                        <p>We didn’t ever face a penalty issue due to our backlinks. It is a top priority for us to make our
                            website clean. However, we do guarantee the no penalties will occur.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon bg-f8fbd5">
                            <i class="flaticon-data-recovery"></i>
                        </div>

                        <h3>Fast Indexing</h3>
                        <p>We offer an option to index your backlinks fastly. We recommend to use it because it is very safe
                            also and makes the results noticeable earlier.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <br>
    <!-- Start About Section -->
    <section class="about-section ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{ asset('assets/img/white-label-report.png') }}" loading="lazy" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-area-content">
                        <span>WHITE LABEL REPORT</span>
                        <h2>Easy to Order. Easier to Resell.</h2>
                        <strong>Whether you want backlinks for your own site or to sell on to your client, we’re at your
                            service at Backlinks Services where you can buy cheap backlinks and managing an order has never
                            been
                            easier, just check your progress straight from our system while knowing you can rely on
                            high-quality and efficient delivery.</strong>
                        <p>You’ll even get a white label report with every order, allowing you to sell backlinks easily.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-6 col-6">
                            <div class="single-fun-facts">
                                <li>
                                    <span class="sign-icon mr-2">+</span>
                                    <span class="odometer" id="projectsNumber">00</span>
                                </li>
                                <p>Project Completed</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-6 col-6">
                            <div class="single-fun-facts">
                                <li>
                                    <span class="sign-icon mr-2">+</span>
                                    <span class="odometer" id="clientsNumber">00</span>
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

    <!-- Start Choose Section -->
    <section class="choose-section bg-fafafa">
        <div class="container">
            <div class="row justify-content-around align-middle">
                <div class="col-lg-6 col-md-12">
                    <div class="choose-content-area">
                        <span>Why Choose Us</span>
                        <h2>Boost Your Search Engine Ranking With Our Backlinks</h2>
                        <p>Improving your rank has never been easier. Our advanced tools and sophisticated strategies will
                            help you rise in prominence on Google in no time at all.</p>

                        <div class="choose-text">
                            <i class="flaticon-check-mark"></i>
                            <h3>Quality Backlinks</h3>
                            <p>Not all backlinks are made equal, but we work with a reliable network to ensure you always
                                get high-quality backlinks. Just use our simple system to choose which service you want and
                                make an order.</p>
                        </div>

                        <div class="choose-text">
                            <i class="flaticon-check-mark"></i>
                            <h3>SEO Campaigns</h3>
                            <p>SEO is essential for ranking high on Google, and our SEO campaigns are pre-designed to meet
                                your needs — there’s something for every budget.</p>
                        </div>

                        <div class="choose-text">
                            <i class="flaticon-check-mark"></i>
                            <h3>Drip Feed Strategy</h3>
                            <p>Instead of overloading Google with a sudden rush of new backlinks, our drip-feed strategy
                                schedules your backlinks gradually over a few months. This is the most effective way to
                                improve your ranking.</p>
                        </div>
                        <div class="choose-text">
                            <i class="flaticon-check-mark"></i>
                            <h3>Linking Pyramids</h3>
                            <p>We use link pyramids with various tiers to structure your backlinks properly. You can add
                                extra tiers to your current orders or ask for tiers from the beginning.</p>
                        </div>

                        <div class="choose-btn">
                            @if (Auth::Guest())
                            <a href="/login" class="default-btn-one">ORDER NOW</a> @else
                                <a href="/user/dashboard/make-order" class="default-btn-one">ORDER NOW</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 mr-0 my-auto">
                    <img src="{{ asset('assets/img/why-choose-us.png') }}" loading="lazy" alt="image" class="w-100 ">

                </div>
            </div>
        </div>
    </section>
    <!-- End Choose Section -->



    <!-- Start Blog Section -->
    <section class="blog-section pt-100">
        <div class="container">
            <div class="section-title">
                <span>Strategy</span>
                <h2>Successful Backlinks Strategy</h2>
            </div>
            <div class="row col-12">
                <div class="card mx-1 shadow-sm ">
                    <div class="card-body">
                        <h3 class=" mb-4 font-weight-bold text-pink">
                            The Optimal Homepage Anchors Percent
                        </h3>
                        <p class="card-text text-left">
                        <div class="text-dark-blue">Here is the best anchor texts breakdown for your home page backlinks
                            profile</div>
                        <ul class="list-group mt-4">
                            <li class="my-2 text-dark"><i class="fas fa-angle-right mr-2 text-pink"></i>70%-80% of the links
                                should be for your Brand Name and Naked URL</li>
                            <hr>
                            <li class="my-2 text-dark"><i class="fas fa-angle-right mr-2 text-pink"></i>5-10% of the links
                                should be for the mixed and natural anchors</li>
                            <hr>
                            <li class="my-2 text-dark"><i class="fas fa-angle-right mr-2 text-pink"></i>5-10% for your main
                                targeted Exact Match Anchor (Keywords)</li>
                        </ul>
                        </p>
                    </div>

                </div>
                <div class="card mx-1 shadow-sm ">
                    <div class="card-body ">
                        <h3 class="card-title text-pink mb-4 font-weight-bold">
                            The Optimal Sub-Pages Anchors Percent
                        </h3>
                        <p class="card-text text-left">
                        <div class="text-dark-blue">Here is the best anchor texts breakdown in your backlinks for the other
                            pages</div>
                        <ul class="list-group  mt-4">

                            <li class="my-2 text-dark"><i class="fas fa-angle-right mr-2 text-pink"></i>35%-45% of the links
                                should be for your Brand Name and Naked URL</li>
                            <hr>
                            <li class="my-2 text-dark"><i class="fas fa-angle-right mr-2 text-pink"></i>50%-60% of the links
                                should be for the mixed and natural anchors</li>
                            <hr>
                            <li class="my-2 text-dark"><i class="fas fa-angle-right mr-2 text-pink"></i>1-10% Maximum for
                                your targeted Exact Match Anchor (Keywords)</li>
                        </ul>

                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- CTA -->
    @if (env('BONUS_AFTER_EMAIL_VERIFICATION') > 0)
        @if (Auth::Guest())
            <section class="blog-section pt-100">
                <div class="container">
                    @if (env('BONUS_AFTER_EMAIL_VERIFICATION') != 0)
                        <div class="section-title">
                            <span>Limited Offer</span>
                            <h2 class="text-uppercase">Don't forget your free
                                ${{ env('BONUS_AFTER_EMAIL_VERIFICATION') }}</h2>
                        </div>
                    @endif
                    <div class="text-center">
                        @if (env('BONUS_AFTER_EMAIL_VERIFICATION') != 0)
                            <button class="px-5  cta-end-page">
                                <a href="{{ route('register') }}">
                                    Collect Your ${{ env('BONUS_AFTER_EMAIL_VERIFICATION') }} Credit
                                </a>
                        </button> @else
                            <button class="px-5  cta-end-page">
                                <a href="{{ route('register') }}">
                                    Collect Your $5 Credit
                                </a>
                            </button>
                        @endif
                    </div>
                </div>
            </section>
        @endif
        <!-- End Blog Section -->
    @endif @stop @section('scripts') @livewireScripts

    <!-- jQuery Min JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
    <!-- Bootstrap Min JS -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <!-- MeanMenu JS  -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}" defer></script>
    <!-- Appear Min JS -->
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}" defer></script>
    <!-- Odometer Min JS -->
    <script src="{{ asset('assets/js/odometer.min.js') }}" defer></script>
    <!-- Parallax Min JS -->
    <script src="{{ asset('assets/js/parallax.min.js') }}" defer></script>
    <!-- Ajaxchimp JS -->
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}" defer></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
    <!-- change projects and clients number -->
    <script defer>
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
