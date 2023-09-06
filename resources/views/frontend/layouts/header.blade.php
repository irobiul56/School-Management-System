<header id="header-part">
    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-contact">
                        <ul>
                            <li><i class="fa fa-envelope"></i><a href="#">arifinstitute5@gmail.com</a></li>
                            <li><i class="fa fa-phone"></i><span>+8801309138855</span></li>
                        </ul>
                    </div> <!-- header contact -->
                </div>
                <div class="col-md-6">
                    <div class="header-right d-flex justify-content-end">
                        <div class="social d-flex">
                            <span class="follow-us">Follow Us :</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- social -->
                        <div class="login-register">
                            <ul>
                                <li><a href="{{route('show.login.form')}}">Login</a></li>
                                {{-- <li><a href="register.html">Register</a></li> --}}
                            </ul>
                        </div>
                    </div> <!-- header right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->
    <div class="header-logo-support pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-12">
                    <div class="logo">
                        <a href="{{route('home.page')}}">
                            <img src="{{asset('admin/assets/img/logo.png')}}" alt="Logo" style="height:100px; width:100px">
                        </a>
                    </div>
                </div>
                    <div class="col-lg-5 col-md-2 col-sm-12">
                        <div class="logo">
                                <div class="cont" style="margin-left:0px; padding-left:0px">
                                    <span style="color:#07294d; font-size: 25px; font-weight:bold"> Jamalpur Kaliakair MEH Arif Institute</span>
                                    <p style="font-size: 14px;"> School code: 2380 | EIIN No: 138855</p>
                                    <p style="font-size: 14px;"> Jamalpur, Kaliakair, Gazipur.</p>
                                </div>
                        </div>
                    </div>
                
                  <div class="col-lg-3 col-md-2 col-sm-12">
                         <div class="button float-left">
                             <a href="https://mujib100.gov.bd/"> <img src="http://www.arifcollege.edu.bd/media/bg/mujib_logo.png" alt="" style="width:120px; height:80px"></a><br>
                            <!--<a href="javascript:void(0);"id="cloudcampuslogin" class="btn btn-primary">Login</a>-->
                           </div>
                           <div class="button float-right">
                              <img src="http://www.arifcollege.edu.bd/media/bg/image.png" alt="" style="width:120px; height:80px"><br>
                            <!--<a href="javascript:void(0);"id="cloudcampuslogin" class="btn btn-primary">Login</a>-->
                        </div>
                        </div>
                          <div class="col-lg-2 col-md-2 col-sm-12">
                               <div class="button float-left">
                                   <ul class="caption fade-caption" style="margin:0">
                                        <li><i class="fa fa-external-link-square" aria-hidden="true" style="color:#062216"></i>  <a href="#"> আদেশ/ নোটিশ</a></li>
                                        <li><i class="fa fa-external-link-square" aria-hidden="true" style="color:#062216"></i> <a href="#"> কার্যক্রম</a></li>
                                        <li> <i class="fa fa-external-link-square" aria-hidden="true" style="color:#062216"></i> <a href="#">ছবি গ্যালারি</a></li>
                                        <li><i class="fa fa-external-link-square" aria-hidden="true" style="color:#062216"></i> <a href="#" title="ভিডিও" data-ytdl-video-id="_j5Q6HIIwlA">ভিডিও</a><span title="Download using YouTube Downloader by Addoncrop" class="ytdl-handle-btn"></span></li>
                                    </ul>
                             <br>
                            <!--<a href="javascript:void(0);"id="cloudcampuslogin" class="btn btn-primary">Login</a>-->
                        </div>
                    </div>
                </div>
            </div> <!-- row -->

        </div>
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="active" href="{{route('home.page')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('single.about')}}">About Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('single.about')}}">At A Glance</a></li>
                                        <li><a href="{{route('single.history')}}">History</a></li>
                                        <li><a href="{{route('mission.page')}}">Mission & Vision</a></li>
                                        <li><a href="{{route('mission.page')}}">Achievement</a></li>
                                        <li><a href="{{route('news.event.page')}}">News & Event</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="courses.html">ADMINISTRATION</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Governing Body</a></li>
                                        <li><a href="#">Chairman Message</a></li>
                                        <li><a href="#">Teacher Staff</a></li>
                                        <li><a href="#">Staff Information</a></li>
                                        
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Academic</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Academic Calendar</a></li>
                                        <li><a href="#">Class Routine</a></li>
                                        <li><a href="#">Syllabus</a></li>
                                        <li><a href="#">Book List</a></li>
                                        <li><a href="#">Public Exam Result</a></li>
                                        <li><a href="#">Academic Rules</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Admission</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Admission Circular</a></li>
                                        <li><a href="#">Prospectus</a></li>
                                        <li><a href="#">Admission Form</a></li>
                                        <li><a href="#">Admission Result</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#">FACILITIES</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Classroom</a></li>
                                        <li><a href="#">Computer Lab</a></li>
                                        <li><a href="#">Science Lab</a></li>
                                        <li><a href="#">Library</a></li>
                                        <li><a href="#">Play Ground</a></li>
                                        <li><a href="#">Canteen</a></li>
                              
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#">CO-CURRICULAR</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Sports & Games</a></li>
                                        <li><a href="#">Tours</a></li>
                                        <li><a href="#">BNCC</a></li>
                                        <li><a href="#">Scout</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#">GALLERY</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Photo GALLERYs</a></li>
                                        <li><a href="#">Video GALLERY</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Online Class</a>
                                </li>

                                <li class="nav-item">
                                    <a href="/#apply"><b class="text-success">Apply</b></a>
                                </li>
                                
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
</header>