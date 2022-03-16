@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')

<body class="bg-white">
<div class="container">
<div class="main container-fluid">
    <div class="row bg-light text-dark py-5">
        <div class="col-md-8 offset-md-2">
            <h2 class="fs-1 mb-5 text-center fw-bold">お問い合わせ</h2>
            <form method="POST" action="{{ route('contacts.store')}}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="名前（必須）" value="">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="email" placeholder="メールアドレス（必須）" value="">
                </div>
                <div class="mb-4">
                    <textarea class="form-control" name="message" rows="5" placeholder="メッセージを入力してください"></textarea>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" required>
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      利用規約に同意します。<a href="{{ route('terms.rule')}}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline text-dark">プライバシーポリシーはこちら</a>
                    </label>
                  </div>
                <div class="text-center pt-4 col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
@endsection