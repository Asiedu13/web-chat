<?php

use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('/user', PersonController::class);
// Route::resource('/chat', ChatRoomController::class);
Route::get('/chat', [ChatRoomController::class, 'index'])->name('chat.index');
Route::post('/chat/sendMessage', [ChatRoomController::class, 'sendMessage'])->name('chat.sendMessage');

Route::post('/chat/sending', [ChatRoomController::class, 'sending']);
