<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Carbon\Carbon;

/**
 * Class UpdateCustomerModal
 * @package App\Http\Livewire
 */
class UpdateCustomerModal extends Component
{
    /**
     * @var
     */
    public $fullname;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $active;

    /**
     * @var
     */
    public $email_verified_at;

    /**
     * @var
     */
    public $customerId;

    /**
     * @var
     */
    public $balance;

    /**
     * @var array
     */
    protected $listeners = [
      'updateCustomerModalValues' => 'updateCustomerModalValues'
    ];

    /**
     * Get the concerned customer to modify
     *
     * @param User $customer
     */
    public function updateCustomerModalValues(User $customer)
    {
        $this->customerId = $customer->id;
        $this->fullname = $customer->name;
        $this->email = $customer->email;
        $this->active = $customer->active;
        $this->balance = $customer->balance;
        $this->email_verified_at = $customer->email_verified_at?1:0;
    }

    /**
     * Update an extra service
     */
    public function update()
    {
        // Validate the received data
        $validatedData = $this->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'active' => 'boolean',
            'balance' => 'required|numeric|min:0',
            'email_verified_at' => 'boolean'
        ]);

        // Fetch the concerned customer
        $customer = User::find($this->customerId);

        // Update the customer
        $customer->active = $validatedData['active'];
        $customer->name = $validatedData['fullname'];
        $customer->email = $validatedData['email'];
        $customer->balance = $validatedData['balance'];

        if ($validatedData['email_verified_at'] == true) {
            $currentTime = Carbon::now();
            $currentTime->toDateTimeString();
            $customer->email_verified_at = $currentTime;
        } else {
            $customer->email_verified_at = NULL;
        }

        $customer->save();

        // Setup a flash message to show that the customer is updated
        session()->flash('customer-updated', 'Customer updated successfully !');

        // Emit an event to update the table view data
        $this->emit('updateCustomersTable');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.customers.includes.update');
    }
}
