@extends('admin.layouts.app')
@section('main-section')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-center">Addmission Form</h1>
            </div>
            <div class="card-body">
                <h4 class="card-title">Student Information Information</h4> 
                @include('validate')
                <hr style="border-top: 5px solid green">
                <form action="{{route('admission.update', $students -> id)}}" method="POST" enctype="multipart/form-data">                
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Name <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{$students -> name}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Father's Name <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name ="fathername" value="{{$students-> fathername}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Mother's Name <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="mothername" value="{{$students-> mothername}}" type="text" class="form-control">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Gender</label>
                                <div class="col-lg-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender[]" id="gender_male" value="male" checked="">
                                        <label class="form-check-label" for="gender_male">
                                        Male
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender[]" id="gender_female" value="female">
                                        <label class="form-check-label" for="gender_female">
                                        Female
                                        </label>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date Of Birth <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="dob" type="date" value="{{$students ->dob}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Past School</label>
                                <div class="col-lg-9">
                                    <input name="pastschool" value="{{$students -> pastschool}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Admission Class <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                <div class="col-lg-9">
                                    <select name="class" id="" class="form-control">
                                        <option value="">-- Select Class ---</option>
                                        @foreach ($class as $item)
                                        <option {{ ($item-> id) == $students -> admitedclass ? 'selected' : '' }} value="{{$item -> id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Group</label>
                                <div class="col-lg-9">
                                    <select name="group" id="" class="form-control">
                                        <option value="">-- Select Class ---</option>
                                        @foreach ($group as $item)
                                        <option {{ ($item-> id) == $students -> admit_group ? 'selected' : '' }} value="{{$item -> id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Father's Phone <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="fatherphone" value="{{$students -> fatherphone}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Mother's Phone <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="motherphone" value="{{$students -> motherphone}}" type="text" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="text-center">
                            <label class="border" style="width:150px; height: 160px;">
                            <img class="img-thumbnail" style="width:100%; height:100%;" id="student-photo-preview" src="{{url('storage/students/' . $students -> photo)}}" alt="">
                            </label>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Photo <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="photo" type="file" class="form-control" id="student-photo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Year</label>
                                <div class="col-lg-9">
                                    <select name="year" id="" class="form-control">
                                        <option value="">-- Select Admission Year ---</option>
                                        @foreach ($year as $item)
                                        <option {{ ($item-> id) == $students -> year ? 'selected' : '' }} value="{{$item -> id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Shift</label>
                                <div class="col-lg-9">
                                    <select name="shift" id="" class="form-control">
                                        <option value="">-- Select Shift ---</option>
                                        @foreach ($shift as $item)
                                        <option {{ ($item-> id) == $students -> shift ? 'selected' : '' }}  value="{{$item -> id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Birth Certificate <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                <div class="col-lg-9">
                                    <input name="bcn" value="{{$students -> birthnumber}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Father's NID  <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="fnid" value="{{$students -> fnid}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Mother's NID  <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="mnid" value="{{$students -> mnid}}" type="text" class="form-control">
                                </div>
                            </div>   
                        </div>
                    </div>
                    <h4 class="card-title">Present Address  <span style="font-size: 20px" class="text-danger"> * </span></h4>
                    <hr style="border-top: 5px solid green">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address Line 1</label>
                                <div class="col-lg-9">
                                    <input name="address1" value="{{$students -> presentaddress}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address Line 2</label>
                                <div class="col-lg-9">
                                    <input name="address2" value="{{$students -> permanentaddress}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">State</label>
                                <div class="col-lg-9">
                                    <input name="state" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">City</label>
                                <div class="col-lg-9">
                                    <input name="city" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Country</label>
                                <div class="col-lg-9">
                                    <input name="country" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Postal Code</label>
                                <div class="col-lg-9">
                                    <input name="postcode" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title">Permanent Address</h4>
                    <hr style="border-top: 5px solid green">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address Line 1</label>
                                <div class="col-lg-9">
                                    <input name="peraddress1" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address Line 2</label>
                                <div class="col-lg-9">
                                    <input name="peraddress2" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">State</label>
                                <div class="col-lg-9">
                                    <input name="state2" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">City</label>
                                <div class="col-lg-9">
                                    <input name="city2" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Country</label>
                                <div class="col-lg-9">
                                    <input name="country2" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Postal Code</label>
                                <div class="col-lg-9">
                                    <input name="postcode2" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title">Gurdian Information</h4>
                    <hr style="border-top: 5px solid green">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Gurdian Name</label>
                                <div class="col-lg-9">
                                    <input name="gurdianname" value="{{$students->gurdianname}}" type="text" class="form-control">
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Gurdian Phone</label>
                                <div class="col-lg-9">
                                    <input name="gurdianphone" value="{{$students->gurdianphone}}" type="text" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection