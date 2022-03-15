@extends('layouts.logged_in')
 
@section('content')
<div class="container">
    <div class="row d-block mx-auto w-75">
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
        <img id="preview" width="75%">
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