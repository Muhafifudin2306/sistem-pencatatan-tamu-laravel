<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/store/visitor', [App\Http\Controllers\VisitorController::class, 'storeVisitor'])->name('storeVisitor');

Route::delete('/delete/visitor/{id}', [App\Http\Controllers\VisitorController::class, 'destroyVisitor'])->name('destroyVisitor');
