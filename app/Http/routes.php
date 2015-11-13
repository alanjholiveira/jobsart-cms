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


// Painel (ADMIN)
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Core\DashboardController@index']);
    Route::get('config', ['as' => 'admin.config.index', 'uses' => 'Core\ConfigController@index']); // App/Http/Controllers/Painel/Posts.php
    Route::post('config', ['as' => 'admin.config.update', 'uses' => 'Core\ConfigController@update']);


    // Module: SlideShow
    Route::group(['prefix' => 'slideshow', 'namespace' => 'Modules\SlideShow'], function(){
        get('/', ['as' => 'admin.slideshow.index', 'uses' => 'SlideShowAdminController@index']);
        post('/', ['as' => 'admin.slideshow.store', 'uses' => 'SlideShowAdminController@store']);
        get('/trash', ['as' => 'admin.slideshow.trash', 'uses' => 'SlideShowAdminController@trash']);
        get('/create', ['as' => 'admin.slideshow.create', 'uses' => 'SlideShowAdminController@create']);
        get('/pdf', ['as' => 'admin.slideshow.pdf', 'uses' => 'SlideShowAdminController@createPdf']);
        // SlideShow/{id}
        Route::group(['prefix' => '{id}'], function(){
            //get('/', ['as'=>'admin.slideshow.show','uses'=>'AdminProductsController@show']);
            delete('/delete',['as'=>'admin.slideshow.delete','uses'=>'SlideShowAdminController@destroy']);
            get('/edit',['as'=>'admin.slideshow.edit','uses'=>'SlideShowAdminController@edit']);
            put('/update',['as'=>'admin.slideshow.update','uses'=>'SlideShowAdminController@update']);
        });
    });

    // Module: Portfolio
    Route::group(['prefix' => 'portfolio', 'namespace' => 'Modules\Portfolio'], function(){
        get('/', ['as' => 'admin.portfolio.index', 'uses' => 'PortfolioAdminController@index']);
        post('/', ['as' => 'admin.portfolio.store', 'uses' => 'PortfolioAdminController@store']);
        get('/trash', ['as' => 'admin.portfolio.trash', 'uses' => 'PortfolioAdminController@trash']);
        get('/create', ['as' => 'admin.portfolio.create', 'uses' => 'PortfolioAdminController@create']);
        get('/pdf', ['as' => 'admin.portfolio.pdf', 'uses' => 'PortfolioAdminController@createPdf']);
        // Portfolio/{id}
        Route::group(['prefix' => '{id}'], function(){
            get('/edit',['as'=>'admin.portfolio.edit','uses'=>'PortfolioAdminController@edit']);
            put('/update',['as'=>'admin.portfolio.update','uses'=>'PortfolioAdminController@update']);
        });
        // Portfolio/Cat
        Route::group(['prefix' => 'cat'], function(){
            get('/', ['as' => 'admin.portfolio.cat.index', 'uses' => 'PortfolioCatAdminController@index']);
            post('/', ['as' => 'admin.portfolio.cat.store', 'uses' => 'PortfolioCatAdminController@store']);
            get('/trash', ['as' => 'admin.portfolio.cat.trash', 'uses' => 'PortfolioCatAdminController@trash']);
            get('/create', ['as' => 'admin.portfolio.cat.create', 'uses' => 'PortfolioCatAdminController@create']);
            get('/pdf', ['as' => 'admin.portfolio.cat.pdf', 'uses' => 'PortfolioCatAdminController@createPdf']);
            post('/delete', ['as'=>'admin.portfolio.cat.delete','uses'=>'PortfolioCatAdminController@destroy']);
            // Portfolio/Cat/{id}
            Route::group(['prefix' => '{id}'], function(){
                get('/edit',['as'=>'admin.portfolio.cat.edit','uses'=>'PortfolioCatAdminController@edit']);
                put('/update',['as'=>'admin.portfolio.cat.update','uses'=>'PortfolioCatAdminController@update']);
            });

        });
    });

    // Module: Post
    Route::group(['prefix' => 'post', 'namespace' => 'Modules\Post'], function(){
        get('/', ['as' => 'admin.post.index', 'uses' => 'PostController@index']);
        post('/', ['as' => 'admin.post.store', 'uses' => 'PostController@store']);
        get('/trash', ['as' => 'admin.post.trash', 'uses' => 'PostController@trash']);
        get('/create', ['as' => 'admin.post.create', 'uses' => 'PostController@create']);
        get('/pdf', ['as' => 'admin.post.pdf', 'uses' => 'PostController@createPdf']);
        // Portfolio/{id}
        Route::group(['prefix' => '{id}'], function(){
            get('/edit',['as'=>'admin.post.edit','uses'=>'PostController@edit']);
            put('/update',['as'=>'admin.post.update','uses'=>'PostController@update']);
        });
        // Portfolio/Cat
        Route::group(['prefix' => 'cat'], function(){
            get('/', ['as' => 'admin.post.cat.index', 'uses' => 'PostCatController@index']);
            post('/', ['as' => 'admin.post.cat.store', 'uses' => 'PostCatController@store']);
            get('/trash', ['as' => 'admin.post.cat.trash', 'uses' => 'PostCatController@trash']);
            get('/create', ['as' => 'admin.post.cat.create', 'uses' => 'PostCatController@create']);
            get('/pdf', ['as' => 'admin.post.cat.pdf', 'uses' => 'PostCatController@createPdf']);
            post('/delete', ['as'=>'admin.post.cat.delete','uses'=>'PostCatController@destroy']);

            // Portfolio/Cat/{id}
            Route::group(['prefix' => '{id}'], function(){
                get('/edit',['as'=>'admin.post.cat.edit','uses'=>'PostCatController@edit']);
                put('/update',['as'=>'admin.post.cat.update','uses'=>'PostCatController@update']);
            });

        });
    });
});















