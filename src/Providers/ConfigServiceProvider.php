<?php

namespace ExchangeProcessor\Providers;

use ExchangeProcessor\Processor;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/exchanges.php', 'exchanges'
        );
    }

    public function register()
    {
        $this->app->bind(Processor::class);
    }
}
