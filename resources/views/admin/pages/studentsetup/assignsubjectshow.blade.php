@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-title mr-auto">All Fee Category </h4> 
                        <a href="#" class="btn btn-sm btn-danger mr-1">Trash Fee Amount <i class="fa fa-arrow-right"></i></a>
                        <a href="{{route('show.assign.subject.form')}}" class="btn btn-sm btn-info">Assign Subject <i class="fa fa-plus-circle"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Class</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($assignsubject as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> studentclass -> name}}</td>
                                        {{-- <td>{{$item -> created_at -> DiffForHumans()}}</td> --}}


                                        <td>
                                            <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-edit"></i></a>

                                            {{-- Trash --}}
                                            
                                

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