<?php

/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/8/18
 * Time: 11:20 AM
 */
namespace Alive2212\LaravelParsianPayment;

use Illuminate\Support\Facades\Route;

abstract class BasePackage
{
    /**
     * route prefix
     *
     * @var string
     */
    static protected $ROUTE_PREFIX;

    /**
     * controller namespace
     *
     * @var string
     */
    static protected $CONTROLLER_NAME_SPACE;


    abstract public static function getRoutePrefix():string;
    abstract public static function getControllerNameSpace():string;


    /**
     * Binds the Passport routes into the controller.
     *
     * @param  callable|null  $callback
     * @param  array  $options
     * @return void
     */
    public static function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function ($router) {
            $router->all();
        };

        $defaultOptions = [
            'prefix' => static::getRoutePrefix(),
            'namespace' => static::getControllerNameSpace(),
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
}