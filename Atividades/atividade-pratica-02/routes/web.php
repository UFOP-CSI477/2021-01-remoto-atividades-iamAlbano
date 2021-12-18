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

Route::get('/subjects', [ SubjectController::class, 'index'])->middleware('auth');

Route::get('/subjects/new', function () {
    return view('subjects.novo');
})->middleware('auth');

Route::post('/subjects', [ SubjectController::class, 'store'])->middleware('auth');

Route::get('/subjects/edit/{id}', [ SubjectController::class, 'edit'])->middleware('auth');
Route::post('/subjects/update/{id}', [ SubjectController::class, 'update'])->middleware('auth');
Route::get('/subjectsTable', [ SubjectController::class, 'table'])->middleware('auth');
Route::delete('/subjects/destroy/{id}', [SubjectController::class, 'destroy'])->middleware('auth');



Route::get('/requests', [ RequestController::class, 'index'])->middleware('auth');
Route::post('/requests', [ RequestController::class, 'store'])->middleware('auth');
Route::post('/requests/update/{id}', [ RequestController::class, 'update'])->middleware('auth');
Route::get('/requestsTable', [ RequestController::class, 'table'])->middleware('auth');
Route::delete('/requests/destroy/{id}', [RequestController::class, 'destroy'])->middleware('auth');
Route::get('/requests/edit/{id}', [ RequestController::class, 'edit'])->middleware('auth');

Route::get('/subjects/new', function () {
    $subjects = DB::table('subjects')->orderBy('name', 'asc')->get();
    return view('requests.novo', ['subjects' => $subjects]);
})->middleware('auth');



Route::get('/reports/users', function () {
    $users = DB::table('users')->orderBy('name', 'asc')->get();
    return view('reports.users', ['users' => $users]);
});


Route::get('/reports/requests', function () {
    $subjects = DB::table('subjects')->orderBy('name', 'asc')->get();
    $requests = DB::table('requests')->orderBy('date', 'asc')->get();
    return view('reports.requests-report', 
    ['subjects' => $subjects],
    ['requests' => $requests]);
});