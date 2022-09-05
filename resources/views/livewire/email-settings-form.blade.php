<div>
    @if(session()->has('email_settings_saved'))
        <div class="alert alert-success text-center mb-4 mt-2">
            {{ session()->get('email_settings_saved') }}
        </div>
    @endif

    @if(session()->has('email_settings_not_modified'))
        <div class="alert alert-danger text-center mb-4 mt-2">
            {{ session()->get('email_settings_not_modified') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="serverMailer">Server Mailer</label>
                <input type="text" id="serverMailer" wire:model="mail_mailer" class="form-control" />
            </div>
            @error('mail_mailer') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="serverHost">Server Host</label>
                <input type="text" id="serverHost" wire:model="mail_host" class="form-control" />
            </div>
            @error('mail_host') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="serverPort">Server Port</label>
                <input type="number" id="serverPort" wire:model="mail_port" class="form-control" />
            </div>
            @error('mail_port') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="serverUsername">Server username</label>
                <input type="text" id="serverUsername" wire:model="mail_username" class="form-control" />
            </div>
            @error('mail_username') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="serverPassword">Server Password</label>
                <input type="text" id="serverPassword" wire:model="mail_password" class="form-control" />
            </div>
            @error('mail_password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="serverEncryption">Server Encryption</label>
                <input type="text" id="serverEncryption" wire:model="mail_encryption" class="form-control" />
            </div>
            @error('mail_encryption') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="postrmark">Postmark Token</label>
                <input type="text" id="postrmark" wire:model="mail_token" class="form-control" />
            </div>
            @error('mail_token') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="mail_from_address">Mail From Address</label>
                <input type="text" id="mail_from_address" wire:model="mail_from_address" class="form-control" />
            </div>
            @error('mail_from_address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="admin_mail">Admin Email</label>
                <input type="text" id="admin_mail" wire:model="admin_mail" class="form-control" />
            </div>
            @error('admin_mail') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-xs btn-primary" wire:click.prevent="saveChanges">Save Email Settings</button>
    </div>
</div>
