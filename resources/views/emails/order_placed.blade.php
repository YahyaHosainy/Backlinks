@component('mail::message')
# Order placed successfully !

You came to place an order.

Order details :
- Order Service Description : {{ $order->service->description }}
- Order Amount : {{ $order->price }} $
- Order Date : {{ $order->created_at }}

@component('mail::button', ['url' => route('user-dashboard')])
My dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
