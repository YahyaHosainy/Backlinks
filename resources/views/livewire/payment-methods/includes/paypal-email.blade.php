@if($payment->paypal_email === null)
    No Paypal Email used
@else
    {{ $payment->paypal_email }}
@endif
