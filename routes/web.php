<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('login', [AuthController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/login', function () {
//     if (auth()->check()) {
//         return redirect('/');
//     }
//     return view('layouts.login');
// })->name('login');

Route::get('/register', function () {
    if (auth()->check()) {
        return redirect('/');
    }
    return view('layouts.register');
})->name('register');

