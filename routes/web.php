<?php

use App\Http\Controllers\NoteController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', fn () => view('login'));
Route::post('/login', function (Request $request) {
    // ddd($request);
    $sanitized = $request->validate([
        "email" => ["email", "required"],
        "password" => ["required"],
    ]);
    // ddd($sanitized);
    if (Auth::attempt([
        "email" => $sanitized["email"],
        "password" => $sanitized["password"]
    ])) {
        // ddd(Auth::user());
        return "success";
    }
    return "you fucked up";
});
Route::get('/notes', [NoteController::class, 'getAll']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{id}', [NoteController::class, 'getById']);