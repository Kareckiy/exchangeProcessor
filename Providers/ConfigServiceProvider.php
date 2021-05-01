<?php

namespace ExchangeProcessor\Providers;

use ExchangeProcessor\Processor;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*$this->publishes(
            [
                __DIR__.'/../Config/exchanges.php' => config_path('exchanges.php'),
            ]
        );*/

        $this->mergeConfigFrom(
            __DIR__.'/../Config/exchanges.php', 'exchanges'
        );
    }

    public function register()
    {
        $this->app->bind(Processor::class);
    }
}
