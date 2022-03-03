@extends('layouts.default')
 
@section('header')
<header>
    <ul class="header_nav">
        <li>
          <a href="{{ route('posts.index') }}">
            投稿一覧
          </a>
        </li>
        <li>
          <a href="">
            いいねリスト
          </a>
        </li>
        <li>
          <a href="{{ route('users.show',\Auth::user()->id) }}">
          ユーザープロフィール
          </a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="ログアウト">
          </form>
        </li>
        <li>{{\Auth::user()->name}}</li>
    </ul>
</header>
@endsection