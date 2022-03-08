@extends('layouts.default')
 
@section('header')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('posts.index')}}">
      <img src="{{ asset('images/fav/favicon2.png') }}"  width="30" height="24" class="d-inline-block align-text-top">
      サイト名
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">マイページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">お気に入り</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> 投稿一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">このサイトについて</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection