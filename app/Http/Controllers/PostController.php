<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //投稿一覧
    public function index()
    {
        $user = \Auth::user();
        $posts = $user->posts;
        return view('posts.index',[
           'title' => '投稿一覧', 
           'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //新規投稿
    public function create()
    {
        return view('posts.create',[
           'title' => '新規投稿', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //投稿追加処理
    public function store(PostRequest $request)
    {
        Post::create([
           'user_id' => \Auth::user()->id,
           'comment' => $request->comment,
           'image' => '',
        ]);
        session()->flash('success', '投稿を追加しました');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //投稿詳細
    public function show($id)
    {
        return view('posts.show',[
           'title' => '投稿詳細', 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //投稿編集
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',[
           'title' => '投稿編集', 
           'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //投稿更新
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only(['comment']));
        session()->flash('success', '投稿を編集しました');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //投稿削除
    public function destroy($id)
    {
        //
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
