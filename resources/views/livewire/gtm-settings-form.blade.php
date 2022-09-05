<div>
    @if(session()->has('success'))
        <div class="alert alert-success text-center mb-4 mt-2">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h2 class="text-blue-900 text-center text-lg mb-4">Head Code</h2>
            <div class="form-group">
                <label for="head-part"><span class="text-blue-700">Paste provided GTM head code</span></label>
                <textarea id="head-part"
                          rows="6"
                          class="form-control"
                          wire:model="headCode"></textarea>
                @error('headCode')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-blue-900 text-center mb-4 text-lg">Body Code</h2>
            <div class="form-group">
                <label for="body-part"><span class="text-blue-700">Paste provided GTM body code</span></label>
                <textarea id="body-part"
                          rows="6"
                          class="form-control"
                          wire:model="bodyCode"></textarea>
                @error('bodyCode')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-xs btn-primary" wire:click.prevent="saveChanges">Save GTM Settings</button>
    </div>
</div>
