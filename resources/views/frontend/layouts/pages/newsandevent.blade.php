@extends('frontend.layouts.app')
@section('main-section')
    
        <!--====== BLOG PART START ======-->
        
        <section id="blog-single" class="pt-90 pb-120 gray-bg">
            <div class="container">
            <div class="row">
                
                @foreach ($category as $item)
                @if ($item)
                
                <div class="col-lg-8">
                    <div class="blog-details mt-30">
                        @foreach ($item -> blogpost as $blog)
        
                        
                        <div class="thum">
                            <img src="{{url('storage/featured/' . $blog -> featured)}}" alt="Blog Details">
                        </div>
                        <div class="cont">
                            <h3>{{$blog -> title}}</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar"></i>{{$blog -> created_at -> format('d M Y')}}</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>{{$blog -> author -> name}}</a></li>
                                

                            </ul>
                            <p>{!! $blog -> content !!}</p>
                            <ul class="share">
                                <li class="title">Share :</li>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- cont -->
                        @endforeach
                    </div> <!-- blog details -->
                </div>

                @endif

                @endforeach
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                    
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
        

@endsection

