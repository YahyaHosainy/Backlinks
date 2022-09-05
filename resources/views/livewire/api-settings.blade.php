@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">Customers Bonus</h4>
                </div>
                <!-- Customers Bonus Form -->
                    @livewire('add-bonus-after-adding-funds')
                <!-- /Customers Bonus Form -->
            </div>
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">MailChimp Settings</h4>
                </div>
                <!-- MailChimp API Settings Form -->
                    @livewire('mail-chimp-api-form')
                <!-- /MailChimp API Settings Form -->
            </div>
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">Api Settings</h4>
                </div>
                <!-- API Settings Form -->
                    @livewire('api-settings-form')
                <!-- /API Settings Form -->
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
