<div wire:ignore.self
     class="modal fade"
     id="updateModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @if (session()->has('service-updated'))
                <div class="alert alert-success text-center">
                    {{ session('service-updated') }}
                </div>
            @endif
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model.live="code">
                        <label for="code">Code</label>
                        <input type="text"
                               class="form-control"
                               wire:model.live="code"
                               id="code"
                               @if(!$isPersonal)
                                disabled
                               @endif
                               placeholder="Enter Service Code">
                        @error('code') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Service Name</label>
                        <input type="hidden" wire:model="description">
                        <input type="text"
                               class="form-control"
                               wire:model="description"
                               id="description"
                               placeholder="Enter Service Name">
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="short_description">Service Description</label>
                        <textarea
                               class="form-control"
                               wire:model="short_description"
                               id="short_description"
                               placeholder="Enter Service Description" ></textarea>
                        @error('short_description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="min_qte">
                        <label for="min_qte">Min. Qty</label>
                        <input type="number"
                               class="form-control"
                               wire:model="min_qte"
                               id="min_qte"
                               @if(!$isPersonal)
                                disabled
                               @endif
                               placeholder="Enter Min Quantity">
                        @error('min_qte') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="active">
                        <label for="active">Status</label>
                        <select wire:model="active"
                                id="active"
                                class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Disabled</option>
                        </select>
                        @error('active') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="price_per_item">
                        <label for="pricePerItem">Price Per Item</label>
                        <input type="number"
                               class="form-control"
                               wire:model="price_per_item"
                               id="pricePerItem"
                               placeholder="Enter Price Per Item">
                        @error('price_per_item') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="saveButton" type="button" wire:click.prevent="update()" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>
<script >
    // After saving close the modal
    $('#saveButton').on('click', function () {
        $('#updateModal').hide();
        location.reload();
    });

    //window.livewire.rescan()
</script>
