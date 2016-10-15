<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/category', function() {
   return view('frontend.category');
});
Route::get('/product', function() {
   return view('frontend.product');
});

Route::get('/delivery', function() {
   return view('frontend.delivery_payment');
});

Route::get('/reviews', function() {
    return view('frontend.reviews');
});

Route::get('/contacts', function() {
    return view('frontend.contacts');
});
Route::get('/cart', function() {
    return view('frontend.cart');
});


Route::auth();

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return view('admin.index');
        });
    });

});

Route::get('/home', 'HomeController@index');

