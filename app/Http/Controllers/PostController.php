<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostImageRequest;

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
        $posts = Post::withCount('likes')->orderBy('id', 'desc')->paginate(20);
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
        //画像投稿処理
        $path = '';
        $image = $request->file('image');
        if( isset($image) === true){
            //publicディスク(storade/app/public)のphotosに保存
            $path = $image->store('photos', 'public');
        }
        
        
        Post::create([
           'user_id' => \Auth::user()->id,
           'comment' => $request->comment,
           'image' => $path,
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
        $post = Post::find($id);
        // 画像の削除
        if($post->image !== ''){
          \Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        \Session::flash('success','投稿を削除しました');
        return redirect()->route('posts.index');
    }
    
    public function editImage($id){
        $post = Post::find($id);
        return view('posts.edit_image',[
           'title' => '画像変更',
           'post' => $post,
        ]);
    }
    
    public function updateImage($id, PostImageRequest $request){
        //画像投稿処理
        $path = '';
        $image = $request->file('image');
 
        if( isset($image) === true ){
            // publicディスク(storage/app/public/)のphotosディレクトリに保存
            $path = $image->store('photos', 'public');
        }
        
        $post = Post::find($id);
        
        // 変更前の画像の削除
        if($post->image !== ''){
          // publicディスクから、該当の投稿画像($post->image)を削除
          \Storage::disk('public')->delete(\Storage::url($post->image));
        }
 
        $post->update([
          'image' => $path,
        ]);
 
        session()->flash('success', '画像を変更しました');
        return redirect()->route('posts.index');
    }
    
    
    // public function toggleLike($id){
    //       $user = \Auth::user();
    //       $post = Post::find($id);
 
    //       if($post->isLikedBy($user)){
    //           // いいねの取り消し
    //           $post->likes->where('user_id', $user->id)->first()->delete();
    //           \Session::flash('success', 'いいねを取り消しました');
    //       } else {
    //           // いいねを設定
    //           Like::create([
    //               'user_id' => $user->id,
    //               'post_id' => $post->id,
    //           ]);
    //           \Session::flash('success', 'いいねしました');
    //       }
    //       return redirect('/posts');
    //   }
    
    public function toggleLikeApi($id){
          $user = \Auth::user();
          $post = Post::find($id);
 
          if($post->isLikedBy($user)){
              // いいねの取り消し
              $post->likes->where('user_id', $user->id)->first()->delete();
              $result = 'notlike';
          } else {
              // いいねを設定
              Like::create([
                  'user_id' => $user->id,
                  'post_id' => $post->id,
              ]);
              $result = 'like';
          }
        return $result;
      }
    public function __construct()
    {
        $this->middleware('auth');
    }
}