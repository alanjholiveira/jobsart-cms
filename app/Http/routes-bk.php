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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);

Route::group(['prefix' => '/'], function() {

    //Route::pattern('id', '[0-9]+');

    get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

    Route::group(['prefix' => 'admin',], function(){
    //Route::group(['prefix' => 'admin', 'middleware' => 'auth_admin'], function(){

        //Route::pattern('id', '[0-9]+');

        get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\Core\DashboardController@index']);

        Route::group(['prefix' => 'config'], function(){
            get('/', ['as' => 'admin.config.index', 'uses' => 'Admin\Core\ConfigController@index']);
            post('/', ['as' => 'admin.config.update', 'uses' => 'Admin\Core\ConfigController@update']);

        });

/*
  |--------------------------------------------------------------------------
  | Modules Routes admin
  |--------------------------------------------------------------------------
*/
        // Module: SlideShow
        Route::group(['prefix' => 'slideshow'], function(){
            get('/', ['as' => 'admin.slideshow.index', 'uses' => 'Admin\Modules\SlideShow\SlideShowAdminController@index']);
            post('/', ['as' => 'admin.slideshow.store', 'uses' => 'Admin\Modules\SlideShow\SlideShowAdminController@store']);
            get('/trash', ['as' => 'admin.slideshow.trash', 'uses' => 'Admin\Modules\SlideShow\SlideShowAdminController@trash']);
            get('/create', ['as' => 'admin.slideshow.create', 'uses' => 'Admin\Modules\SlideShow\SlideShowAdminController@create']);
            get('/pdf', ['as' => 'admin.slideshow.pdf', 'uses' => 'Admin\Modules\SlideShow\SlideShowAdminController@createPdf']);

            // SlideShow/{id}
            Route::group(['prefix' => '{id}'], function(){
                //get('/', ['as'=>'admin.slideshow.show','uses'=>'AdminProductsController@show']);
                delete('/delete',['as'=>'admin.slideshow.delete','uses'=>'Admin\Modules\SlideShow\SlideShowAdminController@destroy']);
                get('/edit',['as'=>'admin.slideshow.edit','uses'=>'Admin\Modules\SlideShow\SlideShowAdminController@edit']);
                put('/update',['as'=>'admin.slideshow.update','uses'=>'Admin\Modules\SlideShow\SlideShowAdminController@update']);
            });

        });

        // Module: Portfolio
        Route::group(['prefix' => 'portfolio'], function(){
            get('/', ['as' => 'admin.portfolio.index', 'uses' => 'Admin\Modules\Portfolio\PortfolioAdminController@index']);
            post('/', ['as' => 'admin.portfolio.store', 'uses' => 'Admin\Modules\Portfolio\PortfolioAdminController@store']);
            get('/trash', ['as' => 'admin.portfolio.trash', 'uses' => 'Admin\Modules\Portfolio\PortfolioAdminController@trash']);
            get('/create', ['as' => 'admin.portfolio.create', 'uses' => 'Admin\Modules\Portfolio\PortfolioAdminController@create']);
            get('/pdf', ['as' => 'admin.portfolio.pdf', 'uses' => 'Admin\Modules\Portfolio\PortfolioAdminController@createPdf']);
            post('/delete',['as'=>'admin.portfolio.delete','uses'=>'Admin\Modules\Portfolio\PortfolioAdminController@destroy']);

            // Portfolio/{id}
            Route::group(['prefix' => '{id}'], function(){
                get('/edit',['as'=>'admin.portfolio.edit','uses'=>'Admin\Modules\Portfolio\PortfolioAdminController@edit']);
                put('/update',['as'=>'admin.portfolio.update','uses'=>'Admin\Modules\Portfolio\PortfolioAdminController@update']);
            });
            // Portfolio/Cat
            Route::group(['prefix' => 'cat'], function(){
                get('/', ['as' => 'admin.portfolio.cat.index', 'uses' => 'Admin\Modules\Portfolio\PortfolioCatAdminController@index']);
                post('/', ['as' => 'admin.portfolio.cat.store', 'uses' => 'Admin\Modules\Portfolio\PortfolioCatAdminController@store']);
                get('/trash', ['as' => 'admin.portfolio.cat.trash', 'uses' => 'Admin\Modules\Portfolio\PortfolioCatAdminController@trash']);
                get('/create', ['as' => 'admin.portfolio.cat.create', 'uses' => 'Admin\Modules\Portfolio\PortfolioCatAdminController@create']);
                get('/pdf', ['as' => 'admin.portfolio.cat.pdf', 'uses' => 'Admin\Modules\Portfolio\PortfolioCatAdminController@createPdf']);
                post('/delete', ['as'=>'admin.portfolio.cat.delete','uses'=>'Admin\Modules\Portfolio\PortfolioCatAdminController@destroy']);

                // Portfolio/Cat/{id}
                Route::group(['prefix' => '{id}'], function(){
                    get('/edit',['as'=>'admin.portfolio.cat.edit','uses'=>'Admin\Modules\Portfolio\PortfolioCatAdminController@edit']);
                    put('/update',['as'=>'admin.portfolio.cat.update','uses'=>'Admin\Modules\Portfolio\PortfolioCatAdminController@update']);
                });

            });
        });

        // Module: Post
        Route::group(['prefix' => 'post'], function(){
            get('/', ['as' => 'admin.post.index', 'uses' => 'Admin\Modules\Post\PostController@index']);
            post('/', ['as' => 'admin.post.store', 'uses' => 'Admin\Modules\Post\PostController@store']);
            get('/trash', ['as' => 'admin.post.trash', 'uses' => 'Admin\Modules\Post\PostController@trash']);
            get('/create', ['as' => 'admin.post.create', 'uses' => 'Admin\Modules\Post\PostController@create']);
            get('/pdf', ['as' => 'admin.post.pdf', 'uses' => 'Admin\Modules\Post\PostController@createPdf']);
            post('/delete',['as'=>'admin.post.delete','uses'=>'Admin\Modules\Post\PostController@destroy']);

            // Portfolio/{id}
            Route::group(['prefix' => '{id}'], function(){
                get('/edit',['as'=>'admin.post.edit','uses'=>'Admin\Modules\Post\PostController@edit']);
                put('/update',['as'=>'admin.post.update','uses'=>'Admin\Modules\Post\PostController@update']);
            });
            // Portfolio/Cat
            Route::group(['prefix' => 'cat'], function(){
                get('/', ['as' => 'admin.post.cat.index', 'uses' => 'Admin\Modules\Post\PostCatController@index']);
                post('/', ['as' => 'admin.post.cat.store', 'uses' => 'Admin\Modules\Post\PostCatController@store']);
                get('/trash', ['as' => 'admin.post.cat.trash', 'uses' => 'Admin\Modules\Post\PostCatController@trash']);
                get('/create', ['as' => 'admin.post.cat.create', 'uses' => 'Admin\Modules\Post\PostCatController@create']);
                get('/pdf', ['as' => 'admin.post.cat.pdf', 'uses' => 'Admin\Modules\Post\PostCatController@createPdf']);
                post('/delete', ['as'=>'admin.post.cat.delete','uses'=>'Admin\Modules\Post\PostCatController@destroy']);

                // Portfolio/Cat/{id}
                Route::group(['prefix' => '{id}'], function(){
                    get('/edit',['as'=>'admin.post.cat.edit','uses'=>'Admin\Modules\Post\PostCatController@edit']);
                    put('/update',['as'=>'admin.post.cat.update','uses'=>'Admin\Modules\Post\PostCatController@update']);
                });

            });
        });

    });

});

