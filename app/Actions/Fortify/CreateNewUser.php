<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Auth\Events\Registered;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $validated = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'finger_print' => ['required'],
        ])->validate();
        //check browser finger print
        $isBrowserRegisteredBefore = User::where('finger_print',$validated['finger_print'])->first();
        if($isBrowserRegisteredBefore)
        {
            // return session()->flash('warning', 'Sorry ! you can\'t have more than one account, if you think this is a mistake contact us !');
            // $error = "Sorry ! you can\'t have more than one account, if you think this is a mistake contact us !";
            return;

            
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'finger_print' => $input['finger_print'],
        ]);
    }
}
