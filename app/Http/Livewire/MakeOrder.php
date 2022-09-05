<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\GTMConfig;

/**
 * Class MakeOrder
 * @package App\Http\Livewire
 */
class MakeOrder extends Component
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
          return view('livewire.make-order', [
              'gtmHead' => $gtmHead,
              'gtmBody' => $gtmBody
          ]);
    }
}
