@extends('layouts.logged_in')
 
@section('content')
  <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @forelse($follow_users as $follow_user)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm h-100">
                @if($follow_user->image !== '')
                  <img class="card-img-top" src="{{ \Storage::url($follow_user->image) }}" alt="Card image cap">
                @else
                  <img src="{{ asset('images/no_user_image.png') }}">
                @endif
                <div class="card-body align-text-bottom">
                </div>
                <div class="card-footer">
                  <p class="lead text-muted">ユーザー名: <a href="{{ route('users.user_show', $follow_user)}}">{{$follow_user->name}}</a></p>
                  <p class="lead text-muted">プロフィール: {{$follow_user->profile}}</p>
                </div>
                <form method="post" action="{{route('follows.destroy', $follow_user)}}" class="follow">
                  @csrf
                  @method('delete')
                  <input type="submit" value="フォロー解除">
                </form>
              </div>
            </div>
          @empty
            <p>フォローしているユーザーはいません。</p>
          @endforelse
          </div>
        </div>
      </div>
@endsection