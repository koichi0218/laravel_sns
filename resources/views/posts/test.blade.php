@forelse($posts as $post)
    <div class="album py-5 bg-light">
           <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"><title>カード画像のキャプション</title><rect fill="#55595c" width="100%" height="100%" /><text fill="#eceeef" dy=".3em" x="50%" y="50%">サムネイル</text></svg>
                          <div class="card-body">
                            <p class="card-text">{{$post->comment}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <small class="text-muted">{{$post->created_at}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@empty
    <p>投稿がありません</p>
@endforelse

  <h1>{{ $title }}</h1>
  <a href="{{ route('posts.create')}}">新規投稿</a>
  <ul>
    @forelse($posts as $post)
        <li>{{ $post->user->name}}: {{$post->comment}} ({{$post->created_at}})</li>
        [<a href="{{ route('posts.edit', $post)}}">編集</a>]
    @empty
        <li>書き込みがありません</li>
    @endforelse
  </ul>
  
  
<!doctype html>
<html lang="ja" >
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="album.css" rel="stylesheet">
  </head>
  <body >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>


<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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

<script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script><script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.3/assets/js/src/application.js"></script>
<script src="/docs/4.3/assets/js/src/search.js"></script>
<script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>
  </body>
</html>


    

  <body >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>