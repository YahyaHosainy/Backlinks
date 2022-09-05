<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="row mt-4">
        <div class="col-md-6">
            <h4 style="color: #2d4974"> Invoice to :</h4>
            <h6><b>Name : </b>{{ $payment->user->name }}</h6>
            <h6><b>Email : </b>{{$payment->user->email }}</h6>
        </div>
        <div class="col-md-6 text-right">
            <img src="{{env('APP_URL')}}/assets/img/logo.png" style="height: 55px;"/>
        </div>
    </div>
    <h4 class="text-center" style="color: #2d4974;">Payment Infos</h4>
    <hr style="border: 2px solid #2d4974; border-bottom: 0px;">

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th class="text-center" style="background-color: #2d4974; color: white;">Amount ($)</th>
                <th class="text-center" style="background-color: #2d4974; color: white;">Payment Method</th>
                <th class="text-center" style="background-color: #2d4974; color: white;">Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $payment->amount }}</td>
                <td class="text-center">{{ $payment->payment_method }}</td>
                <td class="text-center">{{ $payment->created_at }}</td>
            </tr>
        </tbody>
    </table>
    @if($payment->payment_method == 'stripe')
        <h5 class="mt-5">Your payment card details : </h5>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center" style="background-color: #2d4974; color: white;">Card Type</th>
                <th class="text-center" style="background-color: #2d4974; color: white;">Last 4 Digits</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">{{ $payment->card_type }}</td>
                <td class="text-center">{{ $payment->last4 }}</td>
            </tr>
            </tbody>
        </table>
    @endif
    <h5 class="text-center mt-5">You have now funds ! You can start making orders !</h5>
</body>
</html>
