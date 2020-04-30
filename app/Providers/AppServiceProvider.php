<?php

namespace App\Providers;

use App\ApiPotterService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

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
     * @return void
     */
    public function boot()
    {
        $this->app->bind('ApiPotterService', function () {
            return new ApiPotterService(new Client([
                'base_uri' => config('app.api_url'),
                'query' => ['key' => config('app.api_key')]
            ]));
        });
    }
}