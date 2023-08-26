@extends('admin.layouts.app')

@section('main-section')
<form action="{{route('publish.result')}}" method="POST" enctype="multipart/form-data">                
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">All Admission Student </h4> 
                    </div>
                    <div>
                        <a href="{{route('show.student.form')}}" class="btn btn-sm btn-info"> Admission Form <i class="fa fa-arrow-right"></i></a>
                        <a href="{{route('trash-student-show')}}" class="btn btn-sm btn-danger"> Trash Student <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                @include('validate')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search table-bordered">
                            <thead>
                                <tr>
                                    <td class="align-middle text-center" rowspan="2">#</td>
                                    <td class="align-middle text-center" rowspan="2">Id</td>
                                    <td class="align-middle text-center" rowspan="2">Name</td>
                                    <td class="text-center" colspan="7">Tutorial</td>
                                    <td class="text-center" colspan="2">Monthly Exam</td>
                                    <td class="align-middle text-center" rowspan="2">Sub Total</td>
                                    <td class="text-center" colspan="2">Terminal Examination</td>
                                    <td class="align-middle text-center" rowspan="2">Total Marks</td>
                                </tr>
                                <tr>
                                    <td class="align-middle text-center">1st</td>
                                    <td class="align-middle text-center">2nd</td>
                                    <td class="align-middle text-center">3rd</td>
                                    <td class="align-middle text-center">4th</td>
                                    <td class="align-middle text-center">5th</td>
                                    <td class="align-middle text-center">6th</td>
                                    <td class="align-middle text-center">15%</td>

                                    <td class="align-middle text-center">Marks</td>
                                    <td class="align-middle text-center">5%</td>

                                    <td class="align-middle text-center">Marks</td>
                                    <td class="align-middle text-center">80%</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($data as $item)   
                                    <tr>
                                        <td class="align-middle text-center">{{$loop -> index + 1}}</td>
                                        <input type="hidden" name="class_id[]" value="{{$item -> class_id}}">
                                        <input type="hidden" name="year_id[]" value="{{$item -> year_id}}">
                                        <input type="hidden" name="exam_type_id[]" value="{{$item -> exam_type_id}}">
                                        <input type="hidden" name="assign_subject_id[]" value="{{$item -> assign_subject_id}}">
                                        <input type="hidden" name="id[]" value="{{$item -> student_id}}">

                                        <td class="align-middle text-center"><span style="border: 1px solid green; padding: 5px; border-radius: 10%; color: green; font-weight: bold;">{{$item -> id_no}} <input type="hidden" name="student_id[]" value="{{$item -> id_no}}"></span></p></td>
                                        <td class="align-middle">{{$item -> studentinfo-> name}} <input type="hidden" name="name[]" value="{{$item -> studentinfo-> name}}"></td>  
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> first_tutorial}}</td>
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> second_tutorial}}</td>
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> third_tutorial}}</td>
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> forth_tutorial}}</td>
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> fifth_tutorial}}</td>
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> six_tutorial}}</td>
                                        <td class="align-middle text-center">{{$tutorialavg = ((
                                            
                                            $item -> tutorialmarks -> first_tutorial+
                                            $item -> tutorialmarks -> second_tutorial+
                                            $item -> tutorialmarks -> third_tutorial+
                                            $item -> tutorialmarks -> forth_tutorial+
                                            $item -> tutorialmarks -> fifth_tutorial+
                                            $item -> tutorialmarks -> six_tutorial
                                        
                                        )*15/60)
                                        }}</td>
                                   
                                        <td class="align-middle text-center">{{$item -> tutorialmarks -> monthly_exam}}</td>
                                        <td class="align-middle text-center">{{$monthlyexam=(($item -> tutorialmarks -> monthly_exam)*5/10)}}</td>

                                        <td class="align-middle text-center">{{ $tutorialmonthly = ($tutorialavg + $monthlyexam)}}</td>

                                        <td class="align-middle text-center">{{$item -> marks}}</td>
                                        <td class="align-middle text-center">{{$mark = ($item -> marks)*80/100}}</td>
                                       
                                        <td class="align-middle text-center">{{$tutorialmonthly + $mark}} <input name="studentmarks[]" type="hidden" value="{{$tutorialmonthly + $mark}}"> </td>
                                        
                                        
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-12">
                        <label class="col-lg-12 col-form-label"> </label>
                        
                            <button style="margin-top: 17px;" value="submit" class="btn btn-info">Publish Result</button>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection