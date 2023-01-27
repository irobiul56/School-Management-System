@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">All GPA </h4> 
                    </div>
                    <div>
                        <a href="{{route('grade.point.avarage')}}" class="btn btn-sm btn-info"> Grade Point Insert Form <i class="fa fa-arrow-right"></i></a>
                        
                    </div>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Grade Name</th>
                                    <th>Grade Point</th>
                                    <th>Marks Range</th>
                                    <th>Grade Range</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($gradepoint as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> grade_name}}</td>
                                        <td>{{$item -> grade_point }}</td>
                                        <td>{{$item -> start_marks}} - {{$item -> end_marks}} </td>
                                        <td>{{$item -> start_point}} - {{$item -> end_point}} </td>
                                        <td>{{$item -> remarks }}</td>

                                        <td>
                                            <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-sm btn-warning" href="{{route('grade-point.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
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