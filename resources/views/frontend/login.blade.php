<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Login</title>
		
		 <!--====== Favicon Icon ======-->
		 <link rel="shortcut icon" href="{{asset('admin/assets/img/logo.png')}}" type="image/png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
		
		<!--[if lt IE 9]>
			<script src="admin/assets/js/html5shiv.min.js"></script>
			<script src="admin/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{asset('admin/assets/img/logo.png')}}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form action="{{route('user.login')}}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<input name="email" class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input name="password" class="form-control" type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
						
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('admin/assets/js/script.js')}}"></script>
		
    </body>


</html>