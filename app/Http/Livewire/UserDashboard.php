<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\GTMConfig;

/**
 * Class UserDashboard
 * @package App\Http\Livewire
 */
class UserDashboard extends Component
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
        return view('livewire.user-dashboard', [
            'gtmHead' => $gtmHead,
            'gtmBody' => $gtmBody
        ]);
    }
}
