<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|max:255|min:6',
            'finger_print' => 'string',
            'terms-checkbox' => ''

        ]);

        //terms-checkbox
        if (!isset($validated['terms-checkbox'])) {

            session()->flash('warning', 'You need to accept our terms and conditions before you proceed');
            session()->put('name', $validated['name']);
            session()->put('email', $validated['email']);
            return redirect()->back();
        }

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

        //check if email already taken
        $isEmailTaken = User::where('email', $validated['email'])
            ->first();
        if ($isEmailTaken) {
            session()->flash('email-taken', '');
            return back();
        }
        //create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'finger_print' => isset($validated['finger_print'])?$validated['finger_print']:null,
        ]);
        //send verification email
        $user->sendEmailVerificationNotification();
        //tell user to verify its email
        session()->flash('verify-email', 'One last step ! Verify your email and let\'s get started');
        //redirect him to the login page
        return redirect()->route('login');
    }
}
