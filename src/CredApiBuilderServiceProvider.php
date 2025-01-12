<?php

namespace Laravel\CredApiBuilder;

use Illuminate\Support\ServiceProvider;
use Laravel\CredApiBuilder\Commands\CredApiBuilderCommand;

class CredApiBuilderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CredApiBuilderCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
