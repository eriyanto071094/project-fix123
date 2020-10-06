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
Route::post('/token','SiswaApiController@token_create');
Route::post('/register','SiswaApiController@register');
Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Api\ResetPasswordController@reset');
Route::get('/book','SiswaApiController@viewBook');
Route::post('/book','SiswaApiController@createBook');
Route::put('/book/{id}','SiswaApiController@updateBook');
Route::delete('/book/{id}','SiswaApiController@deleteBook');
Route::get('/rak','SiswaApiController@viewRak');
Route::post('/rak','SiswaApiController@createRak');
Route::put('/rak/{id}','SiswaApiController@updateRak');
Route::delete('/rak/{id}','SiswaApiController@deleteRak');
Route::get('/category','SiswaApiController@viewCategory');
Route::post('/category','SiswaApiController@createCategory');
Route::put('/category/{id}','SiswaApiController@updateCategory');
Route::delete('/category/{id}','SiswaApiController@deleteCategory');
// Route::get('/siswa/hapus/{id}','SiswaController@hapus');
// Route::get('/siswa/tambah','SiswaController@tambah');
// Route::post('/siswa/store','SiswaController@store');
// Route::get('/siswa/edit/{id}','SiswaController@edit');
// Route::post('/siswa/update','SiswaController@update');
// Auth::routes();

// Route::get('/home', 'SiswaController@index')->name('home');

// Route::get('activate/{token}', 'Auth\SiswaController@activate')
//     ->name('activate');
Route::post ('/auth', function(Request $request) {
    $valid= Auth::attempt($request->all());

    if($valid){

            $rules = [
                'email'    => 'required',
                'password'    => 'required|min:6',
            ];

            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }

            $user =  Auth::user();
            $user->api_token = str_random(60);
            $user->save();
            return response()->json(
                [
                    "message" => "Login Berhasil",
                    "data" => $user
                ]
             );
            // return $user;
    }

    return response()->json([
        'message' => 'Email & Password doeasn\'t match'
    ], 404);

}



);