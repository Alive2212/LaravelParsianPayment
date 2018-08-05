    <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('alive')->group(function () {
            Route::prefix('parsian')->group(function () {
                Route::prefix('payment')->group(function () {
                    Route::get('', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@index')->name('mobile_passport.role.index');
                    Route::get('create', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@create')->name('mobile_passport.role.create');
                    Route::get('{id}/edit', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@edit')->name('mobile_passport.role.edit');
                    Route::get('{id}', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@show')->name('mobile_passport.role.show');
                    Route::post('', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@store')->name('mobile_passport.role.store');
                    Route::put('{id}', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@update')->name('mobile_passport.role.put');
                    Route::patch('{id}', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@update')->name('mobile_passport.role.patch');
                    Route::delete('{id}', 'Alive2212\LaravelParsianPayment\Http\Controllers\AliveParsianPaymentController@destroy')->name('mobile_passport.role.destroy');
                });
            });
        });
        Route::prefix('custom')->group(function () {
            Route::prefix('alive')->group(function () {
                Route::prefix('parsian')->group(function () {
                    Route::prefix('payment')->group(function () {
                        Route::post('init', 'Alive2212\LaravelParsianPayment\Http\Controllers\CustomParsianPaymentController@init')->name('parsian_payment.custom.init');
                        Route::post('confirm', 'Alive2212\LaravelParsianPayment\Http\Controllers\CustomParsianPaymentController@confirm')->name('parsian_payment.custom.confirm');
                    });
                });
            });
        });
    });
});


