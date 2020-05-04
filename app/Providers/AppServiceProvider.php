<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

use App\PotterService\PotterService;
use App\PotterService\PotterServiceManager;
use App\PotterService\ApiPotterService;

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
