@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
<div class="container">
  <div class="row d-block mx-auto">
    <div class="card">
      @if($user->image !== '')
        <img class="bd-placeholder-img card-img-top" src="{{ \Storage::url($user->image) }}">
      @else
        <img src="{{ asset('images/no_user_image.png') }}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">{{$user->profile}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">フォロー数</li>
        <li class="list-group-item">フォロワー数</li>
        <li class="list-group-item">いいね数</li>
      </ul>
      <div class="text-right">
        <a href="{{ route('users.edit')}}" role="button" class="btn btn-outline-info">プロフィール変更</a>
        <a href="{{ route('users.edit_image')}}" role="button" class="btn btn-secondary">プロフィール画像変更</a>
      </div>
    </div>
  </div>
</div>
@endsection