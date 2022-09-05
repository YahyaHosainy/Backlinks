<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \DateTime;
use \DateInterval;

class SociLoginController extends Controller
{
    public function redirect(Request $request)
    {
        return Socialite::driver('google')
        ->stateless()
        ->with([
            'access_type' => 'offline',
        ])
        ->setScopes([
            'https://www.googleapis.com/auth/webmasters.readonly',
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email'
        ])
        ->redirect();
    }

    public function callback(Request $request)
    {
        try {
            $gooleUser = Socialite::driver('google')->user();
        } catch (\Throwable $th) {
            $gooleUser = Socialite::driver('google')->stateless()->user();
        }
        // return (array) $gooleUser;
        $user = User::where('email',$gooleUser->email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $gooleUser->email;
            $user->is_admin = false;
            $user->active = true;
            $user->name = $gooleUser->name;
            $user->balance = env('BONUS_AFTER_EMAIL_VERIFICATION');
            $user->email_verified_at = date('Y-m-d h:i');
            $user->profile_photo_path = $gooleUser->avatar;
            $user->password = null;
        }
        $user->logged_in_with = 'google';

        $expire_date = new DateTime();
        $expire_date->add(new DateInterval("PT{$gooleUser->expiresIn}S"));

        $user->google_token_object = json_encode([
            "access_token" => $gooleUser->token,
            "client_id" => env('GOOGLE_CLIENT_ID'),
            "client_secret" => env('GOOGLE_CLIENT_SECRET'),
            "refresh_token" => $gooleUser->refreshToken,
            "token_expiry" => $gooleUser->expiresIn,
            "expire_date" => $expire_date->getTimestamp(), // in seconds
            "token_uri" => "https://oauth2.googleapis.com/token",
            "user_agent" => null,
            "revoke_uri" => "https://oauth2.googleapis.com/revoke",
            "id_token" => null,
            "id_token_jwt" => null,
            "token_response" => [
                "access_token" => $gooleUser->token,
                "expires_in" => $gooleUser->expiresIn,
                "refresh_token" => $gooleUser->refreshToken,
                "scope" => "https://www.googleapis.com/auth/webmasters.readonly",
                "token_type" => "Bearer"
            ],
            "scopes" => $gooleUser->approvedScopes,
            "token_info_uri" => "https://oauth2.googleapis.com/tokeninfo",
            "invalid" => false,
            "_class" => "OAuth2Credentials",
            "_module" => "oauth2client.client"
        ]);
        $user->save();
        Auth::login($user);
        return redirect(route('user-dashboard'));
    }
}
