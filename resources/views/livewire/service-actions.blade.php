<div class="d-flex align-items-center">
    <button data-toggle="modal" data-target="#updateModal"
            wire:click="editService({{ $service->id }})"
            class="btn btn-primary btn-xs mr-4">
        <i class="fa fa-pencil" aria-hidden="true"></i>
    </button>
    {{--
    <button data-toggle="modal" data-target="#deleteModal"
            wire:click="deleteService({{ $service->id }})"
            class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
     --}}
</div>
