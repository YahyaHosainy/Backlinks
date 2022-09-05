@component('mail::message')
# Congrats ! Your order is now complete

The order #{{ $report->order->id }} you placed at {{ $report->order->created_at }} is now complete

Order details :
- Order Service Description : {{ $report->order->service->description }}
- Order Price : {{ $report->charge }} $

Go to your dashboard to see more details :
@component('mail::button', ['url' => route('user-dashboard')])
My dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
