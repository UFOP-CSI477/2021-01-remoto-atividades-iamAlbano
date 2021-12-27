<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\SellingController;

Route::get('/', function () {
    return redirect('/login');
});

//Pessoas
Route::get('/pessoas', [PersonController::class, 'index'])->middleware('auth');
Route::post('/pessoas', [PersonController::class, 'store'])->middleware('auth');
Route::delete('/pessoas/{id}', [PersonController::class, 'destroy'])->middleware('auth');
Route::put('/pessoas/update/{id}', [PersonController::class, 'update'])->middleware('auth');
Route::get('/pessoas/table', [PersonController::class, 'table'])->middleware('auth');


//Produtos
Route::get('/produtos', [ProductController::class, 'index'])->middleware('auth');
Route::post('/produtos', [ProductController::class, 'store'])->middleware('auth');
Route::post('/produtos/update_categories', [ProductController::class, 'update_categories'])->middleware('auth');
Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::delete('/produtos/destroy_category/{id}', [ProductController::class, 'destroy_category'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::get('/produtos/table', [ProductController::class, 'table'])->middleware('auth');
Route::get('/produtos/table_categories', [ProductController::class, 'table_categories'])->middleware('auth');

//Compras
Route::get('/compras', [BuyController::class, 'index'])->middleware('auth');
Route::get('/compras/table', [BuyController::class, 'table'])->middleware('auth');
Route::get('/compras/table_inputs', [BuyController::class, 'table_inputs'])->middleware('auth');
Route::post('/compras', [BuyController::class, 'store'])->middleware('auth');
Route::put('/compras/update/{id}', [BuyController::class, 'update'])->middleware('auth');
Route::delete('/compras/{id}', [BuyController::class, 'destroy'])->middleware('auth');

//Vendas
Route::get('/vendas', [SellingController::class, 'index'])->middleware('auth');
Route::get('/vendas/table', [SellingController::class, 'table'])->middleware('auth');
Route::get('/vendass/table_inputs', [SellingController::class, 'table_inputs'])->middleware('auth');
Route::post('/vendas', [SellingController::class, 'store'])->middleware('auth');
Route::put('/vendas/update/{id}', [SellingController::class, 'update'])->middleware('auth');
Route::delete('/vendas/{id}', [SellingController::class, 'destroy'])->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/pessoas');
})->name('dashboard');
