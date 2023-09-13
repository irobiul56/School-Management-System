@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"> Governing Body </h4> 
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
                                    <th>Designation</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($governingbody as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td><img style="width: 50px; height: 50px; border-radius:50%" src="{{url('storage/user/' . $item -> user -> image)}}" alt=""></td>
                                        <td>{{$item -> user -> name}}</td>
                                        <td>{{$item -> user -> designation -> name}}</td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>
                                        <td>
                                            <form action="{{route('governing-body.destroy', $item -> id)}}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" href="#"> Delete</i></button>
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
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Governing Body</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('governing-body.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Select Name</label>
                                <select name="admin_id" id="" class="form-control">
                                    <option value="">-- Select Class ---</option>
                                    @foreach ($user as $item)
                                    <option value="{{$item -> id}}">{{$item -> name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    
@endsection