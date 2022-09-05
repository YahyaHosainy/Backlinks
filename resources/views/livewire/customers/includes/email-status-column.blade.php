@if($user->email_verified_at)
    <span class="badge bg-green-500 text-white">Verified</span>
@else
    <span class="badge bg-red-500 text-white">Unverified</span>
@endif

