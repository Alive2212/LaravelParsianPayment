<?php

namespace Alive2212\LaravelParsianPayment\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelParsianPayment extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-parsian-payment';
    }
}
