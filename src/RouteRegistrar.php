<?php

namespace Alive2212\LaravelParsianPayment;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->forRestfulPayment();
        $this->forCustomPayment();
    }

    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forRestfulPayment()
    {
        $this->router->group([
            'prefix' => '/v1/alive/',
        ], function (Router $router) {
            $router->resource('/parsian/payment', 'AliveParsianPaymentController');
        });
    }

    public function forCustomPayment()
    {
        $this->router->group([
            'prefix' => '/v1/custom/alive/',
        ], function (Router $router) {

            $router->group([
                'middleware' => 'auth:api',
            ],function(Router $router){
                $router->post(
                    '/parsian/payment/init',
                    'CustomParsianPaymentController@init');
            });

            $router->post(
                '/parsian/payment/confirm',
                'CustomParsianPaymentController@confirm'
            );
        });
    }
}
