<div class="d-flex align-items-center">
    <button data-toggle="modal" data-target="#extraUpdateModal"
            wire:click="editExtraService({{ $extra->id }})"
            class="btn btn-primary btn-sm mr-4">
        <i class="fa fa-pencil" aria-hidden="true"></i>
    </button>
    {{--
    <button data-toggle="modal" data-target="#extraDeleteModal"
        wire:click="deleteExtraService({{ $extra->id }})"
        class="btn btn-danger btn-sm">Delete</button> -->
     --}}
</div>
