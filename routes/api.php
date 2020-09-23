<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/siswa','SiswaApiController@create');
Route::get('/siswa','SiswaApiController@view');
Route::put('/siswa/{id}','SiswaApiController@update');
Route::delete('/siswa/{id}','SiswaApiController@delete');
// Route::get('/siswa/hapus/{id}','SiswaController@hapus');
// Route::get('/siswa/tambah','SiswaController@tambah');
// Route::post('/siswa/store','SiswaController@store');
// Route::get('/siswa/edit/{id}','SiswaController@edit');
// Route::post('/siswa/update','SiswaController@update');
// Auth::routes();

// Route::get('/home', 'SiswaController@index')->name('home');

// Route::get('activate/{token}', 'Auth\SiswaController@activate')
//     ->name('activate');
