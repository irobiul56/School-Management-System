@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"> All Employee </h4> 
                    <a href="{{route('user.pdf')}}" class="btn btn-sm btn-success">Export User<i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($user as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> name}}</td>
                                        <td>{{$item -> designation -> name}}</td>
                                        <td>{{$item -> phone}}</td>
                                        <td>{{$item -> gender}}</td>
                                        <td>{{$item -> dob}}</td>
                                        <td><img style=" border-radius: 50%; padding: 5px; width: 60px; height: 60px" src="{{url('storage/user/'. $item -> image )}}" alt=""></td>
                                       

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
    
@endsection