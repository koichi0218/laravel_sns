@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <div class="container">
    <div class="wrapper">
      <h1>新規投稿</h1>
      <form method ="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="inputName">コメント:</label>
          <input type="text" name="comment" class="form-control" placeholder="コメント">
        </div>
        <div class="form-group">
          <label>画像:</label>
          <input type="file" name="image" class="form-control" required>
          <img id="preview" width="75%">
        </div>
        <button type="submit" class="btn btn-primary">投稿</button>
      </form>
    </div>
  </div>
  
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