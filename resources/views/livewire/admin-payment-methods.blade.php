<div class="row">
    <div class="col-md-12">
        <h1 class="text-center text-xl mb-2 text-primary">Stripe Settings</h1>
        @if(session()->has('stripe_keys_modified'))
            <div class="alert bg-green-500 text-center">
                {{ session('stripe_keys_modified') }}
            </div>
        @endif
        @if(session()->has('stripe_keys_not_modified'))
            <div class="alert bg-red-500 text-center">
                {{ session('stripe_keys_not_modified') }}
            </div>
        @endif
        <form class="mt-2" wire:submit.prevent="saveStripeCredentials">
            <div class="form-group">
                <label for="stripe_public_key">Public Key</label>
                <input type="text"
                       id="stripe_public_key"
                       name="stripe_public_key"
                       wire:model="stripe_public_key"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="stripe_secret_key">Secret Key</label>
                <input type="text"
                       id="stripe_secret_key"
                       name="stripe_secret_key"
                       wire:model="stripe_secret_key"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="stripe_currency">Secret Key</label>
                <input type="text"
                       id="stripe_currency"
                       name="stripe_currency"
                       wire:model="stripe_currency"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="isStripeEnabled">Status</label>
                <select class="form-control " id="isStripeEnabled"  wire:model="isStripeEnabled">
                <option value="1">Enabled</option>
                    <option value="0">Disabeled</option>
                </select>
            </div>
            <div class="float-right">
                <button type="submit"
                        class="btn btn-primary">
                    Save the new Stripe Credentials
                </button>

            </div>
        </form>
    </div>






    <hr>
    <div class="col-md-12 mt-5">
        <h1 class="text-center text-xl mb-2  text-primary">PayPal Settings</h1>
        @if(session()->has('paypal_keys_modified'))
            <div class="alert bg-green-500 text-center">
                {{ session('paypal_keys_modified') }}
            </div>
        @endif
        @if(session()->has('paypal_keys_not_modified'))
            <div class="alert bg-red-500 text-center">
                {{ session('paypal_keys_not_modified') }}
            </div>
        @endif
        <form class="mt-2" wire:submit.prevent="savePaypalCredentials">
            <div class="form-group">
                <label for="paypal_client_id">Client ID</label>
                <input type="text"
                       id="paypal_client_id"
                       name="paypal_client_id"
                       wire:model="paypal_client_id"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="paypal_client_secret">Client Secret</label>
                <input type="text"
                       id="paypal_client_secret"
                       name="paypal_client_secret"
                       wire:model="paypal_client_secret"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="paypal_currency">Currency</label>
                <input type="text"
                       id="paypal_currency"
                       name="paypal_currency"
                       wire:model="paypal_currency"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="isPayPalEnabled">Status</label>
                <select class="form-control" id="isPayPalEnabled" wire:model="isPayPalEnabled">
                    <option value="1">Enabled</option>
                    <option value="0">Disabeled</option>
                </select>
            </div>
            <div class="float-right">
                <button type="submit"
                        class="btn btn-primary">
                    Save the new PayPal Credentials
                </button>
            </div>
        </form>
    </div>
</div>
