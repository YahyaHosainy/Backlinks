@extends('layouts.dashboard')
@section('content')
    @livewire('order-form')
    <script>
        document.addEventListener('turbolinks:load', () => {
            window.livewire.rescan()
        });
        //window.livewire.rescan()
    </script>

@endsection
