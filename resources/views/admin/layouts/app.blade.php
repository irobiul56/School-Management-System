<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
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
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

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
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			@include('admin.layouts.header')
			@include('admin.layouts.sidebar')
		
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					

					
                    @section('main-section')
                    @show 
                    
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
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