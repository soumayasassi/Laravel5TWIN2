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

Route::get('/page1', function () {
    return "<h1> first page </h1>";
});


Route::get('/page2/{name?}', function ($name=null) {
    return "<h1> Welcome  $name  </h1>";
})->where('name', '[A-Za-z]+');


Route::get('/page3/{id?}', function ($id=null) {
    return "<h1> user Number $id   </h1>";
})->where('id', '[0-9]+');

Route::get('/home', [\App\Http\Controllers\HomeController::class , 'index'] );
Route::get('/show/{name}', [\App\Http\Controllers\HomeController::class , 'show'] );
