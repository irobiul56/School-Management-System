@extends('admin.layouts.app')
@section('main-section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-center"> Employee Edit Form</h1>
            </div>
            <div class="card-body">
                <h4 class="card-title">Employee Information</h4> 
                @include('validate')
                <hr style="border-top: 5px solid green">
                <form action="{{route('user.update', $user -> id)}}" method="POST" enctype="multipart/form-data">                
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student Name <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="name" value="{{$user -> name}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Father's Name <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name ="fname" value="{{$user-> fname}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Mother's Name <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="mname" value="{{$user-> mname}}" type="text" class="form-control">
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
                                    <input name="dob" type="date" value="{{$user ->dob}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone Number</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{$user -> phone}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email Number</label>
                                <div class="col-lg-9">
                                    <input name="email" value="{{$user -> email}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Role <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                <div class="col-lg-9">
                                    <select name="class" id="" class="form-control">
                                        <option value="">-- Select Role ---</option>
                                        @foreach ($role as $item)
                                        <option {{ ($item-> id) == $user -> role ? 'selected' : '' }} value="{{$item -> id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="text-center">
                            <label class="border" style="width:150px; height: 160px;">
                            <img class="img-thumbnail" style="width:100%; height:100%;" id="student-photo-preview" src="{{url('storage/user/' . $user -> photo)}}" alt="">
                            </label>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Photo <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="photo" type="file" class="form-control" id="student-photo">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Employee ID <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                <div class="col-lg-9">
                                    <input disabled name="id_no" value="{{$user -> id_no}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Salary  <span style="font-size: 20px" class="text-danger"> * </span></label>
                                <div class="col-lg-9">
                                    <input name="salary" value="{{$user -> salary}}" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Designation <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                <div class="col-lg-9">
                                    <select name="class" id="" class="form-control">
                                        <option value="">-- Select Designation ---</option>
                                        @foreach ($designation as $item)
                                        <option {{ ($item-> id) == $user -> designation ? 'selected' : '' }} value="{{$item -> id}}">{{$item -> name}}</option>
                                        @endforeach
                                    </select>
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
                                    <input name="address1" value="{{$user -> address}}" type="text" class="form-control">
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
                   

                    <div class="text-right">
                        <button class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 