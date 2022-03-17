@extends('layouts.not_logged_in')
 
@section('content')
<div class="login-img">
 <div class="container">
    <div class="wrapper">
      <h1>ユーザー登録フォーム</h1>
      <form method ="POST" action="{{route('register')}}">
        @csrf
        <div class="form-group">
          <label for="inputName">ユーザー</label>
          <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="ユーザー名">
          <small id="nameHelp" class="form-text text-muted">ユーザー名は1文字以上16文字以内。</small>
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
  </div>
</div>
@endsection