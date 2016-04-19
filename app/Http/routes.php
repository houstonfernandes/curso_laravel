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
Route::group(['prefix'=>'admin', 'middleware'=>'auth.admin', 'as' => 'admin.'],function(){

    Route::group(['prefix'=>'products', 'as' => 'products.'], function(){
        get('/', ['as' => 'index', 'uses' => 'AdminProductsController@index']);
        post('/', ['as' => 'store', 'uses' => 'AdminProductsController@store']);
        get('create', ['as' => 'create', 'uses' => 'AdminProductsController@create']);
        get('retrieve/{id}',['as' => 'retrieve', 'uses' => 'AdminProductsController@retrieve']);
        get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminProductsController@edit']);
        put('update/{id}', ['as' => 'update', 'uses' => 'AdminProductsController@update']);//usar attr hidden name=_method value=PUT
        get('delete/{id}', ['as' => 'delete', 'uses' => 'AdminProductsController@delete']);//usar attr hidden name=_method value=DELETE
        get('create_image', ['as' => 'create_image', 'uses' => 'AdminProductsController@create_image']);

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

    Route::group(['prefix'=>'products_images', 'as' => 'products_images.'], function(){
        get('/{id}', ['as' => 'index', 'uses' => 'AdminProductsController@images']);
        get('create/{id}', ['as' => 'create', 'uses' => 'AdminProductsController@createImage']);
        post('store/{id}', ['as' => 'store', 'uses' => 'AdminProductsController@storeImage']);
        get('delete/{id}', ['as' => 'delete', 'uses' => 'AdminProductsController@deleteImage']);
    });

    Route::group(['prefix'=>'users', 'as' => 'users.'], function(){
        get('/', ['as' => 'index', 'uses' => 'AdminUsersController@index']);
    });

    Route::group(['prefix'=>'orders', 'as' => 'orders.'], function(){
        get('/', ['as' => 'index', 'uses' => 'AdminOrdersController@index']);
        get('view/{id}', ['as' => 'view', 'uses' => 'AdminOrdersController@view']);
        put('update_status/{id}', ['as' => 'update_status', 'uses' => 'AdminOrdersController@updateStatus']);
    });

});

Route::group(['prefix' => '/', 'as' => 'store.'], function()
{
    Route::pattern('qtd','[0-9]+');
    Route::get('home', ['as' =>'index', 'uses' => 'StoreController@index']);
    Route::get('/', ['as' =>'index', 'uses' => 'StoreController@index']);
    Route::get('category/{id}',['as' => 'category', 'uses' => 'StoreController@category']);
    Route::get('product/{id}',['as' => 'product', 'uses' => 'StoreController@product']);
    Route::get('tag/{id}',['as' => 'tag', 'uses' => 'StoreController@tag']);
    Route::get('cart',['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('cart/add/{id}',['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('cart/delete/{id}',['as' => 'cart.delete', 'uses' => 'CartController@delete']);
    Route::put('cart/update/{id}',['as' => 'cart.update', 'uses' => 'CartController@update']);
    Route::get('cart/clean',['as' => 'cart.clean', 'uses' => 'CartController@cleanCart']);

    //rotas com autenticacao
    Route::group(['middleware' => 'auth'], function()
    {
        Route::get('checkout/place_order',['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
        Route::get('account/orders',['as' => 'account.orders', 'uses' => 'AccountController@orders']);
        Route::get('checkout/retorno',['as' => 'checkout.retorno', 'uses' => 'CheckoutController@retornoPagSeguro']);
        Route::get('checkout/testePagseguro',['as' => 'checkout.testePagseguro', 'uses' => 'CheckoutController@testePagseguro']);
    });

});


//rotas de controllers - precisa especificar get ou post no prefixo do metodo dentro da classe
Route::controllers([
    'password' => 'Auth\PasswordController',
    'test' =>"TestController"
]);

Route::controller('auth', 'Auth\AuthController', [
    'getLogin' => 'auth.login',             //nome das rotas
    'getLogout' => 'auth.logout'
]);

Route::get('event', function(){ //teste chamar evento
    Illuminate\Support\Facades\Event::fire( new CodeCommerce\Events\CheckoutEvent());
});

/*Route::get('/', function () {
  return view('welcome');
});
*/
/*/meus testes
Route::get('welcome', 'Welcome@index');
Route::get('category', 'CategoryController@listar');
/* ex2
// admin/categories: Deve apontar para o controller AdminCategoriesController e para action index
Route::get('admin/categories', 'AdminCategoriesController@index');
// admin/products: Deve apontar para o controller AdminProductsController e para action index
Route::get('admin/products', 'AdminProductsController@index');
*/