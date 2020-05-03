<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

use App\Character\PotterServiceInterface;
use App\Character\PotterService;
use App\Character\ApiPotterService;

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
        $this->app->bind(PotterServiceInterface::class, PotterService::class);

        $this->app->bind(ApiPotterService::class, function () {
            return new ApiPotterService(new Client([
                'base_uri' => config('app.api_url'),
                'query' => ['key' => config('app.api_key')]
            ]));
        });
    }
}
