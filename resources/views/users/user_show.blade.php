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
        <h5 class="card-title">ユーザー名: {{$user->name}}</h5>
        <p class="card-text">プロフィール: {{$user->profile}}</p>
      </div>
    </div>
  </div>
</div>
<div class="album py-5 bg-light">
  <h1>{{$user->name}}の投稿一覧</h1>
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