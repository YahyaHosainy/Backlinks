<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="main-content col-lg-8">
                <div class="content-area card shadow-sm" style="border-radius: 6px;">
                    <div class="card-innr">
                        <div class="card-head">
                            <h4 class="card-title">Last Orders</h4>
                        </div>
                        @if($lastOrders->isEmpty())
                        <div class="text-center">
                            You didn't made any order yet !
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table  table-striped  table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Service</th>
                                        <th>Qty.</th>
                                        <th>Charge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lastOrders as $lastOrder)
                                    <tr>
                                        <td class="px-2">#{{ $lastOrder->id }}</td>
                                        <td>{{ $lastOrder->created_at }}</td>
                                        <td>@include('livewire.reports.includes.service-column', ['report' => $lastOrder])</td>
                                        <td>{{ $lastOrder->qte }}</td>
                                        <td>{{ $lastOrder->charge }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('reports') }}" class="text-white bg-primary shadow-sm px-5 py-2" style=" font-size: 18px; 
                            border-radius: 2px;
                            cursor: pointer;
                           "><i class="far fa-file-alt mr-3 pl-0"></i>View Full Reports</a>
                        </div>
                        @endif
                    </div>
                    <!-- .card-innr -->
                </div>
                <!-- .card -->
                <div class="content-area card  shadow-sm" style="border-radius: 6px;">
                    <div class="card-innr">
                        <div class="card-head">
                            <h4 class="card-title">Last Payments</h4>
                        </div>
                        @if($lastPayments->isEmpty())
                        <div class="text-center">
                            You didn't made any payment yet !
                        </div>
                        @else
                        <table class="table table-striped table-hover dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lastPayments as $lastPayment)
                                <tr>
                                    <td class="px-2">{{ $lastPayment->created_at }}</td>
                                    <td>{{ Str::ucfirst($lastPayment->payment_method) }}</td>
                                    <td>USD {{ $lastPayment->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <div class=" row col-12 mx-0 px-0  mt-4 ">
                                <a href="{{route('payment-history') }}" class="
                                col-lg-6 col-md-6 col-sm-12
                                mx-auto
                                                            text-white bg-primary shadow-sm px-5 py-2" style=" font-size: 18px; 
                                border-radius: 4px;
                                cursor: pointer;
                               "><i class="far fa-file-alt mr-3 pl-0"></i>View Full Payment Report</a>
                            </div>
                        </div>


                        @endif
                    </div>
                    <!-- .card-innr -->
                </div>
                <!-- .card -->
            </div>
            <!-- .col -->
            <div class="aside sidebar-right col-lg-4">
                <div class="account-info card text-white shadow-sm " style="background-color: #2ec1ac !important;border-radius :4px; ">
                    <div class="card-innr  py-3">
                        <div class="text-center pb-5 ">
                            <h6 class="card-title card-title-sm text-white " style="font-size:22px"> Available Funds</h6>

                        </div>
                        <div class="text-center">
                            <div class="mb-4 ">
                                You have
                                <a href="{{ route('add-funds') }}" class="p-2 mx-2  active hover:text-white" style="padding: 2px 5px;background-color: #248799;border-radius :4px;font-size: 1.2em;border-radius :4px;font-family: 'Lato', sans-serif;">
                                    USD 
                                    <span  class="font-weight-bold">
                                        {{ number_format( auth()->user()->balance, 2, '.', ',')}}
                                    </span> 
                                </a> in your balance.
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('add-funds') }}" class="hover:text-green-900 text-uppercase " style="font-size:18px;font-weight: 500 !important;">Add Funds &nbsp;
                                <i class="fas fa-arrow-alt-circle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- orders -->
                <div class="referral-info card text-white shadow-sm" style="background-color: #304674 !important;border-radius :6px;">
                    <div class="card-innr py-3">
                        <div class="text-center pb-4 ">
                            <h6 class="card-title card-title-sm text-white " style="font-size:22px">Total orders</h6>

                        </div>
                        <div class="text-center">
                            <div class=" text-uppercase mb-4">
                                You've made
                                <span class="py-2 px-3 mx-2 shadow-sm text-dark font-weight-bold active hover:text-dark" style="padding: 2px 5px;background-color: #ffffff;font-size: 1.6em;border-radius :4px;font-family: 'Lato', sans-serif;border-radius :4px;">{{ auth()->user()->reports()->count() }}</span>                                orders
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('make-order') }}" class="hover:text-white text-uppercase " style="font-size:18px;font-weight: 500 !important;">
                                Make order &nbsp;
                                <i class="fas fa-arrow-alt-circle-right"></i>
                            </a>

                        </div>

                    </div>
                </div>
                <!-- reports -->
                <div class="kyc-info card text-white shadow-sm" style="background-color: #202649;border-radius :6px;">

                    <div class="card-innr py-3">
                        <div class="text-center pb-4">
                            <h6 class="card-title card-title-sm text-white" style="font-size:22px">Ready reports</h6>

                        </div>
                        <div class="text-center">
                            <div class=" text-uppercase mb-4">
                                <span class="py-2  px-3 mx-2 shadow-sm text-dark font-weight-bold active hover:text-dark" style="padding: 2px 5px;background-color: #ffffff;font-size: 1.6em;border-radius :4px;font-family: 'Lato', sans-serif;">{{auth()->user()->readyReports()}}</span>                                reports are available
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('reports') }}" class="hover:text-white text-uppercase " style="font-size:18px;font-weight: 500 !important;">
                                View all reports &nbsp;
                                <i class="fas fa-arrow-alt-circle-right"></i>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
            <!-- .col -->
        </div>
        <!-- .container -->
    </div>
    <!-- .container -->
</div>
<!-- .page-content -->