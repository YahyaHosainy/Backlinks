<div wire:ignore.self
     class="modal fade"
     id="extraUpdateModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Extra Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @if (session()->has('extra-service-updated'))
                <div class="alert alert-success text-center">
                    {{ session('extra-service-updated') }}
                </div>
            @endif
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model.live="code">
                        <label for="extra-code">Code</label>
                        <input type="text"
                               class="form-control"
                               wire:model.live="code"
                               disabled
                               id="extra-code"
                               placeholder="Enter Extra Service Code">
                        @error('code') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="extra-description">Description</label>
                        <input type="hidden" wire:model="description">
                        <textarea type="text"
                                  class="form-control"
                                  wire:model="description"
                                  id="extra-description"
                                  placeholder="Enter Extra Service Description"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="price_per_item">
                        <label for="extra-price_per_item">Price Per Item ($)</label>
                        <input type="number"
                               class="form-control"
                               disabled
                               wire:model="price_per_item"
                               id="extra-price_per_item"
                               placeholder="Enter Price Per Item ($)">
                        @error('price_per_item') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="active">
                        <label for="extra-active">Status</label>
                        <select wire:model="active"
                                id="extra-active"
                                class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Disabled</option>
                        </select>
                        @error('active') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="extraSaveButton" type="button" wire:click.prevent="update()" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>
<script >
    // After saving close the modal
    $('#extraSaveButton').on('click', function () {
        $('#extraUpdateModal').modal('hide');
        location.reload();
    });

    document.addEventListener('turbolinks:load', () => {
        window.livewire.rescan()
    });
    //window.livewire.rescan()
</script>
