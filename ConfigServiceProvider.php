<?php

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
}
