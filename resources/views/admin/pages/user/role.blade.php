@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"> Permission </h4> 
                    <a href="#" class="btn btn-sm btn-danger">Trash Permission<i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($role as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> name}}</td>
                                        
                                        <td>
                                            <ul style="list-style: none; padding:0px;">
                                                @forelse (json_decode($item -> permission) as $per)
                                                    <li><i class="fa fa-angle-right"></i>{{$per}}</li>
                                                @empty
                                                    <li> No Record Found</li>
                                                @endforelse
                                                
                                            </ul>
                                        
                                        </td>

                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>

                                            @if($item -> status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger" href="{{route('role.update', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                                <a class="text-success" href="{{route('role.update', $item -> id)}}"><i class="fa fa-check"></i></a>
                                            @endif

                                        </td>

                                        <td>
                                            {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a class="btn btn-sm btn-warning" href="{{route('role.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
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
                        <h4 class="card-title">Add New Role</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Role</label>
                                <input name="name" type="text" value="{{old('text')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <ul style="list-style:none; padding: 0px">
                                     @forelse ($permission as $item)
                                        <li>
                                            <label><input name="permission[]" value="{{$item -> name}}" type="checkbox">{{$item -> name}}</label>
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

            @if ($form_type == 'edit')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Edit Role</h4>
                        <a class="btn-sm btn-info" href="{{route('role.index')}}">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('role.update', $edit -> id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @include('validate')
                                <label>Name</label>
                                <input name="name" type="text" value="{{$edit -> name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <ul style="list-style:none; padding: 0px">
                                     @forelse (json_decode($permission) as $item)
                                     <li>
                                         <label><input @if (in_array($item -> name, json_decode($edit -> permission))) checked  @endif name="permission[]" value="{{$item -> name}}" type="checkbox">{{$item -> name}}</label>
                                     </li>
                                     @empty
                                     <li>
                                         <label for="" class="text-cemter text-danger">No Record Found</label>
                                     </li> 
                                     @endforelse
                                     
                                </ul>
                             </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
    
@endsection