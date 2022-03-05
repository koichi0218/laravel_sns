@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">タイトル</h1>
          <p class="lead text-muted">内容や作成者など, 以下のコレクションに関する簡単な説明文を書きましょう。</p>
          <p>
            <a href="#" class="btn btn-primary my-2">メインアクション</a>
            <a href="#" class="btn btn-secondary my-2">サブアクション</a>
          </p>
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
                  <a class="like_button">{{ $post->isLikedBy(Auth::user()) ? '♥' : '♡' }}</a>
                  <form method="post" class="like" action="{{ route('posts.toggle_like', $post) }}">
                    @csrf
                    @method('patch')
                  </form>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text">123</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <!-- <small class="text-muted">9 mins</small> -->
                    <small class="text-muted">9分</small>
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
    
    <script src="../../assets/js/vendor/holder.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
      window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script><script src="/docs/4.5/assets/js/vendor/anchor.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/clipboard.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/bs-custom-file-input.min.js"></script>
    <script src="/docs/4.5/assets/js/src/application.js"></script>
    <script src="/docs/4.5/assets/js/src/search.js"></script>
    <script src="/docs/4.5/assets/js/src/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    /* global $ */
     $('.like_button').on('click', (event) => {
      $(event.currentTarget).next().submit();
      })
</script>
@endsection

<header>
    <ul class="header_nav">
        <li>
          <a href="{{ route('posts.index') }}">
            投稿一覧
          </a>
        </li>
        <li>
          <a href="">
            いいねリスト
          </a>
        </li>
        <li>
          <a href="{{ route('users.show',\Auth::user()->id) }}">
          ユーザープロフィール
          </a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="ログアウト">
          </form>
        </li>
        <li>{{\Auth::user()->name}}</li>
    </ul>
</header>
