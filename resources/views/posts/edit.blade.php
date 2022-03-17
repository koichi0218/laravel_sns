@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <div class="container">
    <h1>{{ $title }}</h1>
    <form method="POST" action="{{ route('posts.update', $post)}}">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>
                コメント:
                <input type="text" name="comment" value="{{ $post->comment}}">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
  </div>
@endsection