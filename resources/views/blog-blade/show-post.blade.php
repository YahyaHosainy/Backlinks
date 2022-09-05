@extends('layouts.landing-page-layout') @section('tags') @if($post->title)
<title> {{$post->title}}</title>
@else
<title>Post | Backlinks Services Blog</title>
@endif
<link rel="canonical" href="{{Request::url()}}">
<meta name="description" content="{{$post->summary}}">
<meta name="og:title" content="{{$post->title}}"> @if($post->featured_image)
<meta property="og:image" content="{{env('APP_URL')}}{{$post->featured_image}}"> @endif
<meta property="og:description" content="{{$post->summary}}">

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{$post->meta['title']}}">
<meta name="twitter:description" content="{{$post->summary}}">
<meta name="twitter:image" content="{{$post->featured_image}}">






<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{$post->title}}",
        @if($post->featured_image)
        "image": [
            "{{env('APP_URL')}}{{$post->featured_image}}"
        ],
        @endif 
        @if($post->published_at)
        "datePublished": "{{$post->published_at->format('Y-m-d')}}"
        @endif
    }
</script>
@stop @section('content')
<div class="home-banner-two-auth">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="mt-5">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12 mt-3">
                    <main role="main" class="mt-5">
                        <div class=" pt-5">
                            <div class="my-4  mt-5 pb-2" style="border-color:rgb(47, 47, 47) !important">
                                <h1 class="border-bottom border-dark pb-4 Merriweather " style="font-size: 35px; border-color:rgb(207, 207, 207) !important">
                                    {{ $post->title }}
                                </h1>
                                @if($post->published_at)
                                <div class="mt-4 blog-read-time Merriweather">
                                    {{ $post->read_time }} -
                                    <span class="card-text Merriweather"><small class="text-muted"> </span>{{$post->published_at->format('j F, Y')}}</small>
                                    </span>
                                </div>
                                @endif
                            </div>

                            <div class="col">
                                <div class="card my-5 pb-5 border-0">
                                    @if($post->featured_image)
                                    <img src="{{$post->featured_image}}" alt="{{$post->featured_image_caption}}" class=" card-img-top  w-75 mx-auto mt-5 shadow" /> @endif
                                    <div class="card-body mt-5 blog-p" style="font-size:25px !important">
                                        <div class="card-text blog-text"> {!! $post->body !!}</div>
                                        <div class="my-4">
                                            <p class="card-text">
                                                <small class="text-muted Merriweather">
                                                  <span class="written text-uppercase mr-2">Author :</span>  
                                                    <a href="{{route('show-posts-for-user-blade', $post->user->id)}}">
                                                      {{ $post->user->name }}
                                                    </a>
                                                </small>
                                            </p>
                                            <p>
                                                @if(isset($post->topic[0]))
                                                <small class="text-muted Merriweather">
                                                    <span class="written text-uppercase mr-2">In :</span>  
                                                      <a href="{{route('show-posts-for-topic-blade', $post->topic[0]->slug)}}">
                                                        {{$post->topic[0]->name}}
                                                      </a>
                                                  </small>
                                                  @endif
                                            </p>
                                        </div>
                                        @if(isset($post->tags))
                                        <div class="mt-5">
                                            @foreach($post->tags as $tag )
                                            <a href="{{route('show-posts-for-tag-blade', $tag->slug)}}" class="badge badge-light p-2 my-1 mr-2 text-decoration-none text-uppercase blog-tag ">
                                                {{ $tag->name }}
                                            </a> @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                </main>
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