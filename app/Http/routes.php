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
Route::group(['prefix'=>'admin', 'as' => 'admin.'],function(){

    Route::group(['prefix'=>'products', 'as' => 'products.'], function(){
        get('/', ['as' => 'index', 'uses' => 'AdminProductsController@index']);
        post('/', ['as' => 'store', 'uses' => 'AdminProductsController@store']);
        get('create', ['as' => 'create', 'uses' => 'AdminProductsController@create']);
        get('retrieve/{id}',['as' => 'retrieve', 'uses' => 'AdminProductsController@retrieve']);
        put('update/{id}', ['as' => 'update', 'uses' => 'AdminProductsController@update']);//usar attr hidden name=_method value=PUT
        get('delete/{id}', ['as' => 'delete', 'uses' => 'AdminProductsController@delete']);//usar attr hidden name=_method value=DELETE
    });

    Route::group(['prefix'=>'categories', 'as' => 'categories.'], function(){
        get('/', ['as' => 'index', 'uses' => 'AdminCategoriesController@index']);
        post('/', ['as' => 'store', 'uses' => 'AdminCategoriesController@store']);
        get('create', ['as' => 'create', 'uses' => 'AdminCategoriesController@create']);
        get('retrieve/{id}',['as' => 'retrieve', 'uses' => 'AdminCategoriesController@retrieve']);
        get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminCategoriesController@edit']);
        put('update/{id}', ['as' => 'update', 'uses' => 'AdminCategoriesController@update']);
        get('delete/{id}', ['as' => 'delete', 'uses' => 'AdminCategoriesController@delete']);
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