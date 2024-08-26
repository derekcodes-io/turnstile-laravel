<?php

namespace DerekCodes\TurnstileLaravel;

use Illuminate\Support\ServiceProvider;

class TurnstileLaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerConfig();
    }

    protected function registerConfig()
    {
        $config = __DIR__.'/../config/turnstile.php';

        $this->publishes([
            __DIR__.'/../config/turnstile.php' => config_path('turnstile.php')
        ], 'turnstile-config');

        $this->mergeConfigFrom($config, 'turnstile');
    }
}
