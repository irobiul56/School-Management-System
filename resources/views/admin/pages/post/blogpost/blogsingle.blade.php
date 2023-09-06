@extends('frontend.layouts.app')
@section('main-section')
    
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
       
        <!--====== PAGE BANNER PART START ======-->
        
        <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url({{url('storage/featured/' . $singleblog -> featured)}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner-cont">
                            <h2>{{$singleblog -> title}}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$singleblog -> title}}</li>
                                </ol>
                            </nav>
                        </div>  <!-- page banner cont -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        
        <!--====== PAGE BANNER PART ENDS ======-->
       
        <!--====== BLOG PART START ======-->
        
        <section id="blog-single" class="pt-90 pb-120 gray-bg">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                      <div class="blog-details mt-30">
                          <div class="thum">
                              <img src="{{url('storage/featured/' . $singleblog -> featured)}}" alt="Blog Details">
                          </div>
                          <div class="cont">
                              <h3>{{$singleblog -> title}}</h3>
                              <ul>
                                   <li><a href="#"><i class="fa fa-calendar"></i>{{$singleblog -> created_at -> format('d M Y')}}</a></li>
                                   <li><a href="#"><i class="fa fa-user"></i>{{$singleblog -> author -> name}}</a></li>
                                @foreach ($singleblog -> tag as $item)
                                <li><a href="#"><i class="fa fa-tags"></i> {{ $item -> name }} </a><span>&nbsp; | </span></li>
                                
                                @endforeach

                               </ul>
                               <p>{!! $singleblog -> content !!}</p>
                               <ul class="share">
                                   <li class="title">Share :</li>
                                   <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                   <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                   <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                   <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                   <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                               </ul>
                          </div> <!-- cont -->
                      </div> <!-- blog details -->
                  </div>
                   <div class="col-lg-4">
                       <div class="sidebar">
                           <div class="row">
                               <div class="col-lg-12 col-md-6">
                                   <div class="sidebar-search mt-30">
                                       <form action="#">
                                           <input type="text" placeholder="Search">
                                           <button type="button"><i class="fa fa-search"></i></button>
                                       </form>
                                   </div> <!-- sidebar search -->
                                   <div class="categories mt-30">
                                       <h4>Categories</h4>
                                       <ul>
                                        @foreach ($category as $item)
                                        
                                        <li><a href="#">{{$item -> name}}</a></li>
                                        @endforeach

                                       </ul>
                                   </div>
                               </div> <!-- categories -->
                               <div class="col-lg-12 col-md-6">
                                   <div class="sidebar-post mt-30">
                                       <h4>Popular Posts</h4>
                                       <ul>
                                            @foreach ($blogpost_data as $item)
                                                
                                            <li>
                                                 <a href="{{route('single.blog.post', $item -> id)}}">
                                                     <div class="single-post">
                                                        <div class="thum">
                                                            <img src="{{url('storage/featured/' . $item -> featured)}}" alt="Blog">
                                                        </div>
                                                        <div class="cont">
                                                            <h6>{{$item -> title}}</h6>
                                                            <span>{{$item -> created_at -> format('d M Y')}}</span>
                                                        </div>
                                                    </div> <!-- single post -->
                                                 </a>
                                            </li>
                                            @endforeach

                                       </ul>
                                   </div> <!-- sidebar post -->
                               </div>
                           </div> <!-- row -->
                       </div> <!-- sidebar -->
                   </div>
               </div> <!-- row -->
            </div> <!-- container -->
        </section>
        
        <!--====== BLOG PART ENDS ======-->

@endsection

