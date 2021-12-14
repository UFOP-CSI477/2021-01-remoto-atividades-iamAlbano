<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SubjectController;

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
    $subjects = DB::table('subjects')->orderBy('name', 'asc')->get();
    return view('geral', ['subjects' => $subjects]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('geral');
})->name('dashboard');

Route::resource('/request', RequestController::class)->middleware('auth');

Route::resource('/subject', SubjectController::class)->middleware('auth');
Route::get('/subjects', [ SubjectController::class, 'index'])->middleware('auth');
Route::get('/subjectsTable', [ SubjectController::class, 'table'])->middleware('auth');