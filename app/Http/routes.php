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
Route::pattern('id','[0-9]+');
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'products'], function(){
        get('/', ['as' => 'product_list', 'uses' => 'AdminProductsController@index']);
        get('create', ['as' => 'product_create', 'uses' => 'AdminProductsController@create']);
        get('retrieve/{id}',['as' => 'product_retrieve', 'uses' => 'AdminProductsController@retrieve']);
        get('update/{id}', ['as' => 'product_update', 'uses' => 'AdminProductsController@update']);
        get('delete/{id}', ['as' => 'product_delete', 'uses' => 'AdminProductsController@delete']);
    });
    Route::group(['prefix'=>'categories'], function(){
        get('/', ['as' => 'categories_list', 'uses' => 'AdminCategoriesController@index']);
        get('create', ['as' => 'categories_create', 'uses' => 'AdminCategoriesController@create']);
        get('retrieve/{id}',['as' => 'categories_retrieve', 'uses' => 'AdminCategoriesController@retrieve']);
        get('update/{id}', ['as' => 'categories_update', 'uses' => 'AdminCategoriesController@update']);
        get('delete/{id}', ['as' => 'categories_delete', 'uses' => 'AdminCategoriesController@delete']);
    });
});

Route::get('/', function () {
    return view('welcome');
});

/*/meus testes
Route::get('welcome', 'Welcome@index');
Route::get('category', 'CategoryController@listar');
/* ex2
// admin/categories: Deve apontar para o controller AdminCategoriesController e para action index
Route::get('admin/categories', 'AdminCategoriesController@index');
// admin/products: Deve apontar para o controller AdminProductsController e para action index
Route::get('admin/products', 'AdminProductsController@index');
*/