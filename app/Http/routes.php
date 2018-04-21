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

Route::get('/user/dashboard', ['as'=>'dashboard', 'uses'=>'AppController@dashboard']);

/**
 * User Sales Module
 */
Route::get('/user/sales', ['as'=>'usersales', 'uses'=>'AppController@sales']);
Route::get('/user/sales/create', ['as'=>'createsale', 'uses'=>'SalesController@create']);
Route::post('/user/sales/store',['as'=>'storesale','uses'=>'SalesController@store']);
Route::get('/user/sales/{saleSlug}',['as'=>'sale_show','uses'=>'SalesController@show']);
Route::post('/user/sales/{saleId}/sale_edit',['as'=>'sale_edit','uses'=>'SalesController@edit']);

/**
 * User Product Module
 */
Route::post('/user/products/create_product',['as'=>'createProduct','uses'=>'ProductsController@store']);
Route::get('user/allproducts',['as'=>'allProducts','uses'=>'ProductsController@allProducts']);

Route::get('/sales/{saleSlug}','PublicViewController@showSale');
Route::get('/sales/{saleSlug}/{productId}','PublicViewController@showProduct');
Route::get('/', ['as'=>'home', 'uses'=>'GeneralController@index']);
Route::get('login', 'GeneralController@login');
Route::post('login', ['as'=>'login', 'uses'=>'GeneralController@fbLoginAction']);
Route::get('logout', ['as'=>'logout', 'uses'=>'GeneralController@logout']);
Route::get('user/allproducts','ProductsController@allProducts');






Route::get('/user/{saleId}/delete', 'SalesController@destroy');


Route::post('/user/products/{productId}/edit_product', 'ProductsController@edit');
Route::get('/user/products/{productId}/delete','ProductsController@destroy');
Route::get('/user/products/{productId}','ProductsController@show');

Route::get('/user/{productId}/changestatus','ProductsController@changeStatus');

Route::get('/user/{productId}/productimage', 'ProductsController@getImages');

Route::post('/user/send_message','ConversationsController@store');

Route::get('/sales/','PublicViewController@show');

/**
 * User Controller Module
 * 
 */

Route::post('/user/user_edit','UsersController@edit');

Route::get('/user/generatepdf/{saleId}','SalesController@generatePdf');

Route::get('/user/{userId}/getvisitstats','UsersController@saleView');

/**
 * Photo Controller Module
 */

Route::post('/user/{productId}/addphotos','PhotoController@store');
Route::delete('/user/photos/{photoId}', 'PhotoController@destroy');