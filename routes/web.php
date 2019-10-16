<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*** Rota Inicial para o Cadastro de Produtos */
Route::resource('/produtos', 'ProdutosController');

Route::get('produtos/mudarstatus/{id}', 'ProdutosController@bloquear');

