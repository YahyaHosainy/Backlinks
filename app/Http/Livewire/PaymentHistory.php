<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\GTMConfig;

/**
 * Class PaymentHistory
 * @package App\Http\Livewire
 */
class PaymentHistory extends Component
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
  
          if ($gtm !=null) {
              $gtmHead = $gtm->headPart;
              $gtmBody = $gtm->bodyPart;
          }
         return view('livewire.payment-history', [
             'gtmHead' => $gtmHead,
             'gtmBody' => $gtmBody
         ]);
    }
}
