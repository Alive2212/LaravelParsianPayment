<?php

namespace Alive2212\LaravelParsianPayment;

class LaravelParsianPayment extends BasePackage
{
    public function __construct()
    {
    }

    public static function getRoutePrefix():string
    {
        if (is_null(self::$ROUTE_PREFIX)){
            return "/api";
        }
        return (string) self::$ROUTE_PREFIX;
    }

    public static function getControllerNameSpace():string
    {
        if (is_null(self::$CONTROLLER_NAME_SPACE)){
            return "Alive2212\LaravelParsianPayment\Http\Controllers";
        }
        return (string) self::$CONTROLLER_NAME_SPACE;
    }
}