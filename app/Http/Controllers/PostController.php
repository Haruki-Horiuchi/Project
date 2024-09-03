<?php

namespace App\Http\Controllers;

use App\Models\Post; //追加
//use Illuminate\Http\Request; //comment outed on 7-04
use App\Http\Requests\PostRequest;

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

    //7-04--------------
    public function create()
    {
        return view('posts.create');
    }

    //public function store(Request $request, Post $post) //comment outed on 7-04
    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    //------------------

    //7-05--------------
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    //------------------
    
    //------------------
}
?>