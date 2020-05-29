<!doctype html>
<html lang="en">
 
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/libs/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">

     <style type="text/css">
	    .container-kotak{
	    	/*border: 1px solid black;*/
	    	width: 400px;
	    	min-height: 400px;
	    	margin: auto;
	    	margin-top: 80px;
	    	/*background-color: white;*/
	    }
    </style>

    <!-- /css -->
</head>
<body>
	<div class="container">
		<div class="container-kotak">
			<div class="card text-center">
				<div class="card-header">
					<b>Silahkan Login</b>
					<span class="splash-description">Masukan Username Dan Password</span>
				</div>
				<div class="card-body">
					<form action="/post-login" method="POST">
						@csrf
						<div class="form-group">
							<input type="text" name="username" placeholder="Username" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" name="password" placeholder="Password" class="form-control">
						</div>

						<button type="submit" class="btn btn-block btn-primary">Login</button>
					</form>
				</div>
				<div class="card-footer">
					<span> &copy; Roni Surya</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>