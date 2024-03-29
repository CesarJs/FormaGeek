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
       
        $this->app->bind(\Treina\Repositories\DietRepository::class, \Treina\Repositories\DietRepositoryEloquent::class);
        $this->app->bind(\Treina\Repositories\MeasureRepository::class, \Treina\Repositories\MeasureRepositoryEloquent::class);
        $this->app->bind(\Treina\Repositories\FoodRepository::class, \Treina\Repositories\FoodRepositoryEloquent::class);
        $this->app->bind(\Treina\Repositories\PostRepository::class, \Treina\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\Treina\Repositories\MetabolismRepository::class, \Treina\Repositories\MetabolismRepositoryEloquent::class);
        $this->app->bind(\Treina\Repositories\MealRepository::class, \Treina\Repositories\MealRepositoryEloquent::class);
        //:end-bindings:
    }
}
