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


Route::resource('/', 'Externo\IndexController', ['only' => ['index', 'store']]);

Route::group(['prefix' => 'autenticacao'], function () {
    Route::resource('login', 'Externo\LoginController', ['only' => ['index', 'store']]);
    Route::get('/logout', ['as' => 'autenticacao.logout', 'uses' => 'Externo\LoginController@destroy']);
});

Route::resource('carrinho', 'Externo\CarrinhoController');
Route::resource('meu-carrinho', 'Externo\MeuCarrinhoController');

Route::group(['prefix' => 'sistema', 'middleware' => 'auth'], function () {
    Route::resource('produto', 'Sistema\ProdutoController');
    Route::resource('dashboard', 'Sistema\DashboardController');
    Route::resource('fatura', 'Sistema\FaturaController');
});
