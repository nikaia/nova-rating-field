<?php

namespace Nikaia\Rating;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Nikaia\Rating\Http\Middleware\Authorize;

class RatingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('rating', __DIR__.'/../dist/js/rating.js');
            //Nova::style('rating', __DIR__.'/../dist/css/rating.css');
        });
    }
}
