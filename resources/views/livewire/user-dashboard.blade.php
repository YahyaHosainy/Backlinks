@extends('layouts.dashboard')
@section('content')
    @if(auth()->user()->is_admin)
        @livewire('admin-dashboard')
    @else
        @livewire('customer-dashboard')
    @endif
@endsection

@if(auth()->user()->is_admin)
    @section('chart_js')
        <!-- Charting library -->
        <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
        <!-- Your application script -->
        <script data-turbolinks-track="reload">
            var chart = new Chartisan({
                el: '#first-chart',
                url: "@chart('admin_dashboard_chart')",
                hooks: new ChartisanHooks()
                    .colors()
            });
            var chart2 = new Chartisan({
                el: '#second-chart',
                url: "@chart('admin_dashboard_chart_part_two')",
                hooks: new ChartisanHooks()
                    .colors()
            });
        </script>
    @endsection
@endif
