<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Education Board Bangladesh</title>
	<link rel="stylesheet" href="{{asset('frontend/assets/css/syle.css')}}">

	<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/images/logo.png')}}">
</head>
<body>
	

	<div class="wraper">
		<div class="w-top">
			<div class="logo">
				<img src="{{asset('frontend/assets/images/logo.png')}}" alt="">
			</div>
			<div class="banner">
				<h3>Jamalpur Kaliakair M E H Arif Institute</h3>
				<h3>Nazmul Alam Standard Primary School</h3>
				<hr>
				<h4>Jamlpur, Kaliakair, Gazipur</h4>
			</div>
		</div>

		
			<h3 style="text-align:center"><u> <i> 
				@foreach ($exam as $item) 
				Result of {{$item -> name}} 
				@endforeach</i></u></h3>
		

		<div class="w-main">

				<div class="student-info">
					<div class="student-photo">
						<img src="{{url('storage/students/'. $data[0] -> studentinfo -> photo )}}" alt="">
					</div>
					<div class="student-details">
						<table>
							<tr>
								<td>Name</td>
								<td>{{$data[0] -> studentinfo -> name}}</td>
								
							</tr>
							<tr>
								<td>ID No</td>
								<td>{{$data[0] -> id_no}}</td>
							</tr>
							<tr>
								<td>Institute</td>
								<td>Jamalpur Kaliakair M E H Arif Institute</td>
							</tr>
						
						</table>
					</div>

				</div>

				<div class="student-result">
					<table>
						<tr>
							<td>#</td>
							<td>Subject</td>
							<td>Marks</td>
							<td>Grade Name</td>
							<td>GPA</td>
							
						</tr>

						@php
							$total_marks = 0;
							$totalpoints = 0;	
						@endphp
						 @foreach ($data as $item)
							@php
								$get_marks = $item -> studentmarks;
								$total_marks = (float)$total_marks + (float)$get_marks;
								$total_subject = App\Models\finalstudentsmarks::where('year_id', $item -> year_id) -> where('class_id', $item -> class_id) -> where('exam_type_id', $item -> exam_type_id) -> where('id_no', $item -> id_no) -> get() -> count();


								$grade_marks = App\Models\gradepoint::where([['start_marks', '<=', (int) $get_marks], ['end_marks', '>=', (int) $get_marks]]) -> first();

								$grade_name = $grade_marks -> grade_name;
								$grade_point = number_format((float)$grade_marks -> grade_point,2);
								$totalpoints =  (float)$grade_point + (float)$totalpoints;

						
							@endphp
						 
						<tr>
							<td>{{$loop -> index + 1}}</td>
							<td>{{$item -> assignsubject -> subject -> name}}</td>
							<td>{{$item -> studentmarks}}</td>
							<td>{{$grade_name}}</td>
							<td>{{$grade_point}}</td>
							
						</tr>
						@php
							$total_grade = 0;
							$point_for_letter_grade = (float)$totalpoints / (float)$total_subject;	

							$total_grade = App\Models\gradepoint::where([['start_point', '<=', $point_for_letter_grade], ['end_point', '>=', $point_for_letter_grade ]]) -> first();
                                                
                            $grade_point_avg = number_format((float) $totalpoints /  (float) $total_subject, 2);
						@endphp
						@endforeach
						<br>

						<tr>
							
							<td colspan="2" style="text-align:center; color: green"><b>Total Marks</b> </td>
							<td colspan="3"><b>{{$total_marks}}</b></td>
							
						</tr>

						<tr>
							
							<td colspan="2" style="text-align:center; color: green"><b>CGPA </b> </td>
							<td colspan="3"><b>{{$grade_point_avg}}</b></td>
							
						</tr>

						<tr>
							
							<td colspan="2" style="text-align:center; color: green"><b>Letter Grade</b> </td>
							<td colspan="3"><b>{{$total_grade -> grade_name}}</b></td>
							
						</tr>

						<tr>
							
							<td colspan="2" style="text-align:center; color: green"><b>Remark</b> </td>
							<td colspan="3"><b>{{$total_grade -> remarks}}</b></td>
							
						</tr>

						
					</table>
				</div>




		</div>
		
		<div class="w-footer">
			<div class="f-left">
				<button onclick="window.print()">Print this page</button>
				<p>©2005-2023 Jamlpur Kaliakair M E H Arif Institute, All rights reserved.</p>
			</div>
			<div class="f-right">
				<span>Powered by</span>
				<img style="width: 70px" src="frontend/assets/images/logo.png" alt="">
			</div>
		</div>
	</div>
	<div class="bottom">
		
	</div>

	

	
</body>
</html>