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
    Route::get('search', ['as' => 'search', 'uses' => 'SiteController@search']);

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

Route::group(['prefix' => 'cart'], function() {
    Route::get('/', ['as' => 'cart.index', 'uses' => 'Cart\CartController@index']);
    Route::post('/', ['as' => 'cart.order', 'uses' => 'Cart\CartController@getOrder']);
    Route::get('add/product/{id}', ['as' => 'cart.add.product', 'uses' => 'Cart\CartController@add']);
    Route::get('delete/product/{id}', ['as' => 'cart.delete.product', 'uses' => 'Cart\CartController@delete']);

});

Route::group(['prefix' => 'category'], function() {
    Route::get('/{id}', ['as' => 'site.category', 'uses' => 'SiteController@category']);
});

Route::group(['prefix' => 'product'], function() {
    Route::get('/{id?}', ['as' => 'item.index', 'uses' => 'ItemController@index']);
});
Route::group(['prefix' => 'reviews'], function() {
    Route::get('/', ['as' => 'site.reviews.index', 'uses' => 'SiteController@reviews']);
    Route::post('/', ['as' => 'site.reviews.save', 'uses' => 'SiteController@reviewsSave']);
});
Route::get('/news', ['as' => 'site.news.index', 'uses' => 'NewsController@site']);

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
            Route::get('add', ['as' => 'category.add', 'uses' => 'CategoryController@addCategory']);
            Route::post('add', ['as' => 'category.create', 'uses' => 'CategoryController@createCategory']);
            Route::get('edit/{id}',['as' => 'category.edit', 'uses' => 'CategoryController@editCategory']);
            Route::post('edit/{id?}', ['as' => 'category.update', 'uses' => 'CategoryController@updateCategory']);
            Route::get('delete/{id}', ['as' => 'category.delete', 'uses' => 'CategoryController@deleteCategory']);
            Route::get('subCat/{id}', ['as' => 'category.subCat', 'uses' => 'CategoryController@editCatalog']);
//            Route::get('all/{id}', ['as' => 'category.all', 'uses' => 'CategoryController@categoryAll']);
        });
        Route::group(['prefix' => 'product'], function() {
            Route::get('add/{brandId}/{productId?}',['as' => 'product.add', 'uses' => 'ProductController@addProduct']);
            Route::post('add/{id?}',['as' => 'product.create', 'uses' => 'ProductController@create']);
            Route::post('add/{brandId}/{productId}', ['as' => 'product.update', 'uses' => 'ProductController@update']);
            Route::get('delete/{id}', ['as' => 'product.delete', 'uses' => 'ProductController@delete']);
            Route::post('product/delete/img', ['as' => 'product.delete.img', 'uses' => 'ProductController@deleteImg']);
        });
        Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
        Route::get('design', ['as' => 'settings.design', 'uses' => 'SettingsController@design']);
        Route::group(['prefix' => 'user'], function() {
            Route::get('/', ['as' => 'user.index', 'uses' => 'UserController@index']);
//            Route::post('save', ['as' => 'user.save', 'uses' => 'UserController@saveNewEmail']);
            Route::get('{id}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
            Route::post('save', ['as' => 'user.save', 'uses' => 'UserController@saveUser']);
            Route::get('add', ['as' => 'user.add', 'uses' => 'UserController@add']);
            Route::post('add', ['as' => 'user.new.save', 'uses' => 'UserController@saveNewUser']);
            Route::get('{id}/delete', ['as' => 'user.delete', 'uses' => 'UserController@delete']);


        });
        Route::group(['prefix' => 'sliders'], function() {
            Route::get('/', ['as' => 'sliders.index', 'uses' => 'SliderController@index']);
            Route::get('create', ['as' => 'sliders.create', 'uses' => 'SliderController@create']);
            Route::get('create/img', ['as' => 'sliders.create.img', 'uses' => 'SliderController@create']);
            Route::get('create/video', ['as' => 'sliders.create.video', 'uses' => 'SliderController@create']);
            Route::post('create/img', ['as' => 'sliders.save.img', 'uses' => 'SliderController@createImg']);
            Route::post('create/video', ['as' => 'sliders.save.video', 'uses' => 'SliderController@createVideo']);
            Route::get('delete/{id}', ['as' => 'sliders.delete', 'uses' => 'SliderController@delete']);
            Route::get('edit/{id}', ['as' => 'sliders.edit', 'uses' => 'SliderController@edit']);

        });
        Route::group(['prefix' => 'order'], function() {
            Route::get('/', ['as' => 'order.index', 'uses' => 'OrderController@index']);
            Route::get('new', ['as' => 'order.new', 'uses' => 'OrderController@newOrders']);
            Route::get('{id}', ['as' => 'order.show', 'uses' => 'OrderController@show']);
            Route::get('status/{id}', ['as' => 'order.status', 'uses' => 'OrderController@status']);
            Route::get('delete/{id}', ['as' => 'order.delete', 'uses' => 'OrderController@delete']);

        });

    });

});

Route::get('/home', 'HomeController@index');

/* View Composer Here */

View::composer('frontend.composers.metrics', 'App\Http\ViewComposers\MetricsComposer');
View::composer(['frontend.composers.box-category', 'admin.includes.leftbar','frontend.includes.footer'],
    'App\Http\ViewComposers\BrandsComposer');
View::composer(['frontend.includes.header','frontend.mobile.swipe-menu','frontend.includes.footer'], 'App\Http\ViewComposers\HeaderComposer');
View::composer('frontend.includes.img_slider', 'App\Http\ViewComposers\ImgSliderComposer');
View::composer('frontend.includes.video_slider', 'App\Http\ViewComposers\VideoSliderComposer');