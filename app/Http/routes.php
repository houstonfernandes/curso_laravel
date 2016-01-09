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
    return view('welcome');
});

//meus testes
Route::get('welcome', 'Welcome@index');
Route::get('category', 'CategoryController@listar');

// admin/categories: Deve apontar para o controller AdminCategoriesController e para action index
Route::get('admin/categories', 'AdminCategoriesController@index');
// admin/products: Deve apontar para o controller AdminProductsController e para action index
Route::get('admin/products', 'AdminProductsController@index');

