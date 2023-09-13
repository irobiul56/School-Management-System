@extends('frontend.layouts.app')
@section('main-section')
    
        <!--====== PAGE BANNER PART START ======-->
    
        <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner-cont">
                            <h2>Teachers</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                                </ol>
                            </nav>
                        </div>  <!-- page banner cont -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
        
        <!--====== PAGE BANNER PART ENDS ======-->
       
        <!--====== TEACHERS PART START ======-->
        
        <section id="teachers-page" class="pt-90 pb-120 gray-bg">
            <div class="container">
               <div class="row">
                @foreach ($teacher as $item)
                <div class="col-lg-3 col-sm-6">
                    <div class="single-teachers mt-30 text-center">
                         <div class="image">
                             <img style=" height: 300px;" src="{{url('storage/user/' . $item -> image ?? null)}}" alt="Teachers">
                         </div>
                         <div class="cont">
                             <a href="#"><h6>{{$item -> name}}</h6></a>
                             <span>{{$item -> designation -> name ?? null}}</span>
                             <span><a href="tel:{{$item -> phone ?? null }}">Call {{$item -> phone ?? null }}</a></span>
                         </div>
                     </div> <!-- single teachers -->
                </div>
                    
                @endforeach

               </div> <!-- row -->
            </div> <!-- container -->
        </section>
        
        <!--====== TEACHERS PART ENDS ======-->
        

@endsection

