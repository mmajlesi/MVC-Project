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

Route::get('/', 'AdvertisingController@get_index_advertisements');
Route::get('/advertisements', 'AdvertisingController@get_advertisements');

Route::post('/advertisements/search', 'AdvertisingController@search_advertisement');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/panel', 'UserController@panel');
    Route::get('/admin', 'UserController@admin');
    Route::post('/user/delete', 'UserController@delete_user');
    Route::post('advertisements/edit', 'AdvertisingController@edit_advertisement');
    Route::get('/messenger/{chat}', 'MessageController@getMessages');
    Route::get('/advertisement_info/{id}', 'AdvertisingController@get_advertisement');
    Route::post('/advertisement/add', 'AdvertisingController@add_advertisement');
    Route::get('/advertisement/purchase/{advertisement}', 'AdvertisingController@purchase_advertisement');
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
