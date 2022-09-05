<div class="container">
 
    @if($profitPercentageAlert)
        <div class="alert alert-danger text-center">
            Net Profit cannot be calculated if you didn't defined the profit percent in API Settings page.
        </div>
    @endif
    <div class="d-flex flex-row-reverse mb-4">
        <div class="select-wrapper bg-white w-25 card-token">
            <select class="input-bordered card-token" wire:model="period" wire:change="mount()">
                <option value="7" class="text-white bg-blue-900 card-token">Last 7 Days</option>
                <option value="30" class="text-white bg-blue-900 card-token">Last 30 Days</option>
                <option value="90" class="text-white bg-blue-900 card-token">Last 90 Days</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="token-statistics card card-token height-auto">
                <div class="card-innr">
                    <div class="token-balance token-balance-with-icon">
                        <div class="token-balance-icon">
                            <span class="fas fa-user"></span>
                        </div>
                        <div class="token-balance-text">
                            <h6 class="card-sub-title">{{ __('Total Clients') }}</h6>
                            <span class="lead">{{ $totalClients }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="token-statistics card card-token height-auto">
                <div class="card-innr">
                    <div class="token-balance token-balance-with-icon">
                        <div class="token-balance-icon">
                            <span class="fa fa-first-order"></span>
                        </div>
                        <div class="token-balance-text">
                            <h6 class="card-sub-title">{{ __('Total Orders') }}</h6>
                            <span class="lead">{{ $totalOrders }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="token-statistics card card-token height-auto">
                <div class="card-innr">
                    <div class="token-balance token-balance-with-icon">
                        <div class="token-balance-icon">
                            <span class="fas fa-money"></span>
                        </div>
                        <div class="token-balance-text">
                            <h6 class="card-sub-title">{{ __('Total Orders Amount') }}</h6>
                            <span class="lead">{{ intval(($totalOrderAmount*100))/100 }} $</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="token-statistics card card-token height-auto">
                <div class="card-innr">
                    <div class="token-balance token-balance-with-icon">
                        <div class="token-balance-icon">
                            <span class="fas fa-bank"></span>
                        </div>
                        <div class="token-balance-text">
                            <h6 class="card-sub-title">{{ __('Total Funds Added') }}</h6>
                            <span class="lead">{{ intval(($totalFunds*100))/100 }} $</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    
        <!-- <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="token-statistics card card-token height-auto">
                <div class="card-innr">
                    <div class="token-balance token-balance-with-icon">
                        <div class="token-balance-icon">
                            <span class="fa fa-credit-card-alt"></span>
                        </div>
                        <div class="token-balance-text">
                            <h6 class="card-sub-title">{{ __('Total Costs') }}</h6>
                            <span class="lead">{{ intval(($totalCosts*100))/100 }} $</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="token-statistics card card-token height-auto">
                <div class="card-innr">
                    <div class="token-balance token-balance-with-icon">
                        <div class="token-balance-icon">
                            <span class="fas fa-dollar"></span>
                        </div>
                        <div class="token-balance-text">
                            <h6 class="card-sub-title">{{ __('Net Profits') }}</h6>
                            <span class="lead">{{ intval(($totalProfit*100))/100 }} $</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    <!-- Chart's container -->
    <div id="first-chart" wire:ignore style="height: 300px;"></div>
    <!-- <div id="second-chart" wire:ignore style="height: 300px;"></div> -->

    <div class="main-content">
    <div class="content-area card-token">
        <div class="card-innr">
            <div class="card-head">
                <h4 class="card-title text-white">Last Orders</h4>
            </div>
            @if($lastPayments->isEmpty())
                <div class="text-center text-white">
                    There is no Payments at the moment !
                </div>
            @else
                <table class="table table-striped table-hover no-footer">
                    <thead>
                    <tr>
                        <th class="text-white">ID</th>
                        <th class="text-white">Date</th>
                        <th class="text-white">Amount</th>
                        <th class="text-white">Payment Method</th>
                        <th class="text-white">Customer name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lastPayments as $payment)
                        <tr class="text-white">
                            <td class="px-2">#{{ $payment->id }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>${{ $payment->amount }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="{{ route('payment-history') }}" class="btn btn-xs card-token hover:text-white hover:bg-blue-900">View All payments</a>
                </div>
            @endif
        </div><!-- .card-innr -->
    </div><!-- .card -->
</div>
</div>
