@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
    @forelse($posts as $post)
    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                @if($post->image !== '')
                  <img class="card-img-top" src="{{ \Storage::url($post->image) }}" alt="Card image cap">
                @else
                  <img src="{{ asset('images/no_image.png') }}">
                @endif
                <div class="card-body">
                  <div class="post_body_footer">
                  <a class="like_button">{{ $post->isLikedBy(Auth::user()) ? '♥' : '♡' }}</a>
                  <form method="post" class="like" action="{{ route('posts.toggle_like', $post) }}">
                    @csrf
                    @method('patch')
                  </form>
                  <p class="card-text">{{$post->comment}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="card-body pt-0 pb-2 pl-3">
                      <div class="card-text">
                        <article-like>
                        </article-like>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    @empty
        <p>投稿がありません</p>
    @endforelse
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  /* global $ */
  $('.like_button').on('click', (event) => {
      $(event.currentTarget).next().submit();
  })
</script>
@endsection


@extends('layouts.not_logged_in')
 
@section('content')
 <div class="jumbotron login_img">
  <div class = "container">
   	<div class= "wrapper">
   	  <form method="POST" action="{{route('login')}}" name="Login_Form" class="form-signin">
   	    @csrf     
   		    <h3 class="form-signin-heading">サインイン</h3>
   			  <hr class="colorgraph"><br>
   			  
   			  <input type="text" class="form-control" name="email" placeholder="email">
   			  <input type="password" class="form-control" name="password" placeholder="password">     		  
   			 
   			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">ログイン</button>  			
   		</form>			
   	</div>
  </div>
 </div>
@endsection