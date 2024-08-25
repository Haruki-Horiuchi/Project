<?php

namespace App\Http\Controllers;

use App\Models\Post; //追加
use Illuminate\Http\Request;

class PostController extends Controller
{
    //7-01--------------
    //public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    //{
    //    return $post->get();//$postの中身を戻り値にする。
    //}
    //------------------

    //7-02--------------
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        //getPaginateByLimit()はPost.phpで定義したメソッドです。
    }
    //------------------

    //7-03--------------
    /*
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    //------------------
}
?>