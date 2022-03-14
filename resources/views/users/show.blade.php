@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
<div class="container">
  <div class="row d-block mx-auto w-75">
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
        <li class="list-group-item">フォロー数: <a href="{{ route('follows.index')}}">{{$follow_user}}</a></li>
        <li class="list-group-item">フォロワー数:<a href="{{ route('follower.index')}}">{{$follower}}</a></li>
        <li class="list-group-item">いいね数: <a href="{{ route('likes.index')}}">{{$like_posts}}</a></li>
      </ul>
      <div class="text-right">
        <a href="{{ route('users.edit')}}" role="button" class="btn btn-outline-info">プロフィール変更</a>
        <a href="{{ route('users.edit_image')}}" role="button" class="btn btn-secondary">プロフィール画像変更</a>
      </div>
    </div>
  </div>
</div>
<h1>投稿一覧</h1>
<div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @forelse($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm h-100">
                @if($post->image !== '')
                  <a href="{{ route('posts.show', $post)}}"><img class="card-img-top" src="{{ \Storage::url($post->image) }}" alt="Card image cap"></a>
                @else
                  <img src="{{ asset('images/no_image.png') }}">
                @endif
                <div class="card-body align-text-bottom">
                  
                </div>
                <div class="card-footer">
                  <div class="liked">
                  <span class="like_toggle" data-post-id="{{ $post->id }}">{{ $post->isLikedBy(Auth::user()) ? '♥' : '♡' }}</span>
                  </div>
                  <p class="card-text">{{ $post->comment}}</p>
                  <p class="card-text">{{$post->user->name}}</p>
                  <small class="text-muted">{{$post->created_at}}</small>
                </div>
              </div>
            </div>
          @empty
            <p>投稿がありません</p>
          @endforelse
          </div>
        </div>
      </div>
@endsection