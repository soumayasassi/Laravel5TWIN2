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

Route::get('/welcome', function () {
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
Route::get('/form', [\App\Http\Controllers\HomeController::class , 'form'] );
Route::get('/result', function(\Symfony\Component\HttpFoundation\Request $request)
{return $request->pseudo ;
}) ;
Route::middleware([\App\Http\Middleware\VerifAge::class])->group(function()
{
    Route::get('/result2/{age}', function(\Symfony\Component\HttpFoundation\Request $request)
    {
        return $request->age ;
    });

}) ;
Route::resource('product',\App\Http\Controllers\ProductController::class);
