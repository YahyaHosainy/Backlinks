@extends('layouts.dashboard')
@section('content')
    <div class="page-content">
        <div class="container">
            @if(session()->has('payment-done'))
                <div class="alert alert-success mt-2 mb-2 text-center">
                    <b>{{ session()->get('payment-done') }}</b>
                </div>
            @endif
            @if(session()->has('payment-failed'))
                <div class="alert alert-danger mt-2 mb-2 text-center">
                    <b>{{ session()->get('payment-failed') }}</b>
                </div>
            @endif
            @if(session()->has('payment-declined'))
                <div class="alert alert-warning mt-2 mb-2 text-center">
                    <b>{{ session()->get('payment-declined') }}</b>
                </div>
            @endif
            @if(session()->has('payment-canceled'))
                <div class="alert alert-danger mt-2 mb-2 text-center">
                    <b>{{ session()->get('payment-canceled') }}</b>
                </div>
            @endif
            <div id="loader_div" class="loader_div"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-white p-4 mb-4">
                        <div class="card-head">
                            <h4 class="card-title text-center">User Balance</h4>
                        </div>
                        <div class="text-center">
                            @if(auth()->user()->balance != 0)
                                You have <span class="badge badge-success">USD {{ number_format( auth()->user()->balance , 2, '.', ',') }}</span> in your balance.
                            @else
                                <div class="mb-4">
                                    You have <span class="badge badge-danger">USD {{ number_format( auth()->user()->balance , 2, '.', ',') }}</span> in your balance.<br>
                                </div>
                                <hr>
                                <div class="alert alert-warning mt-4">
                                    What are you waiting for ? Add some funds and start making orders !
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                @if($isPayPalEnabled)
                    @if($isPayPalEnabled && $isStripeEnabled)
                        <div class="col-md-6" >
                    @else
                        <div class="col-md-12" >
                    @endif
                            <div class="bg-white p-4 mb-4">
                                <div class="card-head">
                                    <h4 class="card-title">Add funds by Paypal</h4>
                                </div>
                                <form action="{{ route('charge') }}" method="post" id="paypal-form">
                                    @csrf
                                    <input type="number"
                                        name="amount"
                                        min="1"
                                        id="paypal-amount"
                                        placeholder="Enter your amount in $"
                                        class="form-control"/>
                                    @error('amount') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                    <input id="paypal-add-funds-button" class="btn btn-primary form-control mt-2" type="submit" name="submit" value="Add Funds">
                                </form>
                            </div>
                        </div>
                @endif
                @if($isStripeEnabled)
                @if($isPayPalEnabled && $isStripeEnabled)
                        <div class="col-md-6" >
                    @else
                        <div class="col-md-12" >
                    @endif
                            <div class="bg-white p-4 mb-4">
                                <div class="card-head">
                                    <h4 class="card-title">Add funds by Credit/Debit Card</h4>
                                </div>
                                <form action="{{ route('stripe-charge') }}" method="post" id="payment-form">
                                    <input class="form-control"
                                        type="number"
                                        min="1"
                                        name="stripe-amount"
                                        id="stripe-amount"
                                        placeholder="Enter Amount in $" />
                                    @error('stripe-amount') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                    <div class="form-row pt-4">
                                        <label for="card-element">
                                            Enter your Card number
                                        </label>
                                        <div id="card-element" style="width:100%;">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>

                                    <div class="form-check mt-4 mb-2">
                                        <input type="checkbox" name="savePaymentMethode" class="form-check-input" id="savePaymentMethode">
                                        <label class="form-check-label text-uppercase" style="font-size:16px" for="savePaymentMethode">save payement info for future usage</label>
                                    </div>
                                    <button id="strip-add-funds-button" class="btn btn-primary form-control mt-2">Add Funds</button>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        var publishable_key = '{{ env('STRIPE_PUBLISHABLE_KEY') }}';
    </script>
    <script>
        $('#payment-form').submit(function() {
            $(this).find("button[id='strip-add-funds-button']").prop('disabled',true);
        });
        $('#strip-add-funds-button').on('click', () => {
            $(".loader_div").show();
        });
        $('#paypal-add-funds-button').click(() => {
            $(".loader_div").show();
        });
        // Create a Stripe client.
        var stripe = Stripe(publishable_key);

    </script>
    <script src="{{ asset('assets/js/card.js') }}"></script>
    <script>
        document.addEventListener('turbolinks:load', () => {
            window.livewire.rescan()
        });
        //window.livewire.rescan()
    </script>
@endsection
