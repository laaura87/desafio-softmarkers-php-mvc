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
    return redirect('/contacts');
});


Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/contacts', "ContactController@index");
    Route::get('/contacts/signup', "ContactController@signup");
    Route::get('/contacts/{id}', "ContactController@show");
    Route::get('/contacts/{id}/edit', "ContactController@edit");

    Route::put('/contacts/{id}', "ContactController@update");
    Route::post('/contacts', "ContactController@create");
    Route::delete('/contacts/{id}', "ContactController@delete");
});


