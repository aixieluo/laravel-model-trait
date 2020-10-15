<?php

namespace Aixieluo\LaravelModelTrait;

use Illuminate\Support\ServiceProvider;

class ModelTraitServiceProvider extends ServiceProvider
{
    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeModelCommand::class,
                MakeModelTraitCommand::class,
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
