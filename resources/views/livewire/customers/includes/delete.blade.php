<div wire:ignore.self class="modal fade"
     id="deleteCustomerModal"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            @if (session()->has('service-deleted'))
                <div class="alert alert-success text-center">
                    {{ session('service-updated') }}
                </div>
            @endif
            <div class="modal-body">
                <p>Do you really want to delete this Customer ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="delete()" data-dismiss="modal" class="btn btn-danger" >Delete</button>
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
