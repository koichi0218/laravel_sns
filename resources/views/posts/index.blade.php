@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">タイトル</h1>
          <p class="lead text-muted">内容や作成者など, 以下のコレクションに関する簡単な説明文を書きましょう。</p>
        </div>
      </section>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @forelse($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                @if($post->image !== '')
                  <img class="card-img-top" src="{{ \Storage::url($post->image) }}" alt="Card image cap">
                @else
                  <img src="{{ asset('images/no_image.png') }}">
                @endif
                <div class="card-body">
                  <div class="liked">
                  <span class="like_toggle" data-post-id="{{ $post->id }}">{{ $post->isLikedBy(Auth::user()) ? '♥' : '♡' }}</span>
                  </div>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text">123</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <!-- <small class="text-muted">9 mins</small> -->
                    <small class="text-muted">{{$post->created_at}}</small>
                  </div>
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
  <script>

    $(function () {
    let like = $('.like_toggle');
    let likePostId;
    like.on('click', function () {
      let $this = $(this);
      likePostId = $this.data('post-id');
      //ajax処理スタート
      $.ajax({
        //headers: {
          //'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        //},
        url: '/posts/' + likePostId + '/toggle_like_api',
        method: 'GET',
        data: {
          'post_id': likePostId
        },
      })
      //通信成功した時の処理
      .done(function (data) {
        $this.toggleClass('liked');
        console.log('done');
        console.log(data);
        $this.text(data === 'like' ? '♥' : '♡');
      })
      //通信失敗した時の処理
      .fail(function () {
        console.log('fail'); 
      });
    });
  });
  </script>
@endsection