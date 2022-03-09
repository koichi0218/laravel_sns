@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <div class="card text-center">
  <div class="card-body">
    @if($post->image !== '')
       <img class="card-img-top" src="{{ \Storage::url($post->image) }}" alt="Card image cap">
    @else
        <img src="{{ asset('images/no_image.png') }}">
    @endif
  </div>
    <div class="card-footer">
        <div class="liked">
            <span class="like_toggle" data-post-id="{{ $post->id }}">{{ $post->isLikedBy(Auth::user()) ? '♥' : '♡' }}</span>
        </div>
        <p class="card-text">コメント: {{ $post->comment}}</p>
        <p class="card-text">投稿者: <a href="{{ route('users.show', $post->user_id)}}">{{$post->user->name}}</a></p>
        <small class="text-muted">{{$post->created_at}}</small>
    </div>
</div>
@endsection