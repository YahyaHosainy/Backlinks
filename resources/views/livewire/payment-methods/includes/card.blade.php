@if($payment->last4 === null)
    No card used
@else
    {{ $payment->card_type }} **** **** **** {{ $payment->last4 }}
@endif
