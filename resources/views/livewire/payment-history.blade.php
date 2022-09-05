@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">Payments History</h4>
                </div>
                <!-- Export payment to Excel -->
                    @if(auth()->user()->is_admin)
                        @livewire('export-payment-to-excel-form')
                    @endif
                <!-- /Export payment to Excel -->

                <!-- Payments DataTable -->
                    @livewire('payment-history-table')
                <!-- /Payments DataTable -->
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
