<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <!--Bootstrap5.02-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('css/example.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    
    
</head>
<body>
    @yield('header')
 
    {{-- エラーメッセージを出力 --}}
    @foreach($errors->all() as $error)
      <p class="error">{{ $error }}</p>
    @endforeach
 
    {{-- 成功メッセージを出力 --}}
    @if (session()->has('success'))
        <div class="success">
            {{ session()->get('success') }}
        </div>
    @endif
    
    @yield('content')
    
    @yield('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
</body>
</html>