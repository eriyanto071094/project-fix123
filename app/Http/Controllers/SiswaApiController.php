<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Book;
use App\User;
use App\Rak;
use App\Category;
use Validator;
use Illuminate\Support\Str;

class SiswaApiController extends Controller
{
    function create(Request $request)
    {
        $siswa = new Siswa();
            
        $rules = [
            'nama_siswa'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $siswa->nis = $request->input('nis');
        $siswa->nama_siswa = $request->input('nama_siswa');
        $siswa->alamat = $request->input('alamat');
        $siswa->no_hp = $request->input('no_hp');

        $siswa->save();
        return response()->json($siswa);
    }

    function view(Request $request)
    {
        $siswa = Siswa::all();
        return response()->json($siswa);
    }

    function update($id, Request $request)
    {
        $siswa = Siswa::where('id', $id)->first();
        if($siswa){
            $siswa->nis = $request->nis ? $request->nis : $siswa->nis;
            $siswa->nama_siswa = $request->nama_siswa ? $request->nama_siswa : $siswa->nama_siswa;
            $siswa->alamat = $request->alamat ? $request->alamat : $siswa->alamat;
            $siswa->no_hp = $request->no_hp ? $request->no_hp : $siswa->no_hp;
            
            $siswa->save();
            return response()->json(
                [
                    "message" => "no id berhasil diupdate " . $id,
                    "data" => $siswa
                ]
             );
        };
    }

    function delete($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        if(is_null($siswa)){
            return response()->json( ' id : required | Harus Ada ditabel Siswa ');
        }else{
            if($siswa){
                $siswa->delete();
                return response()->json(
                    [
                        "message" => "Data berhasil dihapus " . $id, 200
                    ]
                );
            };
        }
    }

    public function token_create(Request $request)
    {
        // $response = $client->request('POST', '/api/token', [
        //     'headers' => [
        //         'Authorization' => 'Bearer '.$token,
        //         'Accept' => 'application/json',
        //     ],
        // ]);

        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }

    public function register(Request $request)
    {
        try{
        $rules = [
            'email'    => 'required',
            'password'    => 'required|min:6',
            'name'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $data = $request->all();
        $data['api_token'] = str_random (60);
        $data['password'] = bcrypt($data['password']);

        $user= User::create($data);
        return response()->json(
            [
                "message" => "Registrasi Berhasil",
                "data" => $data
            ]
         );
        
        return $request->all();
        }catch (\Exception $exception){
            return response([
                'message' => $exception->getMessage()
            ]);
        }
    }

    function viewBook(Request $request)
    {
        $book = Book::all();
        return response()->json($book);
    }

    function createBook(Request $request)
    {
        $book = new Book();
            
        $rules = [
            'isbn'    => 'required',
            'title'    => 'required',
            'author'    => 'required',
            'total_page'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $book->isbn = $request->input('isbn');
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->total_page = $request->input('total_page');
        $book->categories = $request->input('categories');

        $book->save();
        return response()->json(
            [
                "message" => "Data berhasil disimpan "
            ], 200
        );
    }

    function updateBook($id, Request $request)
    {
        $book = Book::where('id', $id)->first();
        if(is_null($book)){
            return response()->json( ' id : required | Harus Ada ditabel Buku ');
        }else{
            if($book){
                $book = Book::where('id', $id)->first();
                if($book){
                    $book->isbn = $request->isbn ? $request->isbn : $book->isbn;
                    $book->title = $request->title ? $request->title : $book->title;
                    $book->author = $request->author ? $request->author : $book->author;
                    $book->total_page = $request->total_page ? $request->total_page : $book->total_page;
                    $book->categories = $request->categories ? $request->categories : $book->categories;

                    $book->save();
                    return response()->json(
                        [
                            "message" => "no id berhasil diupdate " . $id,
                            "data" => $book
                        ]
                    );
                };
            };
        }
    }

    function deleteBook($id)
    {
        $book = Book::where('id', $id)->first();
        if(is_null($book)){
            return response()->json( ' id : required | Harus Ada ditabel book ');
        }else{
            if($book){
                $book->delete();
                return response()->json(
                    [
                        "message" => "Data berhasil dihapus " . $id, 200
                    ]
                );
            };
        }
    }

    function viewRak(Request $request)
    {
        $rak = Rak::all();
        return response()->json($rak);
    }

    function createRak(Request $request)
    {
        $rak = new Rak();
            
        $rules = [
            'nama_rak'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $rak->nama_rak = $request->input('nama_rak');

        $rak->save();
        return response()->json(
            [
                "message" => "Data berhasil disimpan "
            ], 200
        );
    }

    function updateRak($id, Request $request)
    {
        $rak = Rak::where('id', $id)->first();
        if(is_null($rak)){
            return response()->json( ' id : required | Harus Ada ditabel Rak ');
        }else{
            if($rak){
                $rak = rak::where('id', $id)->first();
                if($rak){
                    $rak->nama_rak = $request->nama_rak ? $request->nama_rak : $rak->nama_rak;

                    $rak->save();
                    return response()->json(
                        [
                            "message" => "no id berhasil diupdate " . $id,
                            "data" => $rak
                        ]
                    );
                };
            };
        }
    }

    function deleteRak($id)
    {
        $rak = Rak::where('id', $id)->first();
        if(is_null($rak)){
            return response()->json( ' id : required | Harus Ada ditabel rak ');
        }else{
            if($rak){
                $rak->delete();
                return response()->json(
                    [
                        "message" => "Data berhasil dihapus " . $id
                    ]
                );
            };
        }
    }

    function viewCategory(Request $request)
    {
        $category = Category::all();
        return response()->json($category);
    }

    function createCategory(Request $request)
    {
        $category = new Category();
            
        $rules = [
            'nama_category'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $category->nama_category = $request->input('nama_category');

        $category->save();
        return response()->json(
            [
                "message" => "Data berhasil disimpan "
            ], 200
        );
    }

    function updateCategory($id, Request $request)
    {
        $category = Category::where('id', $id)->first();
        if(is_null($category)){
            return response()->json( ' id : required | Harus Ada ditabel category ');
        }else{
            if($category){
                $category = Category::where('id', $id)->first();
                if($category){
                    $category->nama_category = $request->nama_category ? $request->nama_category : $category->nama_category;

                    $category->save();
                    return response()->json(
                        [
                            "message" => "no id berhasil diupdate " . $id,
                            "data" => $category
                        ]
                    );
                };
            };
        }
    }

    function deleteCategory($id)
    {
        $category = Category::where('id', $id)->first();
        if(is_null($category)){
            return response()->json( ' id : required | Harus Ada ditabel category ');
        }else{
            if($category){
                $category->delete();
                return response()->json(
                    [
                        "message" => "Data berhasil dihapus " . $id
                    ]
                );
            };
        }
    }

}
