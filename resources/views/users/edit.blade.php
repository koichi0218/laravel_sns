@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
    <div class="container">
      <h1>プロフィール変更</h1>
      <form method ="POST" action="{{route('users.update',$user->id)}}">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="inputName">ユーザー名</label>
          <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{$user->name}}">
        </div>
        <div class="form-group">
          <label for="inputEmail">プロフィール</label>
          <input type="text" name="profile" class="form-control" id="inputprofile"  value="{{$user->profile}}">
        <button type="submit" class="btn btn-primary">更新</button>
      </form>
    </div>
@endsection