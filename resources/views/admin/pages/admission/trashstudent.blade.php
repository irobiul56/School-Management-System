@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">All Admission Student </h4> 
                    </div>
                    <div>
                        <a href="{{route('show.student.form')}}" class="btn btn-sm btn-info"> Admission Form <i class="fa fa-arrow-right"></i></a>
                        <a href="{{route('admission.index')}}" class="btn btn-sm btn-success"> All Student <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Admission Class</th>
                                    <th>Phone</th>
                                    <th>Student Id</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($student as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td><img style=" border-radius: 50%; padding: 5px; width: 60px; height: 60px" src="{{url('storage/students/'. $item -> photo )}}" alt=""></td>
                                        <td>{{$item -> name}}</td>
                                        <td>{{$item -> studentclass -> name }}</td>
                                        <td>{{$item -> fatherphone}}</td>
                                        <td><span style="border: 1px solid green; padding: 5px; border-radius: 10%; color: green; font-weight: bold;">{{$item -> student_id}}</span></p></td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>

                                            @if($item -> status)
                                                <span class="badge badge-success">Active</span>
                                                <a class="text-danger" href="{{route('student.data.status', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                                <a class="text-success" href="{{route('student.data.status', $item -> id)}}"><i class="fa fa-check"></i></a>
                                            @endif

                                        </td>

                                        <td>
                                            {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a class="btn btn-sm btn-warning" href="{{route('admission.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
                                            {{-- Trash --}}
                                            
                                            @if ($form_type == 'create')
                                            <a class="btn btn-sm btn-success" href="{{route('student-trash', $item -> id)}}">Restore</a>
                                                <form action="{{route('admission.destroy', $item -> id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" href="#">Delete Permanently</button>
                                                </form>
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
    </div>
    
@endsection