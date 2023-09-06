@extends('frontend.layouts.app')
@section('main-section')
    
<section id="page-banner" class="pt-20 pb-20 bg_cover" data-overlay="8" style="background-image: url(frontend/pages/images/page-banner-1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Notice Board</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Notice</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section>
<div class="container pb-100 pt-50">
<div class="row">

    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
            </div>
            @include('validate-main')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0 data-table-search">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Published Date</th>
                                <th>Download</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($notice as $item)   
                                <tr>
                                    <td>{{$loop -> index + 1}}</td>
                                    <td><a href="{{route('single.notice', $item -> id)}}">{{$item -> title}}</a></td>
                                    <td>{{$item -> created_at -> format('d M Y')}}</td>
                                    <td><a href="#"> Download</a></td>

                                
                                </tr>
                            @empty
                                
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

