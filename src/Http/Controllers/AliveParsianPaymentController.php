<?php

namespace Alive2212\LaravelParsianPayment\Http\Controllers;

use Alive2212\LaravelParsianPayment\AliveParsianPayment;
use Alive2212\LaravelSmartRestful\BaseController;

class AliveParsianPaymentController extends BaseController
{
    /**
     *
     */
    public function initController()
    {
        $this->model = new AliveParsianPayment();
        $this->setLocalPrefix('laravel-parsian-payment');
    }
}