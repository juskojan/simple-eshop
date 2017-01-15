<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', 'ProductsController@fetch');

Route::get('/objednavky', 'OrderController@fetch');


Route::post('products/add', 'ProductsController@addProduct');
Route::post('products/update', 'ProductsController@updateProduct');

Route::get('/products/delete/{id}','ProductsController@delete');
Route::get('/products/edit/{id}','ProductsController@edit');

Route::get('/objednavky/delete/{id}','OrderController@delete');
Route::get('/objednavky/edit/{id}','OrderController@edit');
Route::get('/objednavky/view/{id}','OrderController@view');
Route::get('/objednavky/add','OrderController@add');
Route::post('/objednavky/create', 'OrderController@create');

Route::post('objednavky/update', 'OrderController@updatehead');
Route::post('/objednavky/updatep', 'OrderController@updateproducts');

Route::post('/objednavky/addtopr', 'OrderController@addtoproducts');



