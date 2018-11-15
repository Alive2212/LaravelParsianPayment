<?php

namespace Alive2212\LaravelParsianPayment;

use Alive2212\LaravelParsianPayment\Console\Commands\Init;
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
        $this->loadTranslationsFrom(resource_path('lang/vendor/alive2212'),
            'laravel-parsian-payment');

        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/../config/laravel-parsian-payment.php' => config_path('laravel-smart-restful.php'),
            ], 'laravel-parsian-payment.config');

            // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/Jobs' => app_path('Jobs'),
            ], 'laravel-parsian-payment.job');

            // Publishing the translation files.
            $this->publishes([
                __DIR__ . '/../resources/lang/' => resource_path('lang/vendor/alive2212'),
            ], 'laravel-parsian-payment.lang');

            // Registering package commands.
            $this->commands([
                Init::class,
            ]);

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

        // Register the service thsee package provides.
        $this->app->singleton('LaravelParsianPayment', function ($app) {
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
        return ['LaravelParsianPayment'];
    }
}