<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DotEnvModification\DotEnvModification;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class AdminPaymentMethods
 * @package App\Http\Livewire
 */
class AdminPaymentMethods extends Component
{
    public $stripe_public_key;
    public $stripe_secret_key;
    public $stripe_currency;
    public $isStripeEnabled;

    public $paypal_client_id;
    public $paypal_client_secret;
    public $paypal_currency;
    public $isPayPalEnabled;

    private $dotEnvModifcation;

    /**
     * AdminPaymentMethods constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->dotEnvModifcation = new DotEnvModification();
        // Stripe Api Keys
        $this->stripe_currency = env('STRIPE_CURRENCY');
        $this->stripe_public_key = env('STRIPE_PUBLISHABLE_KEY');
        $this->stripe_secret_key = env('STRIPE_SECRET_KEY');
        $this->isStripeEnabled = env('IS_STRIPE_ENABLED');



        // PayPal Api keys
        $this->paypal_client_id = env('PAYPAL_CLIENT_ID');
        $this->paypal_client_secret = env('PAYPAL_CLIENT_SECRET');
        $this->paypal_currency = env('PAYPAL_CURRENCY');
        $this->isPayPalEnabled = env('IS_PAYPAL_ENABLED');
    }

    /**
     * Save Stripe API credentials
     */
    public function saveStripeCredentials()
    {
        // Validate the user's values
        $this->validate([
            'stripe_public_key' => 'required',
            'stripe_secret_key' => 'required',
            'stripe_currency' => 'required',
            'isStripeEnabled' => 'required'
        ]);
        // SetUp the new PayPal .env values
        $env_update = $this->dotEnvModifcation->changeEnv([
            'STRIPE_CURRENCY' => $this->stripe_currency,
            'STRIPE_PUBLISHABLE_KEY' => $this->stripe_public_key,
            'STRIPE_SECRET_KEY' => $this->stripe_secret_key,
            'IS_STRIPE_ENABLED' => $this->isStripeEnabled
        ]);

        // Test if the modification are well done or not
        if($env_update){
            session()->flash('stripe_keys_modified', 'The Stripe settings changed successfully !');
        } else {
            session()->flash('stripe_keys_not_modified', 'The Stripe settings not changed. Contact the website administrator !');
        }
    }

    /**
     * Save PayPal API Credentials
     */
    public function savePaypalCredentials()
    {
        // Validate the user's values
        $this->validate([
            'paypal_client_id' => 'required',
            'paypal_client_secret' => 'required',
            'paypal_currency' => 'required',
            'isPayPalEnabled' => 'required'
        ]);

        // SetUp the new PayPal .env values
        $env_update = $this->dotEnvModifcation->changeEnv([
            'PAYPAL_CURRENCY'   => $this->paypal_currency,
            'PAYPAL_CLIENT_SECRET'   => $this->paypal_client_secret,
            'PAYPAL_CLIENT_ID'       => $this->paypal_client_id,
            'IS_PAYPAL_ENABLED'       => $this->isPayPalEnabled
        ]);

        // Test if the modification are well done or not
        if($env_update){
            session()->flash('paypal_keys_modified', 'The PayPal settings changed successfully !');
        } else {
            session()->flash('paypal_keys_not_modified', 'The PayPal settings not changed. Contact the website administrator !');
        }
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.admin-payment-methods');
    }
}
