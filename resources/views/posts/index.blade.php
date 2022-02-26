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
                  //ここに画像をいれる
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">{{$post->comment}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
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