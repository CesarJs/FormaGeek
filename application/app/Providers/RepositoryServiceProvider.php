<?php

namespace Treina\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\Treina\Models\Repositories\MeasuresRepository::class, \Treina\Models\Repositories\MeasuresRepositoryEloquent::class);
        $this->app->bind(\Treina\Models\Repositories\FoodsRepository::class, \Treina\Models\Repositories\FoodsRepositoryEloquent::class);
        $this->app->bind(\Treina\Models\Repositories\DietsRepository::class, \Treina\Models\Repositories\DietsRepositoryEloquent::class);
        $this->app->bind(\Treina\Models\Repositories\DietRepository::class, \Treina\Models\Repositories\DietRepositoryEloquent::class);
        $this->app->bind(\Treina\Models\Repositories\MeasureRepository::class, \Treina\Models\Repositories\MeasureRepositoryEloquent::class);
        $this->app->bind(\Treina\Models\Repositories\FoodRepository::class, \Treina\Models\Repositories\FoodRepositoryEloquent::class);
        //:end-bindings:
    }
}
