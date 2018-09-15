<?php

namespace Nikaia\Rating;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

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
