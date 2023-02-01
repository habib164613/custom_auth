<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="csrf-token" content="{{ csrf_token() }}">


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Custom Theme files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="{{asset('css/costum.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form id='createForm'  method="post" action="{{ route('registerAction') }}" autocomplete="off" enctype="multipart/form-data" >
					@csrf
					<input class="form-control" type="text" name="name" placeholder="Name" >
					@if($errors->has('name'))
					<div class="text-danger">{{ $errors->first('name') }}</div>
					@endif
					<div id="name_error" class="text-danger errors d-none"></div>

					<input  class="form-control email" type="text" name="email" placeholder="Email" >
					@if($errors->has('email'))
					<div class="text-danger">{{ $errors->first('email') }}</div>
					@endif
					<div id="emailError" class="text-danger errors d-none"></div>

					<input class="form-control" type="password"  name="password" placeholder="Password" >
					@if($errors->has('password'))
					<div class="text-danger">{{ $errors->first('password') }}</div>
					@endif
					<div id="passwordError" class="text-danger errors d-none"></div>

					<input class="form-control" type="password"  name="password_confirmation" placeholder="Confirm Password" >
					@if($errors->has('password_confirmation'))
					<div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
					@endif
					<div id="passwordRetypeError" class="text-danger errors d-none"></div>

					
					<input  class="form-control  my-4" type="file" name="photo" placeholder="Photo" >
					@if($errors->has('photo'))
					<div class="text-danger">{{ $errors->first('photo') }}</div>
					@endif
					<div id="photoError" class="text-danger errors d-none"></div>


					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" name="term_and_condition" class="checkbox" >
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="{{ route('login') }}"> Login Now!</a></p>

			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
</body>
</html>