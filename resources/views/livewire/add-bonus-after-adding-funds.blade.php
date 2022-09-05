<div>
    @if(session()->has('bonus_settings_modified'))
        <div class="alert alert-success text-center mb-2">
            {{ session()->get('bonus_settings_modified') }}
        </div>
    @endif
    @if(session()->has('bonus_settings_not_modified'))
        <div class="alert alert-danger text-center mb-2">
            {{ session()->get('bonus_settings_not_modified') }}
        </div>
    @endif
    <form wire:submit.prevent="addBonus">
        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="bonus">Funds Bonus</label>
                <input type="number" class="form-control" wire:model="bonus" id="bonus"/>
                @error('bonus')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="funds">Funds Value</label>
                <input type="number" class="form-control" wire:model="funds" id="funds"/>
                @error('funds')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-sm btn-primary">Save funds bonus</button>
        </div>
    </form>
</div>

