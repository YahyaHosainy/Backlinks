@extends('layouts.dashboard') @section('content') @livewire('delete-customer-modal') @livewire('update-customer-modal')
<div class="page-content">
    <div class="container">
        <div class="bg-white p-4 mb-4">
            <div class="card-head">
                <h4 class="card-title">Customers</h4>
            </div>
            @if(auth()->user()->is_admin)
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header ">
                        Export customers
                    </div>
                    <div class="card-body text-center bg-grey">
                        @livewire('export-customer-to-excel-form')
                    </div>

                </div>
            </div>
            <!-- Export customers to Excel -->
            <!-- /Export customers to Excel -->
            @endif

            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header ">
                        clean customers
                    </div>
                    <div class="card-body text-center bg-grey">
                        @livewire('clean-customers-list')

                    </div>

                </div>
            </div>
            {{-- finger print controle --}}
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header ">
                        Browser's Finger print
                    </div>
                    <div class="card-body text-center bg-grey">
                        <div class="alert alert-info">
                            Enabling this feature will stop users from having multiple account, by keeping track of their browsers' fingerprint 
                        </div>
                        @livewire('finger-print-control')
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header ">
                        Funds
                    </div>
                    <div class="card-body text-center bg-grey">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h3 class="text-center mb-2 text-primary">Add Funds Manually to someone</h3>
                                <!-- Add Funds Manually Form -->
                                @livewire('admin-add-funds')
                                <!-- /Add Funds Manually Form -->
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-center mb-2 text-primary">Add bonus to each new user</h3>
                                <!-- Add Bonus After Each New User Registration -->
                                @livewire('admin-add-bonus-form')
                                <!-- /Add Bonus After Each New User Registration -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <hr class="border-1 mb-4" />
            <!-- Customers DataTable -->
            @livewire('customers-table')
            <!-- /Customers DataTable -->
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('turbolinks:load', () => {
        window.livewire.rescan()
    });
    //window.livewire.rescan()
</script>