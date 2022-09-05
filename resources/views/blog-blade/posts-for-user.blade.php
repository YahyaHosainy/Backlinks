    @extends('layouts.landing-page-layout') 
    @section('tags') 
    <title>{{$user->name}}</title>
    <link rel="canonical" href= "{{env('APP_URL')}}/blog" >
    @stop @section('content')
    <div class="home-banner-two-auth">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="mt-5">
                        <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3">
                            <main role="main" class="mt-5">
                                <div class="container pt-5">
                                    <div class="my-4 border-bottom mt-5 pb-2" style="border-color:rgb(47, 47, 47) !important">
                                        <h1 class="border-bottom border-dark pb-2 " style="font-size: 35px; border-color:rgb(207, 207, 207) !important">
                                            Author: {{$user->name}}
                                        </h1>
                                        <p class="text-grey mt-3 mb-5">
                                            Blog Posts written by {{$user->name}} contains a lot of valuable information, don't miss reading them!
                                        </p>
                                    </div>
                                    @foreach ($posts as $post)
                                    <div class="card mb-4 shadow">
                                        <a href="{{route('show-one-post-blade', $post->slug)}}">
                                            @if($post->featured_image)
                                            <img src="{{$post->featured_image}}" alt="{{$post->featured_image_caption}}" class="rounded w-100" /> 
                                            @endif
                                        </a>
                                        <div class="card-body">
                                            <a href="{{route('show-one-post-blade', $post->slug)}}">
                                                <h5 class="card-title font-weight-bold">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->summary }}</p>
                                            </a>
                                            <div class="row col-12 d-flex justify-content-between border-top mt-4 ">
                                                <div class="my-4">
                                                <p class="card-text">
                                                        <small class="text-muted">
                                                        <span class="written text-uppercase mr-2">Author :</span>  
                                                            <a href="{{route('show-posts-for-user-blade', $post->user->id)}}">
                                                            {{ $post->user->name }}
                                                            </a>
                                                        </small>
                                                </p>                                                
                                                @if($post &&  $post->read_time && $post->published_at)
                                                <p class="card-text"><small class="text-muted"> <span class="written text-uppercase mr-2">Time :</span>{{$post->published_at->format('j F, Y')}} — {{ $post->read_time }}</small></p>
                                                @endif
                                                </div>
                                                <div>
                                                    <a href="{{route('show-one-post-blade', $post->slug)}}">
                                                        <button class="btn my-4 read-more-button">
                                                    Read more
                                                    </button>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-5">
                                        @endforeach {{ $posts->links() }}
                                    </div>

                                </div>
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop @section('scripts') @livewireScripts
    <!-- jQuery Min JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
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
    <!-- change projects and clients number -->
    <script>
        console.clear();
    </script>
    @stop