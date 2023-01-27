@extends('admin.layouts.app')

@section('main-section')
	<!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title">Grade Point</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item active">Marks Management</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->

<form action="{{route('grade-point.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('validate')
            
                <div class="whole_extra_item_add">
                  <div class="delete_whole_extra_item_add">
                    <div class="form-row mx-4 my-3 ">
                      <div class="col-4">
                        <input name="grade_name" type="text" class="form-control" placeholder="Grade Name">
                      </div>
                      <div class="col-4">
                        <input name="grade_point" type="text" class="form-control" placeholder="Grade Point">
                      </div>
                      <div class="col-4">
                        <input name="start_marks" type="text" class="form-control" placeholder="Start Marks">
                      </div>
                      <div class="col-4 my-3">
                        <input name="end_marks" type="text" class="form-control" placeholder="End Marks">
                      </div>
                      <div class="col-4 my-3">
                        <input name="start_point" type="text" class="form-control" placeholder="Start Point">
                      </div>
                      <div class="col-4 my-3">
                        <input name="end_point" type="text" class="form-control" placeholder="End Point">
                      </div>
                      <div class="col-4 my-3">
                        <input name="remarks" type="text" class="form-control" placeholder="Remarks">
                      </div>
                    </div>
                  </div>
                </div>
                <span class="add-more-item"></span>
                {{-- Hide Category --}}
                {{-- <div style="visibility: hidden">
                      <div class="whole_extra_item_add" id="whole_extra_item_add">
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                          <div class="form-row mx-4">
                                    <div class="col-4">
                                      <select name="classid[]" class="form-control">
                                          @foreach ($Studentclass as $item)
                                          <option value="{{$item -> id}}">{{$item -> name}}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                      <div class="col-4">
                                        <input name="amount[]" type="text" class="form-control" placeholder="Amount">
                                      </div>
                                      <div class="col-2">

                                      <a href="#" class="btn btn-sm btn-danger removeitem"><i class="fa fa-minus-circle"></i></a>
                                  </div>
                            </div>
                          </div>
                      </div>
                </div> --}}
       {{-- Submit --}}
        
        <div class="col-auto my-2 mx-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
@endsection
