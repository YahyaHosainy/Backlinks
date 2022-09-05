@extends('layouts.dashboard')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    @livewire('profile.update-profile-information-form')

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <x-jet-section-border />

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif
                </div>
            </div>
        </x-slot>

    </x-app-layout>
    <script>
        document.addEventListener('turbolinks:load', () => {
            window.livewire.rescan()
        });
        //window.livewire.rescan()
    </script>
@endsection
