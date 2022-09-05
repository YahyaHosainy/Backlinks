<div class="">
    <div class="">
        <div>
            <div class=" text-center funds-home">

                <div class="font-weight-bold  pt-4 px-4 mt-5 text-uppercase" style="font-size: 24px; color: #f1f6f9;">
                    Available Funds</div>
                <div class="card-body text-left">

                    <div class="text-center text-white">
                        @if(auth()->user()->balance != 0)
                        <div class="mb-4">

                            <span class=" font-weight-bold" style="font-size: 40px; color: #ffffff;">
                                <i class="fas fa-dollar-sign "></i>
                                {{ number_format( auth()->user()->balance, 2, '.', ',') }}
                            </span>
                        </div>
                        @else
                        <div class="mb-4">
                            <span class=" font-weight-bold" style="font-size: 40px; color: #ffffff;">
                                <i class="fas fa-dollar-sign "></i>

                                {{ number_format( auth()->user()->balance, 2, '.', ',') }}
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="text-right ">
                        <button class="funds-button">
                            <a href="{{ route('add-funds') }}" >
                                
                                Add Funds
                                <i class="fas fa-arrow-alt-circle-right"></i>
                                </a>
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <button class="dashboard-button shadow">
            <a href="/user/dashboard" >
                <i class="fas fa-laptop"></i>

                
                My Dashboard
                </a>
        </button>
    </div>
</div>