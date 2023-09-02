@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">All About </h4> 
                    <a href="{{route('testimonial.index')}}" class="btn btn-sm btn-success">Published Testimonial <i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Designation</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($testimonial_data as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> name}}</td>
                                        <td><img style=" border-radius: 50%; padding: 5px; width: 50px; height: 50px" src="{{url('storage/testimonial/'. $item -> photo )}}" alt=""></td>
                                        <td>{{$item -> designation}}</td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>
                                                {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-warning" href="{{route('admin-user.edit', $item -> id)}}"><i class="fa fa-edit"></i></a> --}}

                                                {{-- Trash --}}
                                                <a class="btn btn-sm btn-success" href="{{route('testimonial.trash', $item -> id)}}">Restore</i></a>
                                                <form action="{{route('testimonial.destroy', $item -> id)}}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" href="#">Permanently Delete</i></button>
                                                </form>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    
@endsection