<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\MonthsChart::class,
            \App\Charts\YearsChart::class
        ]);

        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        view()->composer(
            'admin.products.*',
            function($view) {
                $view->with('categories', Category::pluck('title', 'id'));
            }
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
