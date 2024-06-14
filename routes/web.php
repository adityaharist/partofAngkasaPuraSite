<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Site\HomeController;

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

// Route::get('/home', function () {
//     return view('home', ['name' => 'Aditya Harist']);
// });

// Route::get('/home', 'HomeController@index')->name('home');

// routes/web.php
Route::get('/map', [MapController::class, 'index']);

Route::get('/home', [HomeController::class, 'home']);