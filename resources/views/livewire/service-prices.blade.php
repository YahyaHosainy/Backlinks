@extends('layouts.dashboard')

@section('modals')
    @livewire('update-service-modal')
    @livewire('update-extra-modal')
    @livewire('delete-service-modal')
    @livewire('add-custom-service-modal')
@endsection

@section('content')
    @if(session()->has('already-fetched'))
        <div class="alert alert-warning">
            {{ session()->get('already-fetched') }}
        </div>
    @endif
    @if(session()->has('api_update'))
        <div class="alert alert-danger">
            {{ session()->get('api_update') }}
        </div>
    @endif
    <div class="page-content">
        <div class="container">
            @if(auth()->user()->is_admin)
                <div class="bg-white p-4 mb-4">
                    <div class="card-head">
                        <h4 class="card-title">Upload custom reports</h4>
                    </div>
                    <div class="mb-2">
                        <!-- Sync Prices Block -->

                            @livewire('upload-custom-reports')

                    <!-- /Sync Prices Block -->
                    </div>
                </div>
            @endif
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">Service Price list</h4>
                </div>
                <div class="mb-2">
                    <!-- Sync Prices Block -->
                    @if(auth()->user()->is_admin)
                        @livewire('sync-service-prices')
                    @endif
                    <!-- /Sync Prices Block -->
                </div>
                <!-- Service DataTable -->
                    @livewire('service-price-table')
                <!-- /Service DataTable -->
            </div>
            @if(auth()->user()->is_admin)
                <div class="bg-white p-4">
                    <div class="card-head">
                        <h4 class="card-title">Extras price list</h4>
                    </div>
                    <div class="mb-2">
                        <!-- Sync Prices Block -->
                            @if(auth()->user()->is_admin)
                                @livewire('sync-extra-prices')
                            @endif
                        <!-- /Sync Prices Block -->
                    </div>
                    <!-- Extra Services DataTable -->
                        @livewire('extras-price-table')
                    <!-- /Extra Services DataTable -->
                </div>
            @endif
        </div>
    </div>
    <script>
        document.addEventListener('turbolinks:load', () => {
            window.livewire.rescan()
        });
        //window.livewire.rescan()
    </script>
@endsection
