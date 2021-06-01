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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])
    ->name('client.index');

Route::get('/client/{client}', [App\Http\Controllers\ClientController::class, 'show'])
    ->where('client', '[0-9]+')
    ->name('client.show');

Route::get('/client/nuevo', [App\Http\Controllers\ClientController::class, 'create'])->name('client.create');

Route::post('/clients', [App\Http\Controllers\ClientController::class, 'store']);

Route::get('/client/{client}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');

Route::put('/client/{client}', [App\Http\Controllers\ClientController::class, 'update']);

Route::delete('/client/{client}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('client.destroy');



Route::get('/cities', [App\Http\Controllers\CitiesController::class, 'index'])
    ->name('cities.index');

Route::get('/cities/{cities}', [App\Http\Controllers\CitiesController::class, 'show'])
    ->where('cities', '[0-9]+')
    ->name('cities.show');

Route::get('/cities/nuevo', [App\Http\Controllers\CitiesController::class, 'create'])->name('cities.create');

Route::post('/cities', [App\Http\Controllers\CitiesController::class, 'store']);

Route::get('/cities/{cities}/edit', [App\Http\Controllers\CitiesController::class, 'edit'])->name('cities.edit');

Route::put('/cities/{cities}', [App\Http\Controllers\CitiesController::class, 'update']);

Route::delete('/cities/{cities}', [App\Http\Controllers\CitiesController::class, 'destroy'])->name('cities.destroy');


Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');
Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->name('users.show');
Route::get('/user/nuevo', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/user/{user}/editar', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/user/{user}', [App\Http\Controllers\UserController::class, 'update']);
Route::delete('/user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');