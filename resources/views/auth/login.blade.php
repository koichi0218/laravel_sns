@extends('layouts.not_logged_in')
 
@section('content')
<body class="login-img">

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
</body>
@endsection