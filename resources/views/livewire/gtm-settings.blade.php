@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">GTM Settings</h4>
                </div>
                <!-- GTM Settings Block -->
                    @livewire('gtm-settings-form')
                <!-- /GTM Settings Block  -->
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
