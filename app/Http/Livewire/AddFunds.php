<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\GTMConfig;

/**
 * Class AddFunds
 * @package App\Http\Livewire
 */
class AddFunds extends Component
{
    /**
     * @return Factory|View
     */
    public function render()
    {
        // Get GTM Settings
        $gtm = GTMConfig::first();
        $gtmHead = "";
        $gtmBody = "";
        $isStripeEnabled = env('IS_STRIPE_ENABLED');
        $isPayPalEnabled = env('IS_PAYPAL_ENABLED');
        if ($gtm !=null) {
            $gtmHead = $gtm->headPart;
            $gtmBody = $gtm->bodyPart;
        }
        return view('livewire.add-funds', [
            'gtmHead' => $gtmHead,
            'gtmBody' => $gtmBody,
            'isStripeEnabled'=>$isStripeEnabled,
            'isPayPalEnabled'=>$isPayPalEnabled
            
        ]);
    }
}
