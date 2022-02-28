<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserImageRequest;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',[
           'title' => 'ユーザー情報', 
           'user' => $user,
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
}