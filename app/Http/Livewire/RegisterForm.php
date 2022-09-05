<?php

namespace App\Http\Livewire;

use App\Models\User;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Validator;
use Illuminate\Http\RedirectResponse;

/**
 * Class RegisterForm
 * @package App\Http\Livewire
 */
class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $finger_print;

    /**
     * Register a user
     */
    public function registerUser()
    {


        // Validate the user's data
        $validated = $this->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'finger_print' => 'required',
        ]);

        //finger_print
        if (env('IS_FINGERPRINT_ENABLED') == 1) {
            //validation
            if (!isset($validated['finger_print'])) {
                session()->flash('finger_print_required', '');

                return back();
            }
            //check browser finger print
            $isBrowserRegisteredBefore = User::where('finger_print', $validated['finger_print'])
                ->whereNotNull('email_verified_at',)
                ->first();
            if ($isBrowserRegisteredBefore) {
                return redirect()->route('already_have_account');
            }
        }
        // Create the new user
        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'finger_print' => isset($validated['finger_print']) ? $validated['finger_print'] : null,
        ]);

        $user->sendEmailVerificationNotification();

        // Show a success message
        session()->flash('verify-email', 'One last step ! Verify your email and let\'s get started');
        return redirect()->route('login');
    }

    /**
     * Make all register form fields empty
     */
    public function resetRegisterForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.register-form');
    }
}
