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
});

Route::get('/login', 'UserController@loginForm')->name('login');
Route::post('/login', 'UserController@login')->name('login.submit');
Route::get('/register', 'UserController@registerForm')->name('register');
Route::post('/register', 'UserController@register')->name('register.submit');
Route::post('/logout', 'UserController@logout')->name('logout');
