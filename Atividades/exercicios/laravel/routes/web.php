<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    
    return view('main');
});

Route::resource('/produtos', ProdutoController::class);

Route::get('/todos-produtos', function () {
    
    return view('produtos.todos-produtos');
});

Route::get('/pesquisa-produto', function () {
    
    return view('produtos.pesquisa');
});

Route::get('/produtos/{id}', function ($id) {
    $produto = Produto::find($id);
    return view('visualizar', ['produto' => $produto]);
});
