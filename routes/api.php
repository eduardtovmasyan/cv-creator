<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('user', 'UserController', [
    'only' => ['index', 'store', 'show', 'update', 'destroy']
]);

Route::post('/login', "LoginController@logIn");

Route::group(['middleware' => ['auth:api']], function() {
	Route::post('resume', 'ResumeController@store');
	Route::get('resume', 'ResumeController@show');
    Route::get('/export', 'ResumeController@exportPDF');
    Route::post('/logout', 'LoginController@logOut');
});
