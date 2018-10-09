<?php

namespace Alive2212\LaravelParsianPayment;

class LaravelParsianPayment extends BasePackage
{
    /**
     * route prefix
     *
     * @var string
     */
    static protected $ROUTE_PREFIX = '/api';

    /**
     * controller namespace
     *
     * @var string
     */
    static protected $CONTROLLER_NAME_SPACE = 'Alive2212\LaravelParsianPayment\Http\Controllers';
}