///*
//  |--------------------------------------------------------------------------
//  | Admin Routes
//  |--------------------------------------------------------------------------
//*/
//
//Route::get('admin', ['as' => 'admin.index', 'uses' => 'admin\DashboardController@index']);
//Route::group(['prefix' => 'admin'], function(){
//
//    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'admin\DashboardController@index']);
////    Route::get('slideshow', ['as' => 'admin.slideshow.index', 'uses' => 'admin\SlideShowAdminController@index']);
////    Route::get('slideshow/create', ['as' => 'admin.slideshow.create', 'uses' => 'admin\SlideShowAdminController@create']);
////    Route::post('slideshow/store', ['as' => 'admin.slideshow.store', 'uses' => 'admin\SlideShowAdminController@store']);
////    Route::get('slideshow/edit/{id}', ['as' => 'admin.slideshow.edit', 'uses' => 'admin\SlideShowAdminController@edit']);
////    Route::put('slideshow/update/{id}', ['as' => 'admin.slideshow.update', 'uses' => 'admin\SlideShowAdminController@update']);
////    Route::get('slideshow/delete/{id}', ['as' => 'admin.slideshow.delete', 'uses' => 'admin\SlideShowAdminController@destroy']);
//
//    Route::group(['prefix' => 'slideshow'], function(){
//        get('/', ['as' => 'admin.slideshow.index', 'uses' => 'admin\SlideShowAdminController@index']);
//        get('/trash', ['as' => 'admin.slideshow.trash', 'uses' => 'admin\SlideShowAdminController@trash']);
//        post('/', ['as' => 'admin.slideshow.store', 'uses' => 'admin\SlideShowAdminController@store']);
//        get('/create', ['as' => 'admin.slideshow.create', 'uses' => 'admin\SlideShowAdminController@create']);
//        get('/edit/{id}', ['as' => 'admin.slideshow.edit', 'uses' => 'admin\SlideShowAdminController@edit']);
//        put('/update/{id}', ['as' => 'admin.slideshow.update', 'uses' => 'admin\SlideShowAdminController@update']);
//        delete('/delete', ['as' => 'admin.slideshow.delete', 'uses' => 'admin\SlideShowAdminController@destroy']);
//        //get('/delete', ['as' => 'admin.slideshow.delete', 'uses' => 'admin\SlideShowAdminController@destroy']);
//        get('/pdf', ['as' => 'admin.slideshow.pdf', 'uses' => 'admin\SlideShowAdminController@createPdf']);
//
//
//
//    });


//        Route::group(['prefix' => 'post'], function(){
//            Route::resource('/', 'Admin\Modules\Post\PostController', [
//                'names' => [
//                    'index' => 'admin.post.index'
//                ]
//            ]);
//            Route::resource('cat', 'Admin\Modules\Post\PostCatController', [
//                    'names' => [
//                        'index' => 'admin.post.cat.index',
//                        'destroy' => 'admin.post.cat.delete'
//                    ]
//                ]);
//        });

//});
