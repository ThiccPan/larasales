<?php

use App\Http\Controllers\NoteController;
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

Route::get('/', fn () => view('welcome'));

Route::get('/set', function () {
    $data = cache()->remember('data', 5, function () {
        var_dump("cached");
        return "data is stored";
    });
    return $data;
});

Route::get('/notes',[NoteController::class, 'getAll']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{id}', [NoteController::class, 'getById']);
