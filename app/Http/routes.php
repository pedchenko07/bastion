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
    Route::get('/', ['as' => 'site.index', 'uses' => 'SiteController@index']);
    Route::get('page/{id}', ['as' => 'site.page', 'uses' => 'SiteController@page']);

    Route::get('/category', function() {
        return view('frontend.category');
    });

    Route::get('/delivery', function() {
        return view('frontend.delivery_payment');
    });

    Route::get('/contacts', function() {
        return view('frontend.contacts');
    });
    Route::get('/cart', function() {
        return view('frontend.cart');
    });
});
Route::group(['prefix' => 'product'], function() {
    Route::get('/{id?}', ['as' => 'item.index', 'uses' => 'ItemController@index']);
});
Route::group(['prefix' => 'reviews'], function() {
    Route::get('/', ['as' => 'site.reviews.index', 'uses' => 'SiteController@reviews']);
    Route::post('/', ['as' => 'site.reviews.save', 'uses' => 'SiteController@reviewsSave']);
});


Route::auth();

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        Route::get('add', ['as' => 'admin.add_page', 'uses' => 'AdminController@addPage']);
        Route::post('add', ['as' => 'admin.save', 'uses' => 'AdminController@savePage']);
        Route::get('edit/{id}', ['as' => 'admin.edit_page', 'uses' => 'AdminController@editPage']);
        Route::post('edit/{id?}', ['as' => 'admin.update_page', 'uses' => 'AdminController@updatePage']);
        Route::get('delete/{id}', ['as' => 'admin.delete_page', 'uses' => 'AdminController@deletePage']);
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
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
            Route::get('edit', ['as' => 'settings.edit', 'uses' => 'SettingsController@editSettings']);
            Route::post('edit', ['as' => 'settings.editSave', 'uses' => 'SettingsController@saveSettings']);
            Route::get('delivery', ['as' => 'settings.delivery', 'uses' => 'SettingsController@delivery']);
            Route::post('delivery',
                ['as' => 'settings.delivery.new', 'uses' => 'SettingsController@deliveryNew']);

            Route::get('delivery/edit/{id}',
                ['as' => 'settings.delivery.edit', 'uses' => 'SettingsController@deliveryEdit']);
            Route::post('delivery/edit/{id}',
                ['as' => 'settings.delivery.update', 'uses' => 'SettingsController@deliveryUpdate']);
            Route::get('delivery/delete/{id}',
                ['as' => 'settings.delivery.delete', 'uses' => 'SettingsController@deliveryDelete']);
            Route::get('oplata', ['as' => 'settings.oplata', 'uses' => 'SettingsController@oplata']);
            Route::post('oplata',
                ['as' => 'settings.oplata.new', 'uses' => 'SettingsController@oplataNew']);

            Route::get('oplata/edit/{id}',
                ['as' => 'settings.oplata.edit', 'uses' => 'SettingsController@oplataEdit']);
            Route::post('oplata/edit/{id}',
                ['as' => 'settings.oplata.update', 'uses' => 'SettingsController@oplataUpdate']);
            Route::get('oplata/delete/{id}',
                ['as' => 'settings.oplata.delete', 'uses' => 'SettingsController@oplataDelete']);
        });
        Route::group(['prefix' => 'category'], function() {
            Route::get('/', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
        });
        Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
        Route::get('design', ['as' => 'settings.design', 'uses' => 'SettingsController@design']);
        Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);
        Route::get('sliders', ['as' => 'news.sliders', 'uses' => 'NewsController@sliders']);
        Route::get('order', ['as' => 'order.index', 'uses' => 'OrderController@index']);
    });

});

Route::get('/home', 'HomeController@index');

