<?php

namespace App\Providers;

use App\Charts\AdminDashboardChart;
use App\Charts\AdminDashboardChartPartTwo;
use App\Http\Livewire\DotEnvModification\DotEnvModification;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Charts $charts
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            AdminDashboardChart::class,
            AdminDashboardChartPartTwo::class
        ]);
    }
}
