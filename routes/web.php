<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::resource('posts',\App\Http\Controllers\PostController::class);
Route::resource('user',\App\Http\Controllers\UserController::class);

Route::get('user/{user}/ban',[UserController::class,'ban'])->name('user.ban');
Route::put('user/{user}/banning',[UserController::class,'banuser'])->name('user.banuser');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
