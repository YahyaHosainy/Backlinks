<div>
    <div wire:ignore.self
         class="modal fade"
         id="addCustomService"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Custom Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @if (session()->has('extra-service-updated'))
                    <div class="alert alert-success text-center">
                        {{ session('extra-service-updated') }}
                    </div>
                @endif
                @if(session()->has('successAdd'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('successAdd') }}
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
                                   id="extra-code"
                                   placeholder="Enter Service Code">
                            @error('code') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="extra-description">Service Name</label>
                            <input type="hidden" wire:model="description">
                            <textarea type="text"
                                      class="form-control"
                                      wire:model="description"
                                      id="extra-description"
                                      placeholder="Enter Service Name"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="short_description">Service Short Description</label>
                            <input type="hidden" wire:model="short_description">
                            <textarea type="text"
                                      class="form-control"
                                      wire:model="short_description"
                                      id="short_description"
                                      placeholder="Enter the Service Short Description"></textarea>
                            @error('short_description') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" wire:model="price_per_item">
                            <label for="extra-price_per_item">Price Per Item ($)</label>
                            <input type="number"
                                   class="form-control"
                                   wire:model="price_per_item"
                                   id="extra-price_per_item"
                                   placeholder="Enter Price Per Item ($)">
                            @error('price_per_item') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" wire:model="min_qte">
                            <label for="min_qte">Min. Qte</label>
                            <input type="number"
                                   class="form-control"
                                   wire:model="min_qte"
                                   id="min_qte"
                                   placeholder="Enter min quantity of this service">
                            @error('min_qte') <span class="text-danger">{{ $message }}</span>@enderror
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
                    <button id="serviceAdd" type="button" wire:click.prevent="addNewService()" class="btn btn-primary" >Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // After saving close the modal
        /*$('#serviceAdd').on('click', function () {
            $('#addCustomService').modal('hide');
            location.reload();
        });*/

        document.addEventListener('turbolinks:load', () => {
            window.livewire.rescan()
        });
        //window.livewire.rescan()
    </script>

</div>
