<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class ServiceActions
 * @package App\Http\Livewire
 */
class ServiceActions extends Component
{
    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.service-actions');
    }
}
