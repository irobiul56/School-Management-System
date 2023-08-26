@extends('admin.layouts.app')

@section('main-section')

	<!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Monthly Exam</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Marks Management</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

<form action="{{route('monthly-exam.store')}}" method="POST" enctype="multipart/form-data">                
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
                                                <select name="class_id" id="class_id" class="form-control" required>
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
                                                <label class="col-lg-12 col-form-label"> Select Subject <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                                <select name="assign_subject_id" id="assign_subject_id" class="form-control">
                                                    <option value="">-- Select Subject ---</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-lg-12 col-form-label"> Select Year <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                                <select name="year_id" id="year_id" class="form-control" required>
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
                                                <label class="col-lg-12 col-form-label">Select Exam Date <span style="font-size: 20px" class="text-danger"> * </span> </label>
                                                    <input name="date" id="date" class="form-control" type="date" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button id="search" name="search" class="btn btn-info">Search</button>
                                </div>
                        </div>

                            <div class="card-body">
                                <div id="marks-entry" class="table-responsive d-none">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Id No</th>
                                                <th>Father's Name</th>
                                                <th>Mother's Name</th>
                                                <th>Gender</th>
                                                <th>Enter Marks</th>
                                            </tr>
                                        </thead>
                                        <tbody id="marks-entry-tr">
                                            

                                        </tbody>
                                    </table>
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript">
    $(document).on('click', '#search', function(e) {
        e.preventDefault();
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var date = $('#date').val();



        $.ajax({
                    url:"get-student",
                    type:"GET",
                    data:{'class_id':class_id, 'year_id':year_id},
                    success:function(data){
                        $("#marks-entry").removeClass("d-none");
                        var html ='';
                        var i =1;
                        $.each(data, function(key, value){
                            html += 
                            '<tr>'+
                                '<td>'+ i +'</td>'+
                                '<td>'+ value.studentinfo.name +'</td>'+
                                '<td>'+ value.studentinfo.student_id +'<input type="hidden" name="student_id[]" value="'+value.studentinfo.student_id+'"></td>'+
                                '<td>'+ value.studentinfo.fathername +'</td>'+
                                '<td>'+ value.studentinfo.mothername +'</td>'+
                                '<td>'+ value.studentinfo.gender +'</td>'+ 
                                '<td><input type="text" class="form-control border border-primary" name="marks[]" required> </td>'+
                                '<input type="hidden" name="id[]" value="'+value.studentinfo.id+'"></td>'+

                            '</tr>';
                            i++;
                        });
                        html = $('#marks-entry-tr').html(html);
                    }
                })
    })
</script>

@endsection
