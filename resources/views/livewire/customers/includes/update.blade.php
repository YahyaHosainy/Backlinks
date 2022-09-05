<div wire:ignore.self
     class="modal fade"
     id="updateCustomersModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @if (session()->has('customer-updated'))
                <div class="alert alert-success text-center">
                    {{ session('customer-updated') }}
                </div>
            @endif
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model.live="code">
                        <label for="fullname">Full Name</label>
                        <input type="text"
                               class="form-control"
                               wire:model.live="fullname"
                               id="fullname"
                               placeholder="Enter Customer Full Name">
                        @error('fullname') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="hidden" wire:model="email">
                        <textarea type="email"
                                  class="form-control"
                                  wire:model="email"
                                  id="email"
                                  placeholder="Enter Customer email"></textarea>
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="balance">Balance</label>
                        <input type="hidden" wire:model="balance">
                        <textarea type="number"
                                  class="form-control"
                                  wire:model="balance"
                                  id="balance"
                                  placeholder="Enter Customer Balance"></textarea>
                        @error('balance') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                            <input type="hidden" wire:model="active">
                            <label for="active">Status</label>
                            <select wire:model="active"
                                    id="active"
                                    class="form-control">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            @error('active') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" wire:model="email_verified_at">
                            <label for="email_verified_at">Email verification</label>
                            <select wire:model="email_verified_at"
                                    id="email_verified_at"
                                    class="form-control">
                                <option value="1">Verified</option>
                                <option value="0">Unverified</option>
                            </select>
                            @error('email_verified_at') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>
<script >
    document.addEventListener('turbolinks:load', () => {
        window.livewire.rescan()
    });
    //window.livewire.rescan()
</script>
