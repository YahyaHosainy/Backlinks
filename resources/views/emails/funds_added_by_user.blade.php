@component('mail::message')
# New funds added by a user.

A user came to add {{ $payment->amount }} $ to his account balance.

Payments information :
- Payment Id : {{ $payment->id }}
- User Email : {{ auth()->user()->email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
