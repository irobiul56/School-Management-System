@extends('frontend.layouts.app')
@section('main-section')
    
    <section id="teachers-single" class="pt-10 pb-20 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="https://dupl-cms.s3.us-east-2.amazonaws.com/2022/staff/1646661124arif.jpg" alt="Teachers">
                        </div>
                        <div class="name">
                            
                            <h4> <div class="row"> <div class="col-md-11 col-sm-12">
                                  
 
                                 
                                   
                                   
                                                                     
                            </div><div class="col-md-1 col-sm-12"></div> </div></h4>
                            <span></span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="" target="blank"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#" target="blank"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#" target="blank"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#" target="blank"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>

                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="teachers-right mt-50">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="single-dashboard pt-40">
                                          
                                        <h5>
                                            <div class="row"> <div class="col-md-8 col-sm-12">
                                                
                                            </div> 
                                            <div class="col-md-4 col-sm-12"> <span>Professor  M.E.H Arif</span> <br><span></span></div></div></h5></div>
                                            <hr>
                                    
                                    </div> <!-- single dashboard -->
                                        <div class="blog-cont">
                                         @foreach ($message as $item)
                                         
                                         <p>{!! $item -> desc !!}</p>
                                         @endforeach

                                    </div>
                                </div> <!-- dashboard cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- teachers right -->
        </div>
    </section>

@endsection

