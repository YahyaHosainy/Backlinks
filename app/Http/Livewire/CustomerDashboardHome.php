<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class CustomerDashboard
 * @package App\Http\Livewire
 */
class CustomerDashboardHome extends Component
{
    /**
     * @var
     */
    public $lastOrders;

    /**
     * @var
     */
    public $lastPayments;

    /**
     * Load the last orders & payments
     */
    public function mount()
    {
        $this->lastOrders = auth()->user()->reports()->orderBy('created_at', 'desc')->limit(10)->get();
        $this->lastPayments = auth()->user()->payments()->orderBy('created_at', 'desc')->limit(10)->get();
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.dashboards.customer.customer-dashboard-home');
    }
}
