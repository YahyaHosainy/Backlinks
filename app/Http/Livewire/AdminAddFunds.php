<?php

namespace App\Http\Livewire;

use App\Mail\NewFundsReceived;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

/**
 * Class AdminAddFunds
 * @package App\Http\Livewire
 */
class AdminAddFunds extends Component
{
    public $email;
    public $amount;

    /**
     * @var array
     */
    protected $rules = [
        'email' => 'required|email',
        'amount' => 'required|numeric'
    ];

    /*
     * Add funds to the user
     */
    public function addFunds()
    {
        // Validate received data
        $this->validate();

        // Find User
        $user = User::query()->where('email', '=', $this->email)->first();

        // Verify if the user exists or not
        if ($user != null) {
            $user->balance += $this->amount;
            $user->save();
            session()->flash('fundsAdded', 'Funds added successfully to the user !');

            // Send Email notification to the user
            Mail::to($user->email)->send(new NewFundsReceived($user->balance, $this->amount));
            // Reset the form
            $this->resetForm();
        } else {
            session()->flash('userNotFound', 'No user is registered with this email');
        }
    }

    /**
     * Reset Add Funds Form
     */
    public function resetForm()
    {
        $this->email = '';
        $this->amount = null;
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.admin-add-funds');
    }
}
