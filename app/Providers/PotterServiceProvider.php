<?php

namespace App\Providers;

use App\PotterService\ApiPotterService;
use App\PotterService\PotterService;
use App\PotterService\PotterServiceManager;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PotterServiceProvider extends ServiceProvider
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
        $this->app->bind(PotterService::class, ApiPotterService::class);

        $this->app->bind(PotterServiceManager::class, function () {
            return new PotterServiceManager(App::make(ApiPotterService::class));
        });

        $this->app->bind(ApiPotterService::class, function () {
            return new ApiPotterService(new Client([
                'base_uri' => config('app.api_url'),
                'query' => ['key' => config('app.api_key')]
            ]));
        });
    }
}
