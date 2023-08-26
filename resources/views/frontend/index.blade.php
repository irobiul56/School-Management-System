<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education Board Bangladesh</title>
	<link rel="stylesheet" href="{{asset('frontend/assets/css/syle.css')}}">

	<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/images/logo.png')}}">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Doccure - Dashboard</title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
	
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/feathericon.min.css')}}">
	
	<link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">


	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<!--[if lt IE 9]>
		<script src="admin/assets/js/html5shiv.min.js"></script>
		<script src="admin/assets/js/respond.min.js"></script>
	<![endif]-->
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	

	<div class="wraper">
		<div class="w-top">
			<div class="logo">
				<img src="{{asset('frontend/assets/images/logo.png')}}" alt="">
			</div>
			<div class="banner">
				<h3>Jamalpur Kaliakair M E H Arif Institute</h3>
				<h3>Nazmul Alam Standard Primary School</h3>
				<hr>
				<h4>Jamalpur, Kaliakair, Gazipur.</h4>
			</div>
		</div>

		<div> 
			<br>
			@include('validate')
		</div>
		<div class="w-main">
			<div class="search-result">
				<form action="{{route('result.search')}}" method="GET">
			
					  <div class="mb-3 row">
						<label for="exam" class="col-sm-4 col-form-label">Exam Type: </label>
						<div class="col-sm-8">
							<select name="exam_type_id" id="" class="form-control border-primary" aria-label="Default select example">
								<option value=""> -- Select Exam -- </option>
								@foreach ($exam as $item)
								<option value="{{$item -> id}}">{{$item -> name}}</option>
								@endforeach
								
							</select>
						</div>
					  </div>

					  <div class="mb-3 row">
						<label for="exam" class="col-sm-4 col-form-label">Class: </label>
						<div class="col-sm-8">
							<select name="class_id" id="" class="form-control border-primary" aria-label="Default select example">
								<option value=""> -- Select Class -- </option>

								@foreach ($class as $item)
								<option value="{{$item -> id}}">{{$item -> name}}</option>
								@endforeach
								
							</select>
						</div>
					  </div>

					  <div class="mb-3 row">
						<label for="exam" class="col-sm-4 col-form-label">Year: </label>
						<div class="col-sm-8">
						<select name="year_id" id="" class="form-control border-primary" aria-label="Default select example">
							<option value=""> -- Select Year -- </option>

							@foreach ($year as $item)
							<option value="{{$item -> id}}">{{$item -> name}}</option>
							@endforeach
						</select>
						</div>
					  </div>

					  <div class="mb-3 row">
						<label for="exam" class="col-sm-4 col-form-label">ID No: </label>
						<div class="col-sm-8">
						  <input name="id_no" type="text" class="form-control border-primary" id="exam" placeholder="Enter Your Id No.">
						</div>
					  </div>



						<div class="col-sm-12 d-flex justify-content-end">
								<br>
								<button type="reset" class="btn btn-danger">Reset</button>
								&nbsp
								<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					  
				</form>
			</div>
		</div>
		<div class="w-footer">
			<div class="f-left">
				<p>©2016-2023 Ministry of Education, All rights reserved.</p>
			</div>
			<div class="f-right">
				<span>Powered by</span>
				<span> <b>Jamalpur Kaliakair M E H Arif Institute</b></span>
				{{-- <img style="width:70px; height: 70px;" src="{{asset('frontend/assets/images/logo.png')}}" alt=""> --}}
			</div>
		</div>
	</div>
	<div class="bottom">
		{{-- <img src="{{asset('frontend/assets/images/play.png')}}" alt=""> --}}
	</div>

	
	<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
		
		<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>    
		<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>  
		<script src="{{asset('admin/assets/js/chart.morris.js')}}"></script>
		
		<!-- Custom JS -->
		<script  src="{{asset('admin/assets/js/script.js')}}"></script>

		<!---Sweet Alert-->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="sweetalert2.all.min.js"></script>

		<link rel="stylesheet" href="sweetalert2.min.css">

	 <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	 <script  src="{{asset('custom/admin.js')}}"></script>

	 <script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
	 </script>
	 
		
	
</body>
</html>