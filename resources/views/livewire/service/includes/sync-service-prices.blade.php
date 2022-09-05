<div class="d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-center">
        <button class="btn btn-xs btn-primary float-right"
                wire:click.prvent="syncServicePrices">
            Sync Prices
        </button>
        <button data-toggle="modal" data-target="#addCustomService"
                class="btn bg-green-600 btn-xs ml-4 mr-4">
            Add a custom service
        </button>
        <button class="btn btn-xs ml-4 mr-4 btn-info float-right"
                wire:click.prvent="syncApiServices">
            Sync with API new services
        </button>
    </div>
    <div>
        @if(session()->has('api_update'))
            <div class="text-center ml-4">
                <span class="text-primary">
                    {{ session('api_update') }}
                </span>
            </div>
        @endif
    </div>

    @if (session()->has('service_prices_synchronized'))
        <div class="text-center ml-4">
            <span class="text-primary">
                {{ session('service_prices_synchronized') }}
            </span>
        </div>
    @endif
</div>
