@extends('layouts.logged_in')
 
@section('content')
<div class="container">
    <div class="card mb-3">
    <h2>現在の画像</h2>
        @if($user->image !== '')
            <img src="{{ \Storage::url($user->image) }}" class="img-fluid" alt="Responsive image">
        @else
            画像はありません。
        @endif
        <form method="POST" action="{{ route('users.update_image') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label>
                    画像を選択:
                    <input type="file" name="image">
                </label>
            </div>
            <input type="submit" value="更新">
        </form>
    </div>
</div>
@endsection