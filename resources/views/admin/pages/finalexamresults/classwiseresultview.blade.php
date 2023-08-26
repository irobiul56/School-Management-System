@extends('admin.layouts.app')

@section('main-section')

	<!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Class Wise Result</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Marks Management</li>
                </ul>
            </div>
            <div class="text-center col-sm-12">
                
                @foreach ($exam as $item)
                <b> Result of {{$item -> name}}</b> <br>
                @endforeach

                @foreach ($class as $item)
                   {{$item -> name}}<br> 
                @endforeach

                @foreach ($year as $item)
                Exam Year: {{$item -> name}}
            @endforeach
            </div>
        </div>
    </div>
    <!-- /Page Header -->               
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                            <div class="card-body">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Roll</th>
                                            <th>Name</th>
                                            <th>Id No</th>
                                            <th>Total Marks</th>
                                            <th>Letter Grade</th>
                                            <th>Grade Point</th>
                                            <th>Remark</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($data as $item)
                                        @php
                                            $allmarks = App\Models\finalstudentsmarks::where('year_id', $item -> year_id) -> where('class_id', $item -> class_id) -> where('exam_type_id', $item -> exam_type_id) -> where('student_id', $item -> student_id)-> get();

                                            $totalmarks = 0;
                                            $totalpoint = 0;
                                            
                                            foreach ($allmarks as $value) {
                                                $fail_count = App\Models\finalstudentsmarks::where('year_id', $item -> year_id) -> where('class_id', $item -> class_id) -> where('exam_type_id', $item -> exam_type_id) -> where('student_id', $item -> student_id)-> where('studentmarks', '<', '33') -> get() -> count();

                                                $get_marks = $value -> studentmarks;

                                                $grade_marks = App\Models\gradepoint::where([['start_marks', '<=', (int) $get_marks], ['end_marks', '>=', (int) $get_marks]]) -> first();

                                                $grade_name = $grade_marks -> grade_name;
                                                $grade_point = number_format((float)$grade_marks -> grade_point,2);
                                                $totalpoints =  (float)$grade_point + (float)$totalpoint;
                                            }
                                        @endphp
                                        <tr>

                                            <td>{{$loop -> index + 1}}</td>
                                            <td>{{$item -> studentinfo -> name}}</td>
                                            <td>{{$item -> studentinfo -> student_id}}</td>
                                            
                                            @php
                                                $total_subject = App\Models\finalstudentsmarks::where('year_id', $item -> year_id) -> where('class_id', $item -> class_id) -> where('exam_type_id', $item -> exam_type_id) -> where('student_id', $item -> student_id)-> get() -> count();

                                                $total_grade = 0;
                                                $point_for_latter_grade = (float) $totalpoints / (float) $total_subject;

                                                $total_grade = App\Models\gradepoint::where([['start_point', '<=', $point_for_latter_grade], ['end_point', '>=', $point_for_latter_grade ]]) -> first();
                                                
                                                $grade_point_avg = number_format((float) $totalpoints /  (float) $total_subject, 2);
                                            @endphp

                                            <td> {{$get_marks/ $total_subject }}</td>

                                            <td>@if ($fail_count > 0)
                                                F    
                                                @else
                                                   {{$total_grade -> grade_name ?? 0}} 
                                                @endif
                                            </td>
                                            <td> @if ($fail_count > 0)
                                                0.00    
                                                @else
                                                   {{$grade_point_avg }} 
                                                @endif
                                            </td>
                                            <td> @if ($fail_count > 0)
                                                Fail    
                                                @else
                                                   {{$total_grade -> remarks ?? "Result Not Publish" }} 
                                                @endif</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>
    </div>

@endsection
