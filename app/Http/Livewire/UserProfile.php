<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class UserProfile
 * @package App\Http\Livewire
 */
class UserProfile extends Component
{
    /**
     * @var bool
     */
    public $activeDropDown = false;

    /**
     * Show the profile dropdown
     */
    public function toggleDropdown()
    {
        $this->activeDropDown = !$this->activeDropDown;
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.user-profile');
    }
}
