<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('dashboard/images/favicon.png') }}">
    <!-- Site Title  -->
    <title>User Dashboard | WebSEO</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets/css/vendor.bundle.css?ver=104') }}"
        data-turbolinks-track="reload">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css?ver=104') }}"
        data-turbolinks-track="reload">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        data-turbolinks-track="reload">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" data-turbolinks-track="reload">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('select2/dist/css/select2.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <style>
        .loader_div{
            position: absolute;
            top: 0;
            bottom: 0%;
            left: 0;
            right: 0%;
            z-index: 99;
            opacity:0.7;
            display:none;
            background: lightgrey url({{ asset('assets/img/loader.gif') }}) center center no-repeat;
        }
    </style>
    <!-- Select 2 Css -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('select2/dist/js/select2.min.js') }}" type="text/javascript"></script>
    <!-- /Select 2 Css & Js -->
    @livewireStyles
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <!-- gtm -->
        @if(isset($gtmHead))
        {!! $gtmHead !!}
    @endif
</head>

<body class="page-user">
@if(isset($gtmBody))
        {!! $gtmBody !!}
@endif
@yield("modals")
    <div class="topbar-wrap">
        <div class="topbar is-sticky">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="topbar-nav d-lg-none">
                        <li class="topbar-nav-item relative">
                            <a class="toggle-nav" href="#">
                                <div class="toggle-icon">
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                    <span class="toggle-line"></span>
                                </div>
                            </a>
                        </li><!-- .topbar-nav-item -->
                    </ul><!-- .topbar-nav -->
                    <a class="topbar-logo" href="{{ route('welcome') }}">
                        <img src="{{ asset('assets/img/logo.png') }}"
                            srcset="{{ asset('assets/img/logo.png') }}" alt="logo">
                    </a>
                    <ul class="topbar-nav">
                        @livewire('user-profile')
                    </ul><!-- .topbar-nav -->
                </div>
            </div><!-- .container -->
        </div><!-- .topbar -->
        <div class="navbar">
            <div class="container">
                <div class="navbar-innr">
                    <ul class="navbar-menu">
                        <li>
                            <a href="{{ route('reports') }}">
                                <em class="fa fa-bookmark pr-1"></em>
                                Reports
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('service-prices') }}">
                                <em class="fa fa-dollar pr-1"></em>
                                Prices
                            </a>
                        </li>
                        @if(!auth()->user()->is_admin)
                            <li>
                                <a href="{{ route('add-funds') }}">
                                    <em class="ikon ikon-dashboard pr-1"></em>
                                    Add Funds
                                </a>
                            </li>
                            <li >
                                <a href="{{ route('make-order') }}" class="make-order-cta" >
                                    <em class="ikon ikon-coins"></em>
                                    Make Order
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payment-history') }}">
                                    <em class="fa fa-history pr-1"></em>
                                    Payment History
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cannibalizationFetcher') }}">
                                    <em class="fa fa-search pr-1"></em>
                                    Cann. Fetcher
                                </a>
                            </li>

                        @endif
                        <!-- User is an admin -->
                        @if(auth()->user()->is_admin)
                            <li>
                                <a href="{{ route('payment-history') }}">
                                    <em class="fa fa-history pr-1"></em>
                                    Payment History
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cannibalizationFetcher') }}">
                                    <em class="fa fa-search pr-1"></em>
                                    Cann. Fetcher
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payment-methods') }}">
                                    <em class="fa fa-credit-card pr-1"></em>
                                    Payment Methods
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers') }}">
                                    <em class="fa fa-user pr-1"></em>
                                    Customers
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('api-settings') }}">
                                    <em class="fa fa-connectdevelop pr-1"></em>
                                    Api Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gtm-settings') }}">
                                    <em class="fa fa-google-wallet pr-1"></em>
                                    GTM Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('general-seo') }}">
                                    <em class="fa fa-internet-explorer pr-1"></em>
                                    General & SEO
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog-dashboard') }}">
                                    <em class="fa fa-book pr-1"></em>
                                    Manage Blog
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('email-settings') }}">
                                    <em class="fa fa-mail-forward pr-1"></em>
                                    Email Settings
                                </a>
                            </li>
                            <!--/ User is an Admin -->
                        @endif
                    </ul>
                </div><!-- .navbar-innr -->
            </div><!-- .container -->
        </div><!-- .navbar -->
    </div><!-- .topbar-wrap -->

    <!-- Page Content -->
    <main>
        {{ $slot ?? '' }}
    </main>

    @stack('modals')

    @yield('content')

    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">

                </div><!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div
                        class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text">&copy; WebSEO.Direct {{ now()->format('Y') }}</div>
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-bar -->

    <!-- Reports polling livewire block -->
    @livewire('reports-polling-bloc')
        <!-- /Reports polling livewire block -->

        <div class="modal fade" id="edit-wallet" tabindex="-1">
            <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                <div class="modal-content">
                    <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em
                            class="ti ti-close"></em></a>
                    <div class="popup-body">
                        <h4 class="popup-title">Wallet Address</h4>
                        <p>In order to receive your <a href="#"><strong>TWZ Tokens</strong></a>, please select your
                            wallet address and you have to put the address below input box. <strong>You will receive TWZ
                                tokens to this address after the Token Sale end.</strong></p>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-with-label">
                                        <label for="swalllet" class="input-item-label">Select Wallet </label>
                                        <select class="select-bordered select-block" name="swalllet" id="swalllet">
                                            <option value="eth">Ethereum</option>
                                            <option value="dac">DashCoin</option>
                                            <option value="bic">BitCoin</option>
                                        </select>
                                    </div><!-- .input-item -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                            <div class="input-item input-with-label">
                                <label for="token-address" class="input-item-label">Your Address for tokens:</label>
                                <input class="input-bordered" type="text" id="token-address" name="token-address"
                                    value="0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae">
                                <span class="input-note">Note: Address should be ERC20-compliant.</span>
                            </div><!-- .input-item -->
                            <div class="note note-plane note-danger">
                                <em class="fas fa-info-circle"></em>
                                <p>DO NOT USE your exchange wallet address such as Kraken, Bitfinex, Bithumb, Binance
                                    etc. You can use MetaMask, MayEtherWallet, Mist wallets etc. Do not use the address
                                    if you don’t have a private key of the your address. You WILL NOT receive TWZ Tokens
                                    and WILL LOSE YOUR FUNDS if you do.</p>
                            </div>
                            <div class="gaps-3x"></div>
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <button class="btn btn-primary">Update Wallet</button>
                                <div class="gaps-2x d-sm-none"></div>
                                <span class="text-success"><em class="ti ti-check-box"></em> Updated wallet
                                    address</span>
                            </div>
                        </form><!-- form -->
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- Modal End -->

        <!-- JavaScript (include all script here) -->
        <script src="{{ asset('dashboard/assets/js/jquery.bundle.js?ver=104') }}"
            data-turbolinks-track="reload"></script>
        <script src="{{ asset('dashboard/assets/js/script.js?ver=104') }}"
            data-turbolinks-track="reload"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


        @livewireScripts
        @yield("chart_js")
    <script data-turbolinks-track="reload">


        document.addEventListener('turbolinks:load', () => {
            // console.clear();
        });
        // console.clear();
        //window.livewire.components.getComponentsByName()[0].$wire.$refresh()

    </script>

</body>

</html>
