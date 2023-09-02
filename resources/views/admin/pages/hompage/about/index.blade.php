@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">About Us </h4> 
                    <a href="{{route('show.trash.about')}}" class="btn btn-sm btn-danger">Trash About <i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($about as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> title}}</td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>

                                            @if($item -> status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger" href="{{route('about.status.update', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                                <a class="text-success" href="{{route('about.status.update', $item -> id)}}"><i class="fa fa-check"></i></a>
                                            @endif

                                        </td>

                                        <td>
                                            {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a class="btn btn-sm btn-warning" href="{{route('about.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
                                            {{-- Trash --}}
                                            
                                            @if ($form_type == 'create')
                                             <a class="btn btn-sm btn-danger" href="{{route('about.trash', $item -> id)}}"><i class="fa fa-trash"></i></a>
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
                        <h4 class="card-title">Add About Us</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" value="{{old('text')}}" class="form-control">
                            </div>
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
                        <h4 class="card-title">Edit About</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('about.update', $aboutus -> id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" value="{{$aboutus -> title}}" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>desc</label>
                              <textarea id="posteditor2" name="desc" type="text" value="{{$aboutus -> desc}}" class="form-control">{{$aboutus -> desc}}</textarea>
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