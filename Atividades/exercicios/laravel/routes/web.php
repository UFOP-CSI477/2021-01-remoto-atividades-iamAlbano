<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstadoController;


Route::get('/', function () {
    return view('main');
})->name('inicio');

Route::resource('/estados', EstadoController::class);

Route::resource('/produtos', ProdutoController::class);

Route::get('/pesquisa-produto', [ProdutoController::class, 'pesquisa']);
Route::get('/procura-produto', [ProdutoController::class, 'procurar']);

Route::get('/pesquisa-estado', [EstadoController::class, 'pesquisa']);
Route::get('/procura-estado', [EstadoController::class, 'procurar']);