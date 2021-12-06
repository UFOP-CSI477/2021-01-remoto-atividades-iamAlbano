<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;


Route::get('/', function () {
    return view('main');
})->name('inicio');


Route::resource('/produtos', ProdutoController::class);
Route::get('/pesquisa-produto', [ProdutoController::class, 'pesquisa']);
Route::get('/procura-produto', [ProdutoController::class, 'procurar']);

Route::resource('/estados', EstadoController::class);
Route::get('/pesquisa-estado', [EstadoController::class, 'pesquisa']);
Route::get('/procura-estado', [EstadoController::class, 'procurar']);

Route::resource('/cidades', CidadeController::class);
Route::get('/pesquisa-cidade', [CidadeController::class, 'pesquisa']);
Route::get('/procura-cidade', [CidadeController::class, 'procurar']);