<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GTMConfig;

class EmailSettings extends Component
{
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
         return view('livewire.email-settings', [
             'gtmHead' => $gtmHead,
             'gtmBody' => $gtmBody
         ]);
    }
}
