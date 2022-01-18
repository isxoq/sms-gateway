<?php

namespace Isxoq\SmsGateway;

use Illuminate\Support\ServiceProvider;

class SmsGatewayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->publishes([
            __DIR__ . '/config/sms_gateway.php' => config_path('sms_gateway.php'),
        ]);
    }

    public function register()
    {

    }
}
