<div wire:ignore.self
     class="modal fade"
     id="orderLinks"
     tabindex="-1"
     role="dialog"
     aria-labelledby="orderLinks"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderLinks">Order's Links</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                @if($links != null)
                    @foreach($links as $link)
                        {{ $link }}<br>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
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
