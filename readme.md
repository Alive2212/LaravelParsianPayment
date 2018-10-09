# LaravelParsianPayment

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is Parsian Bank IPG Payment Package that work with soap services.
This package contain from:

* Routes (init payment & confirm payment)

* Controller

* Job (to dispatch when any payment confirmed)

* Setting

## Installation

Via Composer

``` bash
$ composer require alive2212/laravel-parsian-payment
```
add following app.php in config file 

```php
'providers'=>[
    ...

    /*
     *  add parsian payment service provider
     */
    Alive2212\LaravelParsianPayment\LaravelParsianPaymentServiceProvider::class,
    
    ...
]
```

``` bash
php artisan vendor:publish --tag laravel-parsian-payment.config
php artisan vendor:publish --tag laravel-parsian-payment.lang
php artisan vendor:publish --tag laravel-parsian-payment.job
php artisan parsian_payment:init
```

Add following into one service provider like 'RouteServiceProvider'
```php
LaravelParsianPayment::routes(null,['middleware'=>'web']);
```
 if you not use any default middleware for this package routes you can just use following
```php
LaravelParsianPayment::routes();
``` 

## Usage

After installation you can see following routs with ```php artisan route:list```
```
POST: {your base url}/api/v1/custom/alive/parsian/payment/init 
POST: {your base url}/api/v1/custom/alive/parsian/payment/confirm  
RESOURCE (CRUD Full): {your base url}/api/v1/alive/parsian/payment 
```

At first you should use `init` api for init payment for use it put following into Header
* Authorization
* Accept

And put following into body of request
* amount:{int value}

You should set `callback` URL into laravel-parsian-payment like following
'callback' => '{{base-url}}/api/v1/custom/alive/parsian/payment/confirm'

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/alive2212/laravelparsianpayment.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/alive2212/laravelparsianpayment.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/alive2212/laravelparsianpayment/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/alive2212/laravelparsianpayment
[link-downloads]: https://packagist.org/packages/alive2212/laravelparsianpayment
[link-travis]: https://travis-ci.org/alive2212/laravelparsianpayment
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/alive2212
[link-contributors]: ../../contributors]