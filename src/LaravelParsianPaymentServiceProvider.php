<?php

namespace Alive2212\LaravelParsianPayment;

use Illuminate\Support\ServiceProvider;

class LaravelParsianPaymentServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // translations
        $this->loadTranslationsFrom(resource_path('lang/vendor/alive2212'), 'laravel_parsian_payment');

        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // routes
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/../config/laravel-parsian-payment.php' => config_path('laravel-parsian-payment.php'),
            ], 'laravel-parsian-payment.config');

            // Publishing the translation files.
            $this->publishes([
                __DIR__ . '/../resources/lang/' => resource_path('lang/vendor/alive2212'),
            ], 'laravel-parsian-payment.lang');

        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-parsian-payment.php', 'laravel-parsian-payment');

        // Register the service the package provides.
        $this->app->singleton('laravel-parsian-payment', function ($app) {
            return new LaravelParsianPayment;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-parsian-payment'];
    }
}