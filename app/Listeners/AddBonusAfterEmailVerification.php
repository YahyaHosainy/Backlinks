<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;

class AddBonusAfterEmailVerification
{
    /**
     * @var
     */
    private $bonus;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->bonus = env('BONUS_AFTER_EMAIL_VERIFICATION');
    }

    /**
     * Handle the event.
     *
     * @param  Verified  $event
     * @return void
     */
    public function handle(Verified $event)
    {
        $user = Auth::user();
        $user->balance  = $this->bonus;
        $user->save();
    }
}
