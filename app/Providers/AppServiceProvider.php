<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CampaignApp\Adapters\Contracts\SubscriberCsvInterface', 'CampaignApp\Adapters\Services\UploadSubscribersCsv');
    }
}
