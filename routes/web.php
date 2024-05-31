<?php

use App\Http\Controllers\Admin\CharacterAdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('main');
});

Route::get('/characters', [CharacterController::class, 'show']);
Route::get('/character-page/{id}', [CharacterController::class, 'showchar']);

Route::get('/music-page', [MusicController::class, 'show']);



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-post', [AuthController::class, 'customLogin'])->name('login');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin-panel'], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/main', [AuthController::class, 'admin'])->name('admin');
    Route::get('/characters', [CharacterAdController::class, 'index'])->name('chars');
    Route::get('/characters/{id}', [CharacterAdController::class, 'show'])->name('char');
    Route::post('/characters/{id}', [CharacterAdController::class, 'update'])->name('char-update');


    Route::group(['middleware' => ['verified']], function ()
    {
        Route::get('/create', [CharacterAdController::class, 'create'])->name('add');
        Route::post('/create/add', [CharacterAdController::class, 'store'])->name('add-char');
        Route::delete('/delete-char/{id}', [CharacterAdController::class, 'destroy'])->name('char-delete');
    });

});
