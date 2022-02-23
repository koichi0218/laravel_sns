@extends('layouts.not_logged_in')
 
@section('content')

 <div class="container">
      <h1>ユーザー登録フォーム</h1>
      <form method ="POST" action="{{route('register')}}">
        @csrf
        <div class="form-group">
          <label for="inputName">ユーザー</label>
          <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="ユーザー名">
          <small id="nameHelp" class="form-text text-muted">6文字以上16文字以内の半角英数字。記号等は使用できません</small>
        </div>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="メールアドレス">
          <small id="emailHelp" class="form-text text-muted">メールが受信可能なメールアドレス</small>
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <input type="password" name="password" class="form-control" id="inputPassword"  aria-describedby="passwordHelp" placeholder="パスワード">
          <small id="passwordHelp" class="form-text text-muted">パスワードは8文字以上32文字以内</small>
        </div>
        <div class="form-group">
          <label for="inputPasswordAgain">Password（確認）</label>
          <input type="password" name="password_confirmation" class="form-control" id="inputPasswordAgain" placeholder="パスワード（確認）" required="required">
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
@endsection