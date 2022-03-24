@extends('layouts.default')
 
@section('header')
<nav class="navbar navbar-expand-lg navbar-light bg-light site-header sticky-top py-1">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('posts.index')}}">
      <img src="{{ asset('images/fav/logo.jpg') }}" width="250" height="50" class="d-inline-block align-text-top">
    </a>
    <button type="button" class="btn btn-outline-primary" onclick="location.href='{{ route('posts.create')}}'">作品を投稿</button>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('users.show', \Auth::user())}}">マイページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('likes.index')}}">お気に入り</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts.index')}}"> 投稿一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('terms.guide') }}"> このサイトについて</a>
        </li>
        <li class="nav-item">
          <form class="nav-link" action="{{ route('logout')}}" method="POST">
            @csrf
            <input type="submit" value="ログアウト" class="btn btn-secondary">
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection

@section('footer')
  <div class="footer container-fluid text-center">
    <ul class="list-unstyled d-md-flex justify-content-center pt-3">
        <li class="p-2"><a href="{{ route('terms.guide') }}" class="text-secondary">当サイトについて</a></li>
        <li class="p-2"><a href="{{ route('terms.rule') }}" class="text-secondary">利用規約</a></li>
        <li class="p-2"><a href="{{ route('terms.privacy')}}" class="text-secondary">プライバシーポリシー</a></li>
         <li class="p-2"><a href="{{ route('contacts.create')}}" class="text-secondary">お問い合わせ</a></li>
    </ul>
    <div class="pb-5">
      <small>Copyright © 2022 yurukaki All Rights Reserved.</small>
    </div>
  </div>
  
@endsection