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
        <div>
            @if(Auth::user()->isFollowing($user))
              <form method="post" action="{{route('follows.destroy', $user)}}" class="follow">
                @csrf
                @method('delete')
                <input type="submit" value="フォロー解除">
              </form>
            @else
              <form method="post" action="{{route('follows.store')}}" class="follow">
                @csrf
                <input type="hidden" name="follow_id" value="{{ $user->id }}">
                <input type="submit" value="フォロー">
              </form>
            @endif
        </div>
        <p class="card-text">コメント: {{ $post->comment}}</p>
        <p class="card-text">投稿者: <a href="{{ route('users.user_show', $post->user)}}">{{$post->user->name}}</a></p>
        <small class="text-muted">{{$post->created_at}}</small>
    </div>
</div>
@endsection