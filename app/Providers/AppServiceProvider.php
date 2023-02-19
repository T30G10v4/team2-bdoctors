<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

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
    {                        //classe Gateway di Braintree
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'ww53r3hqkgrcncm5',
                    'publicKey' => 's3q845knp52zdrhb',
                    'privateKey' => '9bfa56d4cd6b6ca7d098d9084b576932'
                ]
            );
        });
    }
}
