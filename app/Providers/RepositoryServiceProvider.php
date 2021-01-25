<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ChartRepositoryInterface,
    ProductRepositoryInterface,
    ReportsRepositoryInterface,
    UserRepositoryInterface
};

use App\Repositories\Core\Eloquent\{
    EloquentCategoryRepository,
    EloquentChartRepository,
    EloquentProductRepository,
    EloquentUserRepository
};

use App\Repositories\Core\QueryBuilder\{
    QueryBuilderCategoryRepository,
    QueryBuilderReportsRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            QueryBuilderCategoryRepository::class
            //EloquentCategoryRepository::class
        );

        $this->app->bind(
            ChartRepositoryInterface::class,
            EloquentChartRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            ReportsRepositoryInterface::class,
            QueryBuilderReportsRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
