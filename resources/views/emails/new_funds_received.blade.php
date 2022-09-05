@component('mail::message')
# Congratulations ! You have received some funds !

You received an amount of : ${{ $amount }}.

Your actual balance is : ${{ $balance }}

Thanks,<br>
{{ config('app.name') }}

@component('mail::button', ['url' => route('user-dashboard')])
My dashboard
@endcomponent

@endcomponent
