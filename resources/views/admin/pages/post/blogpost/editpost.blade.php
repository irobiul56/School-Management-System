
@extends('admin.layouts.app')

@section('main-section')
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Post</h4>
            </div>
            <div class="card-body">
             @include('validate')
                <form action="{{route('post.update', $blogpost_data -> id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label><h4>Title</h4></label>
                        <input name="title" type="text" value="{{$blogpost_data -> title}}" class="form-control">
                    </div>

                    <div class="form-group">
                      <label><h4>Description</h4></label>
                      <textarea id="posteditor2" name="content" type="text" value="{{$blogpost_data -> content}}" class="form-control">{{$blogpost_data -> content}}</textarea>
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Fetured Image</h4>
                    </div>
                    <div class="card-body">
                    
                            <div class="form-group">
                            <label>photo</label>
                            <br>
                            <br>
                            <img style="width: 100%;" id="slider-photo-preview" src="{{url('storage/featured/' . $blogpost_data -> featured)}}" alt="">
                            <br>
                            <br>
                            <input style="display: none;" name="photo" type="file" class="form-control" id="slider-photo">
                            <label for="slider-photo">
                             <img style="width: 100px; cursor: pointer;" src="https://icon-library.com/images/album-icon/album-icon-3.jpg" alt="">
                            </label>
                          </div>

                            <div class="form-group">
                                <label><h4>Select Category</h4></label>
                    
                                <ul style="list-style:none; padding: 0px">
                                    @forelse ($blogpost_data -> category as $cat)
                                    <li>
                                        <label><input name="cat[]" value="{{$cat -> id}}" type="checkbox">{{$cat -> name}}</label>
                                    </li>
                                    @empty
                                    <li>
                                        <label for="" class="text-cemter text-danger">No Record Found</label>
                                    </li> 
                                    @endforelse
                                    
                                </ul>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Select Tag</label>
                                <select class="form-control blog-tag-2" name="tag[]" id="" multiple>
                                    @foreach ($blogpost_data -> tag as $tags)
                                    <option value="{{$tags -> id}}">{{$tags -> name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </form>
</div>  

@endsection