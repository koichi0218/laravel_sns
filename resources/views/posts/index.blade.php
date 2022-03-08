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
                  <p class="card-text">{{ $post->comment}}</p>
                  <p class="card-text">{{$post->user->name}}</p>
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
    
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(function () {
      let like = $('.like_toggle');
      let likePostId;
      like.on('click', function () {
        let $this = $(this);
        likePostId = $this.data('post-id');
        //ajax処理スタート
        $.ajax({
          // headers: {
          // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')-->
          // },
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