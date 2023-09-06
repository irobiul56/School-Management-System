@extends('frontend.layouts.app')
@section('main-section')

<div class="container">
    <div class="row">
                    
        <div class="col-lg-7">
            <div class="section-title mt-50">
                <h3 style="text-align: center">Notice</h3><br><br>
                <hr>
                <h3>{{$singleNotice -> title}}</h3>
            </div> <!-- section title -->
            <div class="about-cont">
                <p class="about-home-page">{!! $singleNotice -> desc !!}</p>
            </div>
        </div> <!-- about cont -->
        
        <div class="col-lg-5">
            <div class="about-event mt-50">
                <div class="event-title">
                    <h4>Latest Notice</h4>
                </div> <!-- event title -->
                <ul>
                    @foreach ($notice as $item)
                    <li>
                    <div class="single-event">
                        <span><i class="fa fa-calendar"></i> {{$item -> created_at -> format('d M Y') }}</span>
                        <a href="{{route('single.notice', $item -> id)}}"><h4> {{$item -> title }}</h4></a>
                        <span><i class="fa fa-user"></i> Posted by: {{$item -> userdata -> name}}</span>
                    </div>
                </li>
                        
                    @endforeach

                </ul> 
            </div> <!-- about event -->
        </div>
    </div> <!-- row -->
</div>

@endsection

