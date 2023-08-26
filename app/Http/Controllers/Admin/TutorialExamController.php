<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Examtype;
use App\Models\Studentyear;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use App\Models\tutorialmarksmodel;
use App\Http\Controllers\Controller;

class TutorialExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::latest() -> where('status', true) -> get();
        $year = Studentyear::latest() -> where('status', true) -> get();
        $class = Studentclass::latest() -> where('status', true) -> get();
        $exam = Examtype::latest() -> where('status', true) -> get();
        return view('admin.pages.marksmanagement.tutorialmarksinsert',[
          'student'                 => $student,  
          'year'                    => $year,  
          'class'                   => $class,   
          'exam'                    => $exam,  
        ]);
    }

    public function tutorialmarkshow()
    {
        $student = Student::latest() -> where('status', true) -> get();
        $year = Studentyear::latest() -> where('status', true) -> get();
        $class = Studentclass::latest() -> where('status', true) -> get();
        $exam = Examtype::latest() -> where('status', true) -> get();
        return view('admin.pages.marksmanagement.tutorialmarkshow',[
          'student'                 => $student,  
          'year'                    => $year,  
          'class'                   => $class,   
          'exam'                    => $exam,  
        ]);
    }

    public function tutorialeditmarks(Request $request)
    {
       $year_id = $request -> year_id;
       $class_id = $request -> class_id;
       $assign_subject_id = $request -> assign_subject_id;
       $tutorial_for_terminal_exam = $request -> tutorial_for_terminal_exam;
   
       $alldata = tutorialmarksmodel::with('studentinfo')->where('class_id', $class_id) ->where('year_id', $year_id)->where('assign_subject_id', $assign_subject_id)->where('exam_type_id', $tutorial_for_terminal_exam)->get();
       return response()->json($alldata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request,[
            'class_id'                      => 'required',
            'year_id'                       => 'required',
            'assign_subject_id'             => 'required|unique:tutorialmarksmodels,assign_subject_id',
            'tutorial_for_terminal_exam'    => 'required',
            
        ]);

       $studentcount = $request -> id;
       if ($studentcount) {
            for ($i=0; $i < count($request ->id); $i++) { 
                $data = New tutorialmarksmodel();
                $data -> class_id = $request -> class_id;
                $data -> year_id  = $request -> year_id;
                $data -> assign_subject_id  = $request -> assign_subject_id;
                $data -> exam_type_id = $request -> tutorial_for_terminal_exam;
                $data -> student_id  = $request -> id[$i];
                $data -> id_no  = $request -> student_id[$i];
                $data -> first_tutorial	= $request -> first_tutorial[$i] ?: 0;
                $data -> second_tutorial = $request -> second_tutorial[$i] ?: 0;
                $data -> third_tutorial = $request -> third_tutorial[$i] ?: 0;
                $data -> forth_tutorial	= $request -> forth_tutorial[$i] ?: 0;
                $data -> fifth_tutorial	= $request -> fifth_tutorial[$i] ?:0;
                $data -> six_tutorial	= $request -> six_tutorial[$i] ?: 0;
                $data -> monthly_exam	= $request -> monthly_exam[$i] ?: 0;
                $data -> save();
            
            }
       }


       return back() -> with('success', 'Marks Inserted Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function tutorialdataupdate(Request $request)
     {

        $this-> validate($request,[
            'class_id'                      => 'required',
            'year_id'                       => 'required',
            'assign_subject_id'             => 'required',
            'tutorial_for_terminal_exam'    => 'required',
        ]);

        tutorialmarksmodel::where('class_id', $request->class_id)->where('year_id', $request-> year_id)-> where('assign_subject_id', $request-> assign_subject_id)->where('tutorial_for_terminal_exam', $request ->tutorial_for_terminal_exam)-> delete();
        $studentcount = $request -> id;
       if ($studentcount) {
            for ($i=0; $i < count($request ->id); $i++) { 
                $data = New tutorialmarksmodel();
                $data -> class_id = $request -> class_id;
                $data -> year_id  = $request -> year_id;
                $data -> assign_subject_id  = $request -> assign_subject_id;
                $data -> exam_type_id = $request -> tutorial_for_terminal_exam;
                $data -> student_id  = $request -> id[$i];
                $data -> id_no  = $request -> student_id[$i];
                $data -> first_tutorial	= $request -> first_tutorial[$i];
                $data -> second_tutorial = $request -> second_tutorial[$i];
                $data -> third_tutorial = $request -> third_tutorial[$i];
                $data -> forth_tutorial	= $request -> forth_tutorial[$i];
                $data -> fifth_tutorial	= $request -> fifth_tutorial[$i];
                $data -> six_tutorial	= $request -> six_tutorial[$i];
                $data -> monthly_exam	= $request -> monthly_exam[$i];
                $data -> save();
            
            }
       }

       return back() -> with('success', 'Tutorial Marks Update Successful');
     }


    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
