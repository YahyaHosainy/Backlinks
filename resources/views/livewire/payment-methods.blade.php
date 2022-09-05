@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">Payments Methods</h4>
                </div>
                <!-- Payments Methods DataTable -->
                    @if(auth()->user()->is_admin)
                        @livewire('admin-payment-methods')
                    @else
                        @livewire('payment-methods-table')
                    @endif
                <!-- /Payments Methods DataTable -->
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
