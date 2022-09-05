<div class="d-flex align-items-center">
    <button class="btn btn-xs btn-primary float-right"
            wire:click.prvent="syncExtraPrices">
        Sync Extras Prices
    </button>
    @if (session()->has('extras_prices_synchronized'))
        <div class="text-center ml-4">
            <span class="text-primary">
                {{ session('extras_prices_synchronized') }}
            </span>
        </div>
    @endif
</div>
