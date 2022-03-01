@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
    @forelse($posts as $post)
    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 shadow-sm">
                @if($post->image !== '')
                  <img class="card-img-top" src="{{ \Storage::url($post->image) }}" alt="Card image cap">
                @else
                  <img src="{{ asset('images/no_image.png') }}">
                @endif
                <div class="card-body">
  @if (!$post->isLikedBy(Auth::user()))
    <span class="likes">
        <i class="fas fa-heart like-toggle" data-review-id="{{ $post->id }}"></i>
      <span class="like-counter">{{$post->likes_count}}</span>
    </span><!-- /.likes -->
  @else
    <span class="likes">
        <i class="fas fa-heart heart like-toggle liked" data-review-id="{{ $post->id }}"></i>
      <span class="like-counter">{{$post->likes_count}}</span>
    </span><!-- /.likes -->
  @endif
                  <p class="card-text">{{$post->comment}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="card-body pt-0 pb-2 pl-3">
                      <div class="card-text">
                        <article-like>
                        </article-like>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    @empty
        <p>投稿がありません</p>
    @endforelse
@endsection