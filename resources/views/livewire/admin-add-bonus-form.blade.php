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
    <form wire:submit.prevent="configureBonus">
        @csrf
        <div class="form-group">
            <label for="bonus" class="text-primary">Bonus Amount</label>
            <input type="number" wire:model="bonus" class="form-control" id="bonus"/>
            @error('bonus')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="text-center mt-2">
            <button class="btn btn-sm btn-primary" type="submit">Save Bonus</button>
        </div>
    </form>
</div>
