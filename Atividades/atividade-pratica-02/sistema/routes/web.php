<?php

require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [SubjectController::class, 'index']);
Route::resource('/tipos', SubjectController::class)->middleware(['auth']);


Route::get('/relatorio-usuarios', function () {
    $users = DB::table('users')->orderBy('name', 'asc')->get();
    return view('users.todos', ['users' => $users]);
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

