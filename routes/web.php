<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスを使えるようにします。

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::get('/posts', [PostController::class, 'index']);

//7-02--------------
//Route::get('/', function() {
//    return view('posts.index');
//});
Route::get('/', [PostController::class, 'index']);
//------------------

//7-04--------------
/*
Route::get('/posts/{post}', [PostController::class,'show']);の上に書く。web.phpは上からルーティングを見ていき、当てはまるルーティングのものが呼び出す。
先にRoute::get('/posts/{post}', [PostController::class,'show']);を書くと{post}のところにcreateという文字列が入り、
showメソッドが呼び出されるという予期しない挙動になる
*/
Route::get('/posts/create', [PostController::class, 'create']);
//------------------

//7-03--------------
Route::get('/posts/{post}', [PostController::class ,'show']);
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
//------------------

Route::post('/posts', [PostController::class, 'store']); //7-04

Route::get('/posts/{post}/edit', [PostController::class, 'edit']); //7-05
Route::put('/posts/{post}', [PostController::class, 'update']); //7-05