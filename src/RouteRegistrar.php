<?php

namespace Alive2212\LaravelParsianPayment;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    protected $BASE_RESTFUL_PREFIX = '/v1/alive/';
    /**
     * package prefix
     *
     * @var string
     */
    protected $PACKAGE_PREFIX = '/echarge';

    /**
     * base custom prefix
     *
     * @var string
     */
    protected $BASE_CUSTOM_PREFIX = '/v1/custom/alive';

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
            'prefix' => $this->BASE_RESTFUL_PREFIX,
        ], function (Router $router) {
            $router->resource('/parsian/payment', 'AliveParsianPaymentController');
        });
    }

    /**
     *
     *
     */
    public function forCustomPayment()
    {
        $this->router->group([
            'prefix' => $this->BASE_CUSTOM_PREFIX,
        ], function (Router $router) {
            $router->group([
                'prefix' => $this->PACKAGE_PREFIX,
            ], function (Router $router) {
                $router->group([
                    'middleware' => 'auth:api',
                ], function (Router $router) {
                    // place your route that need authentication middleware
                    $router->post(
                        '/payment/init',
                        'CustomParsianPaymentController@init');
                });
                // place your route
                $router->post(
                    '/payment/confirm',
                    'CustomParsianPaymentController@confirm'
                );
            });
        });
    }
}
