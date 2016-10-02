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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/produtos', 'ProductsController@index')->name('produtos');
Route::get('/market', 'MarketController@index')->name('market');

Route::get('/market', 'MarketController@index')->name('market');
Route::post('/add-carrinho', 'MarketController@addCarrinho')->name('add-carrinho');
Route::get('mostra-carrinho', 'MarketController@mostraCarrinho')->name('mostra-carrinho');

Route::resource('estudantes', 'StudentController');