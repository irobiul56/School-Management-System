@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Chairman Message </h4> 
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($message as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{!! substr($item -> desc,0,70) !!} .....</td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>

                                            @if($item -> status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger" href="{{route('chairman.status.update', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                                <a class="text-success" href="{{route('chairman.status.update', $item -> id)}}"><i class="fa fa-check"></i></a>
                                            @endif

                                        </td>

                                        <td>
                                            <form action="{{route('chairman-message.destroy', $item -> id)}}" method="POST" class="d-inline delete-form">
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
        <div class="col-md-4">

            @if ($form_type == 'create')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Chairman Message</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('chairman-message.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="posteditor2" name="desc" type="text" value="{{old('text')}}" class="form-control"></textarea>
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
                    <div class="card-header">
                        <h4 class="card-title">Edit Chairman Message</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('chairman-message.update', $message_data -> id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                              <label>desc</label>
                              <textarea id="posteditor2" name="desc" type="text" value="{{$message_data -> desc}}" class="form-control">{{$message_data -> desc}}</textarea>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
@endsection