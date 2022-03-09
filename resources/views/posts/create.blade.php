@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">
      @csrf
      <div>
          <label>
              コメント:
              <input type="text" name="comment">
          </label>
      </div>
      <div>
          <label>
              画像:
              <input type="file" name="image">
          </label>
      </div>
      <input type="submit" value="投稿">
  </form>
  <img id="preview" width="100%">
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    $(function(){
      $("[name='image']").on('change', function (e) {
        
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $("#preview").attr('src', e.target.result);
        }
     
        reader.readAsDataURL(e.target.files[0]);   
     
      });
    });
</script>
@endsection