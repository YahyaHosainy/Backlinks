<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class DeleteCustomerModal
 * @package App\Http\Livewire
 */
class DeleteCustomerModal extends Component
{
    /**
     * @var null
     */
    public $customer = null;

    /**
     * @var array
     */
    protected $listeners = [
        'deleteCustomer' => 'deleteCustomer'
    ];

    /**
     * Delete a given Customer
     *
     * @param User $customer
     */
    public function deleteCustomer(User $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Delete the received customer during the event
     */
    public function delete()
    {
        $customer = User::find($this->customer->id);
        $customer->delete();
        $this->customer = null;

        // Emit an event to update the table view data
        $this->emit('updateCustomersTable');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.customers.includes.delete');
    }
}
