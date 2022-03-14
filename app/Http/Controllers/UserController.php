<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserImageRequest;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', '=', $user->id)->get();
        $follow_user = Follow::where('user_id', '=', $user->id)->count();
        $follower = \Auth::user()->followers->count();
        $like_posts = \Auth::user()->likeposts->count();
        return view('users.show',[
           'title' => 'マイプロフィール', 
           'user' => $user,
           'posts' => $posts,
           'follow_user' => $follow_user,
           'follower' => $follower,
           'like_posts' => $like_posts,
        ]);
    }
    
    public function user_show($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', '=', $user->id)->get();
        return view('users.user_show',[
          'title' => 'ユーザー情報', 
          'user' => $user,
          'posts' => $posts,
        ]);
    }
    
    public function edit()
    {
        $user = \Auth::user();
        return view('users.edit',[
           'title' => 'プロフィール変更', 
           'user' => $user,
        ]);
    }
    
    public function update(UserRequest $request){
        $user = \Auth::user();
        $user->update($request->only(['name', 'profile']));
        session()->flash('success', 'プロフィールを変更しました。');
        return redirect()->route('users.show', $user);
    }
    
     public function editImage()
    {
        $user = \Auth::user();
        return view('users.edit_image',[
           'title' => 'プロフィール画像変更', 
           'user' => $user,
        ]);
    }
    
    public function updateImage(UserImageRequest $request){
        $user = \Auth::user();
        //画像投稿処理
        $path = '';
        $image = $request->file('image');
        if( isset($image) === true ){
            // publicディスク(storage/app/public/)のuserssディレクトリに保存
            $path = $image->store('users', 'public');
        }
        // 変更前の画像の削除
        if($user->image !== ''){
          \Storage::disk('public')->delete(\Storage::url($user->image));
        }
 
        $user->update([
          'image' => $path,
        ]);
 
        session()->flash('success', '画像を変更しました');
        return redirect()->route('users.show', $user);
    }
    
     public function __construct()
    {
        $this->middleware('auth');
    }
}