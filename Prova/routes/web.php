<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeralController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\VacinasController;
use App\Http\Controllers\UnidadesController;

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
    return view('inicial', ['active' => 1]);
});

Route::get('/geral', [GeralController::class, 'index']);

Route::resource('/pessoas', PessoasController::class)->middleware('auth');
Route::get('/pessoasTable', [ PessoasController::class, 'table'])->middleware('auth');

Route::resource('/vacinas', VacinasController::class)->middleware('auth');
Route::get('/vacinasTable', [ VacinasController::class, 'table'])->middleware('auth');

Route::resource('/unidades', UnidadesController::class)->middleware('auth');
Route::get('/unidadesTable', [ UnidadesController::class, 'table'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('inicial', ['active' => 1]);
})->name('dashboard');
