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

Route::group(['prefix' => '/'], function() {
    Route::get('/', 'SiteController@index');

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
});


Route::auth();

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        Route::get('/add', ['as' => 'admin.add_page', 'uses' => 'AdminController@addPage']);
        Route::post('/add', ['as' => 'admin.save', 'uses' => 'AdminController@savePage']);
        Route::group(['prefix' => 'metrics'], function () {
            Route::get('/', ['as' => 'metrics.index', 'uses' => 'MetricsController@index']);
            Route::get('add', ['as' => 'metrics.add', 'uses' => 'MetricsController@add']);
            Route::post('add', ['as' => 'metrics.save', 'uses' => 'MetricsController@save']);
            Route::get('status/{id}/{status}', ['as' => 'metrics.status', 'uses' => 'MetricsController@status']);
            Route::get('delete/{id}', ['as' => 'metrics.delete', 'uses' => 'MetricsController@delete']);
        });
        Route::group(['prefix' => 'informers'], function() {
            Route::get('/', ['as' => 'user.informer', 'uses' => 'UserController@informer']);
            Route::get('add', ['as' => 'user.informerAdd', 'uses' => 'UserController@informerAdd']);
            Route::get('edit/{id?}', ['as' => 'user.informerEdit', 'uses' => 'UserController@informerEdit']);
            Route::get('delete/{id?}', ['as' => 'user.informerDelete', 'uses' => 'UserController@informerDelete']);
        });
        Route::group(['prefix' => 'news'], function () {
            Route::get('/', ['as' => 'news.index', 'uses' => 'NewsController@index']);
            Route::get('add', ['as' => 'news.add', 'uses' => 'NewsController@addNews']);
            Route::post('add', ['as' => 'news.save', 'uses' => 'NewsController@saveNews']);
            Route::get('edit/{id}', ['as' => 'news.edit', 'uses' => 'NewsController@editNews']);
            Route::post('edit/{id?}', ['as' => 'news.update', 'uses' => 'NewsController@updateNews']);
            Route::get('delete/{id}', ['as' => 'news.delete', 'uses' => 'NewsController@deleteNews']);
        });
        Route::group(['prefix' => 'reviews'], function () {
            Route::get('/', ['as' => 'reviews.index', 'uses' => 'ReviewsController@index']);
            Route::get('status/{id}', ['as' => 'reviews.status', 'uses' => 'ReviewsController@status']);
            Route::get('delete/{id}', ['as' => 'reviews.delete', 'uses' => 'ReviewsController@delete']);
        });
        Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
        Route::get('design', ['as' => 'settings.design', 'uses' => 'SettingsController@design']);
        Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
        Route::get('sliders', ['as' => 'news.sliders', 'uses' => 'NewsController@sliders']);
        Route::get('order', ['as' => 'order.index', 'uses' => 'OrderController@index']);
        Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    });

});

Route::get('/home', 'HomeController@index');

