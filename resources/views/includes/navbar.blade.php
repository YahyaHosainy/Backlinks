<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="crimso-responsive-nav">
        <div class="container">
            <div class="crimso-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img style="height: 35px;" src="{{ asset('assets/img/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="crimso-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="height: 55px;">
                </a>

                <div class="collapse navbar-collapse mean-menu " id="navbarSupportedContent">
                    <ul
                        class="navbar-nav"
                        style="align-items: center;"
                    >

                        <li class="nav-item ">
                            <a href="/" class="nav-link">Home
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ url('blog') }}" class="nav-link">Blog
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="/services" class="nav-link">Services
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="/about" class="nav-link">About
                            </a>
                        </li>

                        <a href="{{ route('cannibalizationFetcher') }}" class="register-button">
                            <li >
                                Cann. Fetcher
                            </li>
                        </a>

                        <li class="nav-item">
                            <a href="/contact-us" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="/faq" class="nav-link">FAQ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/premium-sites" class="nav-link">Our Premium Websites
                            </a>
                        </li>



                        @if(Auth::Guest())
                        <a href="{{ route('google-login') }}" class="register-button">
                        <li >
                            <img
                                class="mr-2"
                                style="width: 26px;display:inline;background-color:white;padding:3px;border-radius:50px"
                                src="/assets/img/Google__G__Logo-min.png"
                                alt="google logo"> Sign In
                        </li>
                        </a>

                        {{-- <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Sign Up
                                </a>
                        </li> --}}
                        @else
                        <li class="nav-item">
                            <a href="{{ route('user-dashboard') }}" class="nav-link active">Go
                                    To Dashboard &nbsp;
                                    <i class="fas tachometer-alt-fastest"></i>
                                </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->