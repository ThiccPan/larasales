<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/set', function () {
    $data = cache()->remember('data', 5, function () {
        var_dump("cached");
        return "data is stored";
    });
    return $data;
});

Route::get('/login', fn () => view('login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', [ReportController::class, 'index'])->middleware('auth');
Route::post('/report', [ReportController::class, 'add']);
Route::get('/report/{id}', [ReportController::class, 'getByID']);
Route::delete('/report/{id}', [ReportController::class, 'delete']);

Route::get('/notes', [NoteController::class, 'getAll']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{id}', [NoteController::class, 'getById']);
