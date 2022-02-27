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
                <div>{{$post->user->name}}</div>
                @if($post->image !== '')
                  <img class="card-img-top" src="{{ \Storage::url($post->image) }}" alt="Card image cap">
                @else
                  <img src="{{ asset('images/no_image.png') }}">
                @endif
                <div class="card-body">
                  <p class="card-text">{{$post->comment}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" onClick=location.href="{{ route('posts.edit', $post)}}">編集</button>
                    </div>
                    <a href="{{ route('posts.edit_image', $post) }}">画像を変更</a>
                    <form method="post" class="delete" action="{{ route('posts.destroy', $post) }}">
                      @csrf
                      @method('delete')
                      <input type="submit" value="削除">
                    </form>
                    <small class="text-muted">{{$post->created_at}}</small>
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