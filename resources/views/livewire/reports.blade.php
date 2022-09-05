@extends('layouts.dashboard')
@section('modals')
    @livewire('order-links-modal')
    @livewire('order-keywords-modal')
@endsection

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">Reports</h4>
                </div>
                <!-- Reports DataTable -->
                    @livewire('reports-table')
                <!-- /Reports DataTable -->
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
