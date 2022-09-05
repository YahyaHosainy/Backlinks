<div>
    @if(session()->has('customers_deleted'))
    <div class="alert alert-success text-center mb-2 text-uppercase">
        {{ session()->get('customers_deleted') }} unactive customer deleted successfully
    </div>
    @endif @if(session()->has('customers_restored'))
    <div class="alert alert-success text-center mb-2 text-uppercase">
        {{ session()->get('customers_restored') }} customer restored
    </div>
    @endif

    <form wire:submit.prevent="cleanCustomersList">
        <button class="btn btn-danger  px-5 mx-4 mt-5 text-uppercase" type="submit">Clean customers list</button>
    </form>

    <form wire:submit.prevent="restoreCustomersDeleted">
        <button class="btn btn-primary  px-4 mx-4 mb-5 text-uppercase" type="submit">restore deleted customers</button>
    </form>
</div>