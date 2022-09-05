<div>
    @if(session()->has('mailchimp_settings_modified'))
        <div class="bg-green-600 text-white p-2 text-center">
            {{ session()->get('mailchimp_settings_modified') }}
        </div>
    @endif
    @if(session()->has('mailchimp_settings_not_modified'))
        <div claas="bg-red-600 text-white p-2 text-center">
            {{ session()->get('mailchimp_settings_not_modified') }}
        </div>
    @endif
    @if(session()->has('contacts_synchronized'))
        <div class="bg-green-600 text-white p-2 text-center mb-2">
            {{ session()->get('contacts_synchronized') }}
        </div>
    @endif
    <div class="mb-4">
        <button class="btn btn-xs bg-green-600"
                wire:click.prevent="syncCustomers">
            Sync customers with MailChimp
        </button>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <form wire:submit.prevent="saveApiSettings">
                <div class="form-group">
                    <label for="apiKey" class="text-primary"><b>Api Key</b></label>
                    <input class="form-control"
                           id="apiKey"
                           wire:model="apiKey" />
                    @error('apiKey') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="serverPrefix" class="text-primary"><b>Server Prefix</b></label>
                    <input class="form-control"
                           id="serverPrefix"
                           wire:model="serverPrefix" />
                    @error('serverPrefix') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary">Save API settings</button>
                </div>
            </form>
        </div>
    </div>
</div>
