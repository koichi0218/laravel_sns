@extends('layouts.logged_in')
 
@section('content')
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @forelse($followers as $follower)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm h-100">
                  @if($follower->image !== '')
                    <img class="card-img-top" src="{{ \Storage::url($follower->image) }}" alt="Card image cap">
                  @else
                    <img src="{{ asset('images/no_user_image.png') }}">
                  @endif
                  <div class="card-body align-text-bottom">
                  </div>
                  <div class="card-footer">
                      {{ $follower->name }}
                    @if(Auth::user()->isFollowing($follower))
                      <form method="post" action="{{route('follows.destroy', $follower)}}" class="follow">
                        @csrf
                        @method('delete')
                        <input type="submit" value="フォロー解除">
                      </form>
                    @else
                      <form method="post" action="{{route('follows.store')}}" class="follow">
                        @csrf
                        <input type="hidden" name="follow_id" value="{{ $follower->id }}">
                        <input type="submit" value="フォロー">
                      </form>
                    @endif
                  </div>
            </div>
          </div>
        @empty
              <p>フォローされているユーザーはいません。</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection