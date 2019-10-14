<?php

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::middleware([])
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('/index', 'IndexController@index')->name('index');

        Route::get('/menu', 'System\MenuController@index')->name('menu');
        Route::get('/menu/show', 'System\MenuController@show')->name('menu.show');
    });
