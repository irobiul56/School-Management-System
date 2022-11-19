@extends('admin.layouts.app')

@section('main-section')

<form action="{{route('student-fee-amount.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('validate')
                <div class="form-row mx-4">
                    <div class="col-4 my-2">
                        <select name="feecategory" class="form-control">
                          <option> Selelect Category</option>
                            @foreach ($feecategory as $item)
                            <option value="{{$item -> id}}"> {{$item -> name}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="col-2 my-2 mx-5">
                      <a href="#" class="btn btn-sm btn-info addmoreclassamount"><i class="fa fa-plus-circle"> Add More Class </i></a>
                    </div>
                </div>
        
                <div class="whole_extra_item_add">
                  <div class="delete_whole_extra_item_add">
                    <div class="form-row mx-4 my-3 ">
                      <div class="col-4">
                        <select name="classid[]" class="form-control">
                          <option>Selelect Class</option>
                            @foreach ($Studentclass as $item)
                            <option value="{{$item -> id}}">{{$item -> name}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="col-4">
                        <input name="amount[]" type="text" class="form-control" value="{{old('amount[]')}}" placeholder="Amount">
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
