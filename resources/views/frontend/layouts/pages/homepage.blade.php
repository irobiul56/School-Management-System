@extends('frontend.layouts.app')
@section('main-section')

 <!--====== SLIDER PART START ======-->
 <section id="slider-part" class="slider-active ">
     @foreach ($sliders as $item)
    <div class="single-slider bg_cover pt-150" style="background-image: url({{url('storage/sliders/' . $item -> photo)}})" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="fadeInLeft" data-delay="1s">{{$item -> title}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">{{$item -> desc}}</p>
                        <ul>
                            @foreach (json_decode($item -> btns) as $btn)
                            <a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{$btn -> btn_link}}">{{$btn -> btn_title}}</a>
                            @endforeach
                            {{-- <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
    {{-- <div class="single-slider bg_cover pt-150" style="background-image: url(frontend/pages/images/slider/s-3.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="fadeInLeft" data-delay="1s">Choose the right theme for education</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn" href="#">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
    <div class="single-slider bg_cover pt-150" style="background-image: url(frontend/pages/images/slider/s-2.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="fadeInLeft" data-delay="1s">Choose the right theme for education</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn" href="#">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->  --}}
    @endforeach 
</section>
<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<section id="category-part">
    <div class="container">
        <div class="category pt-40 pb-80">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-text pt-40">
                        <h2>Best platform to learn everything</h2>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                    <div class="row category-slide mt-40">
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="single-category text-center color-1">
                                    <span class="icon">
                                        <img src="frontend/pages/images/all-icon/ctg-1.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Science</span>
                                    </span>
                                </span> <!-- single category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="single-category text-center color-2">
                                    <span class="icon">
                                        <img src="frontend/pages/images/all-icon/ctg-2.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Business Studies</span>
                                    </span>
                                </span> <!-- single category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="single-category text-center color-3">
                                    <span class="icon">
                                        <img src="frontend/pages/images/all-icon/ctg-3.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Humanities</span>
                                    </span>
                                </span> <!-- single category -->
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <span class="single-category text-center color-1">
                                    <span class="icon">
                                        <img src="frontend/pages/images/all-icon/ctg-1.png" alt="Icon">
                                    </span>
                                    <span class="cont">
                                        <span>Language</span>
                                    </span>
                                </span> <!-- single category -->
                            </a>
                        </div>
                    </div> <!-- category slide -->
                </div>
            </div> <!-- row -->
        </div> <!-- category -->
    </div> <!-- container -->
</section>

<!--====== CATEGORY PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            @foreach ($about as $item)
            
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>About Us</h5>
                    <h2>{{$item -> title}}</h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p class="about-home-page">{!! $item -> desc !!}</p>
                    <a href="#" class="main-btn mt-55">Learn More</a>
                </div>
            </div> <!-- about cont -->
            @endforeach

            <div class="col-lg-6 offset-lg-1">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>Latest Notice</h3>
                    </div> <!-- event title -->
                    <ul>
                        @foreach ($notice as $item)
                        <li>
                            <div class="single-event">
                                <span><i class="fa fa-calendar"></i> {{$item -> created_at -> format('d M Y') }}</span>
                                <a href="{{route('single.notice', $item -> id)}}"><h4> {{$item -> title}}</h4></a>
                                <span><i class="fa fa-user"></i> Posted by: {{$item -> userdata -> name}}</span>
                            </div>
                        </li>
                            
                        @endforeach
                    </ul> 
                    <a href="{{route('all.notice')}}" class="mt-20"><i class="fa fa-arrow-right"></i> More Notice </a>
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
        <img src="frontend/pages/images/about/bg-1.png" alt="About">
    </div>
    <div id="apply"></div>
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== APPLY PART START ======-->

<section id="apply-aprt" class="pb-120">
    <div class="container">
        <div class="apply">
            <div class="row no-gutters">
                @foreach ($apply as $item)
                <div class="col-lg-6">
                    <div class="apply-cont apply-color-1 ml-1">
                        <h3>{{$item -> title}}</h3>
                        <p>{!! $item -> desc !!}</p>
                        <ul>
                            @foreach (json_decode($item -> btns) as $btn)
                            <a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="{{$btn -> btn_link}}">{{$btn -> btn_title}}</a>
                            @endforeach
                            {{-- <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li> --}}
                        </ul>
                    </div> <!-- apply cont -->
                </div>
                @endforeach

            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== APPLY PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-part" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Featured Teachers</h5>
                    <h2>Meet Our teachers</h2>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    <a href="#" class="main-btn mt-55">Career with us</a>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="teachers mt-20">
                    <div class="row">
                        @foreach ($teacher as $item)
                        <div class="col-sm-6">
                            <div class="single-teachers mt-30 text-center">
                                <div class="image">
                                    <img src="{{url('storage/user/', $item -> image)}}" alt="Teachers">
                                </div>
                                <div class="cont">
                                    <a href="teachers-single.html"><h6>{{$item -> name}}</h6></a>
                                    <span>{{$item -> roleuser -> name ?? null}}</span>
                                </div>
                            </div> <!-- single teachers -->
                        </div>
                        @endforeach
                    </div> <!-- row -->
                </div> <!-- teachers -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

<!--====== TEASTIMONIAL PART START ======-->

<section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-40">
                    <h5>Testimonial</h5>
                    <h2>What they say</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row testimonial-slide mt-40">
            @foreach ($testimonial as $item)
                
            <div class="col-lg-6">
                <div class="single-testimonial">
                    <div class="testimonial-thum">
                        <img style=" width: 70px; height: 70px" src="{{url('storage/testimonial/'. $item -> photo )}}" alt="">
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <p>{!! $item -> desc !!}</p>
                        <h6>{{$item -> name}}</h6>
                        <span>{{$item -> designation}}</span>
                    </div>
                </div> <!-- single testimonial -->
            </div>
            @endforeach

        </div> <!-- testimonial slide -->
    </div> <!-- container -->
</section>

<!--====== TEASTIMONIAL PART ENDS ======-->

<!--====== NEWS PART START ======-->

<section id="news-part" class="pt-115 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-50">
                    <h5>Latest News</h5>
                    <h2>From the news</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            @foreach ($blogpost_latest as $item)
            <div class="col-lg-6">
                <div class="single-news mt-30">
                    <div class="news-thum pb-25">
                        <img src="{{url('storage/featured/' . $item -> featured)}}" style="width: 80%" alt="News">
                    </div>
                    <div class="news-cont">
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>{{$item -> created_at -> format('d M Y') }} </a></li>
                            <li><a href="#"> <span>By</span> {{$item -> author -> name}}</a></li>
                        </ul>
                        <a href="{{route('single.blog.post', $item -> id)}}"><h3>{{$item -> title}}</h3></a>
                        <p>{!! substr($item -> content,0,200) !!} ...</p>
                    </div>
                </div> <!-- single news -->
            </div>
                
            @endforeach

            <div class="col-lg-6">
                @foreach ($blogpost as $item)
                <div class="single-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="{{url('storage/featured/' . $item -> featured)}}" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>{{$item -> created_at -> format('d M Y') }} </a></li>
                                    <li><a href="#"> <span>By</span> {{$item -> author -> name}}</a></li>
                                </ul>
                                <a href="{{route('single.blog.post', $item -> id)}}"><h3>{{$item -> title}}</h3></a>
                                <p>{!! substr($item -> content,0,100) !!} ...</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- single news -->
                @endforeach
            </div>

        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== NEWS PART ENDS ======-->

@endsection