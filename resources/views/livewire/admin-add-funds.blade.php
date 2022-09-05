<div>
    @if(session()->has('fundsAdded'))
        <div class="alert alert-success text-center mb-2">
            {{ session()->get('fundsAdded') }}
        </div>
    @endif
    @if(session()->has('userNotFound'))
        <div class="alert alert-danger text-center mb-2">
            {{ session()->get('userNotFound') }}
        </div>
    @endif
    <form wire:submit.prevent="addFunds">
        @csrf
        <div class="form-group">
            <label for="email" class="text-primary">User's Email</label>
            <input type="email" wire:model="email" class="form-control" id="email"/>
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="amount" class="text-primary">Amount</label>
            <input type="number" wire:model="amount" class="form-control" id="amount"/>
            @error('amount')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="text-center mt-2">
            <button class="btn btn-sm btn-primary" type="submit">Add Funds</button>
        </div>
    </form>
</div>
