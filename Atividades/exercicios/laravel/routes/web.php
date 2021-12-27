<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;


Route::get('/', function () {
    return view('main');
})->name('inicio');


Route::resource('/produtos', ProdutoController::class)->middleware('auth');
Route::get('/pesquisa-produto', [ProdutoController::class, 'pesquisa'])->middleware('auth');
Route::get('/procura-produto', [ProdutoController::class, 'procurar'])->middleware('auth');

Route::resource('/estados', EstadoController::class);
Route::get('/pesquisa-estado', [EstadoController::class, 'pesquisa'])->middleware('auth');
Route::get('/procura-estado', [EstadoController::class, 'procurar'])->middleware('auth');

Route::resource('/cidades', CidadeController::class)->middleware('auth');
Route::get('/pesquisa-cidade', [CidadeController::class, 'pesquisa'])->middleware('auth');
Route::get('/procura-cidade', [CidadeController::class, 'procurar'])->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
