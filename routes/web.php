<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>['auth','admin'] ], function () {
Route::resource('/roles', App\Http\Controllers\RolController::class);
Route::resource('/modulos', App\Http\Controllers\ModuloController::class);
Route::resource('/permisos', App\Http\Controllers\PermisoController::class);
});