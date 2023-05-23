<?php

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
})->name('profile');

Route::get('/people', 'App\Http\Controllers\PeopleController@index');
Route::get('/people/{id}', 'App\Http\Controllers\PeopleController@show');
Route::post('/people', 'App\Http\Controllers\PeopleController@store');
Route::put('/people/{id}', 'App\Http\Controllers\PeopleController@update');
Route::delete('/people/{id}', 'App\Http\Controllers\PeopleController@destroy');