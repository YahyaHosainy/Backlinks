@extends('layouts.dashboard')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="bg-white p-4 mb-4">
                <div class="card-head">
                    <h4 class="card-title">General & SEO</h4>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <!-- Footer Bloc Control -->
                            @livewire('admin-manage-pre-footer-bloc')
                        <!-- /Footer Bloc Control -->
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- SEO Control Block -->
                            @livewire('admin-general-seo-form')
                        <!-- /SEO Control Block  -->
                    </div>
                </div>

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
