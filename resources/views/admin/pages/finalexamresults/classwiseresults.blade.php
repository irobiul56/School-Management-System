@extends('admin.layouts.app')

@section('main-section')

	<!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Marks Entry</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Marks Management</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

<form action="{{route('final.class.wise.result')}}" method="GET" enctype="multipart/form-data" >                
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                                @include('validate')
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-lg-12 col-form-label">Select Class <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="">-- Select Class ---</option>
                                                    @foreach ($class as $item)
                                                    <option value="{{$item -> id}}">{{$item -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-lg-12 col-form-label"> Select Year <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="">-- Select Year ---</option>
                                                    @foreach ($year as $item)
                                                    <option value="{{$item -> id}}">{{$item -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-lg-12 col-form-label">Select Exam Type <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                                <select name="exam_type_id" id="exam_type_id" class="form-control">
                                                    <option value="">-- Select Exam Type ---</option>
                                                    @foreach ($exam as $item)
                                                    <option value="{{$item -> id}}">{{$item -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-lg-12 col-form-label"> </label>
                                                
                                                    <button style="margin-top: 17px;" value="submit" class="btn btn-info">Search</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                
                        </div>
            </div>
        </div>
    </div>
</form>

@endsection
