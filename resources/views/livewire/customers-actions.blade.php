<div class="d-flex align-items-center justify-content-center">
    <button data-toggle="modal" data-target="#updateCustomersModal"
            wire:click="editCustomer({{ $user->id }})"
            class="btn btn-primary btn-xs mr-4"><i class="fa fa-pencil" aria-hidden="true"></i></button>
    <button data-toggle="modal" data-target="#deleteCustomerModal"
            wire:click="deleteCustomer({{ $user->id }})"
            class="btn btn-danger btn-xs text-center"><i class="fa fa-trash" aria-hidden="true"></i></button>
</div>
