@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"> All User </h4> 
                    <a href="#" class="btn btn-sm btn-danger">Trash User<i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($user as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> name}}</td>
                                        <td>{{$item -> roleuser -> name ?? null}}</td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>

                                            @if($item -> status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger" href="{{route('user.update', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                                <a class="text-success" href="{{route('user.update', $item -> id)}}"><i class="fa fa-check"></i></a>
                                            @endif

                                        </td>

                                        <td>
                                            {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a class="btn btn-sm btn-warning" href="{{route('user.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
                                            {{-- Trash --}}
                                            
                                            @if ($form_type == 'create')
                                             <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a>
                                            @endif

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
        <div class="col-md-4">

            @if ($form_type == 'create')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New User</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input name="name" type="text" value="{{old('text')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" value="{{old('email')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" value="{{old('phone')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label><strong>User Role</strong></label>
                                <ul style="list-style:none; padding: 0px">
                                     @forelse ($role as $item)
                                        <li>
                                            <label><input name="role" value="{{$item -> id}}" type="radio">{{$item -> name}}</label>
                                        </li>
                                     @empty
                                        <li>
                                            <label for="" class="text-cemter text-danger">No Record Found</label>
                                        </li> 
                                     @endforelse 
                                </ul>
                             </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            {{-- @if ($form_type == 'edit')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Testimonial</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('testimonials.update', $testimonial -> id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Text</label>
                                <input name="text" type="text" value="{{$testimonial -> text}}" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Client</label>
                              <input name="client" type="text" value="{{$testimonial -> client}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Company</label>
                                <input name="company" type="text" value="{{$testimonial -> company}}" class="form-control">
                              </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
    
@endsection