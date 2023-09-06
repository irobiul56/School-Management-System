<!doctype html>
<html lang="en">


<!-- Mirrored from thepixelcurve.com/html/edubin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jan 2021 19:32:11 GMT -->
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Jamalpur Kaliakair MEH Arif Institute</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('admin/assets/img/logo.png')}}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="frontend/pages/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="frontend/pages/css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="frontend/pages/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="frontend/pages/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="frontend/pages/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="frontend/pages/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="frontend/pages/css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="frontend/pages/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="frontend/pages/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="frontend/pages/css/responsive.css">

   		<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->

    {{-- <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div> --}}

    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
 @include('frontend.layouts.header')
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="search-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- search form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
   
    @section('main-section')
    @show 
   
   
    <!--====== FOOTER PART START ======-->
    
  
    @include('frontend.layouts.footer')
    
    
    <!--====== jquery js ======-->
    <script src="frontend/pages/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="frontend/pages/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="frontend/pages/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="frontend/pages/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="frontend/pages/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="frontend/pages/js/waypoints.min.js"></script>
    <script src="frontend/pages/js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="frontend/pages/js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="frontend/pages/js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="frontend/pages/js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="frontend/pages/js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="frontend/pages/js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="frontend/pages/js/main.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="frontend/pages/js/map-script.js"></script>
    
		<!-- Custom JS -->
		<script  src="{{asset('admin/assets/js/script.js')}}"></script>

		<!---Sweet Alert-->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="sweetalert2.all.min.js"></script>

		<link rel="stylesheet" href="sweetalert2.min.css">

	 	<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

		{{-- CK Editor --}}
		<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

	 <!-- Custom JS -->
	 <script  src="{{asset('custom/admin.js')}}"></script>

	 	

</body>


<!-- Mirrored from thepixelcurve.com/html/edubin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jan 2021 19:32:16 GMT -->
</html>
