@component('mail::message')
# Congrats ! You added new balance.

You came to add {{ $payment->amount }} $ to your actual balance, in your Backlinks Services account.

Here is your invoice link :
@component('mail::button', ['url' => route('download-invoice', ['id' => $payment->id])])
Download invoice
@endcomponent

@component('mail::button', ['url' => route('user-dashboard')])
My dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
