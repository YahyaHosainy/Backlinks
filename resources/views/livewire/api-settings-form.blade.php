<div>
    <div class="mb-4">
        <button class="btn btn-xs bg-green-600" wire:click.prevent="backToApiPrices">Back to API prices</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('api_settings_saved'))
                <div class="alert bg-green-600 mb-4 mt-4">
                    {{ session('api_settings_saved') }}
                </div>
            @endif

            @if(session()->has('prices_updated'))
                <div class="alert bg-green-600 mb-4 mt-2">
                    {{ session('prices_updated') }}
                </div>
            @endif
            <form>
                <div class="form-group">
                    <label for="token">API Token</label>
                    <input type="text"
                           id="token"
                           wire:model="token"
                           class="form-control" />
                    @error('token')<span class="text-red-600"> {{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="service_price_percent">Services Price Percent (%)</label>
                    <input type="number"
                           id="service_price_percent"
                           wire:model="service_price_percent"
                           class="form-control" />
                    @error('service_price_percent')<span class="text-red-600"> {{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="extras_price_percent">Extras Price Percent (%)</label>
                    <input type="number"
                           id="extras_price_percent"
                           wire:model="extras_price_percent"
                           class="form-control" />
                    @error('extras_price_percent')<span class="text-red-600"> {{ $message }}</span> @enderror
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center text-xl text-blue-800">Services that will use the services price percent</h3>
            @if($services->isNotEmpty())
                <div class="text-center mt-2">
                    <button class="btn btn-xs bg-yellow-400 hover:bg-yellow-500" wire:click.prevent="unselectAllServices">Unselect all</button>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        @foreach($services as $service)
                            <label class="col-md-3 checkbox-inline" for="service-{{ $service->id }}">
                                <input type="checkbox" wire:model="servicesWithPercentage" id="service-{{ $service->id }}" value="{{$service->code}}">
                                {{ $service->code }}
                            </label>
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="text-center">
                        <h3 class="text-lg mt-4">Active the services on the backend</h3>
                    </div>
                @endif
        </div>
        <div class="col-md-6">
            <h3 class="text-center text-xl text-blue-800">Extras that will use the extras price percent</h3>
            @if($extras->isNotEmpty())
                <div class="text-center mt-2">
                    <button class="btn btn-xs bg-yellow-400 hover:bg-yellow-500" wire:click.prevent="unselectAllExtras">Unselect all</button>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        @foreach($extras as $extra)
                            <label class="col-md-3 checkbox-inline" for="extra-{{ $extra->id }}">
                                <input type="checkbox" wire:model="extrasWithPercentage" id="extra-{{ $extra->id }}" value="{{$extra->code}}">
                                {{ $extra->code }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center">
                    <h3 class="text-lg mt-4">Active the extras on the backend</h3>
                </div>
            @endif
        </div>
    </div>
    <div class="text-center mt-4">
        <button class="btn btn-xs btn-primary" wire:click.prevent="saveChanges">Save changes</button>
    </div>
</div>
