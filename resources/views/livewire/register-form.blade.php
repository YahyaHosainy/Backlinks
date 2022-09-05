<div class="col-lg-5 col-md-6">
    <div class="banner-form">

        @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
            <a href="{{ route('login') }}"><b>Link</b></a> to login & verify your account
        </div>
        @endif       
         @if (session()->has('finger_print_required'))
        <div class="alert alert-danger text-center">
            finger print is required! Make sure you have javascript enabled and no chrome extensions are disabling your browser's fingerprint
        </div>
        @endif
        @if (session()->has('warning'))
        <div class="alert alert-warning text-center">
            {{ session('warning') }}
        </div>
        @endif
        @if (session()->has('email-taken'))
        <div class="alert alert-danger text-center">
            this email is already registered <span><a href="{{route('login')}}" class="font-weight-bold mx-1 ">Login</a></span>
        </div>
        @endif
        
         @if (count($errors) > 0) @foreach ($errors->all() as $error)
        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
        </p>
        @endforeach @endif
        <form id="register-form" method="POST" action="{{ route('register-new-user') }}">
            @csrf

            <a href="{{ route('google-login') }}" class="btn btn-primary font-20 collect-button mb-3">
                <img
                    src="/assets/img/Google__G__Logo-min.png"
                    alt="google image"
                    style="width:30px;float:left;padding:4px;background-color:white;border-radius:50px"
                    class="mr-2"
                >
                Continue with Google
            </a>
    
            {{-- <small>Or with email password</small>
            <hr class="mb-2 mt-2">

            <div class="form-group">
                <label>{{ __('Full Name') }}</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" :value="old('name')">
            </div>

            <div class="form-group">
                <label>{{ __('Email') }}</label>
                <input type="email" class="form-control" placeholder="Email" name="email" :value="old('email')">
            </div>

            <div class="form-group">
                <label>{{ __('Password') }}</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>

            <input type="hidden" name="finger_print" id="finger_print" />
            <div class="mt-4">
                <input class='mr-2' type="checkbox"  name="terms-checkbox" id="terms-checkbox">
                <label for="terms-checkbox">I approve the terms of use <a href="{{route('terms_of_use')}}" class="text-success">Terms of use</a></label>
            </div>
            <a onclick="document.getElementById('register-form').submit();"
               class="btn btn-primary font-20 collect-button">
                @if(env('BONUS_AFTER_EMAIL_VERIFICATION') != 0)
                    Collect Your ${{ env('BONUS_AFTER_EMAIL_VERIFICATION') }} Credit
                @else
                    Create Your Account
                @endif
            </a> --}}
        </form>
    </div>
</div>
<script>
    function initFingerprintJS() {
        FingerprintJS.load().then(fp => {
            // Get a visitor identifier.
            fp.get().then(result => {
                // visitor identifier:
                const visitorId = result.visitorId;
                // document.getElementById("finger_print").value=visitorId;
                document.getElementById("finger_print").value = visitorId;
                document.getElementById("finger_print").dispatchEvent(new Event('input'));

            });
        });
    }
</script>
<script async
        src="{{ asset('assets/js/fingerprint.js') }}"
        onload="initFingerprintJS()">

</script>
