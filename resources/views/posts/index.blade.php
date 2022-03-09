@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
    <main role="main">
<!--<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">-->
  <!-- スライドさせる画像の設定 -->
<!--  @foreach($posts as $post)-->
<!--  <div class="carousel-inner">-->
<!--    <div class="carousel-item active">-->
<!--      <img src="{{ \Storage::url($post->image) }}" class="d-block w-100">-->
<!--    </div><!-- /.carousel-item -->
<!--  </div><!-- /.carousel-inner -->
<!--  @endforeach-->
<!--</div><!-- /.carousel -->
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
    </main>
@endsection