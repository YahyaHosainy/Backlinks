@extends('layouts.landing-page-layout') @section('tags')
<title>Verify email | Backlinks Services</title>
@stop @section('content')

<div>
    <div class="home-banner-two verify-card">

        <div class="">
            <a href="/"><img style="max-height:80px;" class="mb-2 mx-auto" src="{{ asset('assets/img/logo.png') }}" alt=""></a>
        </div>



        <div class="w-full  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif

            <div class="mt-4 row col-12 justify-content-between ">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-jet-button>
                    </div> 
                </form>

                <form method="POST"  class=" " action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class=" btn bg-gray-800 btn-block text-white">
                    {{ __('Logout') }}
                </button>
                </form>
            </div>
        </div>
    </div>

</div>
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
<script>
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