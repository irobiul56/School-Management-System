<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignsubject;
use App\Models\Examtype;
use App\Models\Student;
use App\Models\Studentclass;
use App\Models\Studentmarks;
use App\Models\Studentyear;
use App\Models\Subject;
use Illuminate\Http\Request;

class MarksController extends Controller
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
        return view('admin.pages.marksmanagement.marksview',[
          'student'                 => $student,  
          'year'                    => $year,  
          'class'                   => $class,   
          'exam'                    => $exam,  
        ]);
    }

     public function getstudentmarks()
    {
        $student = Student::latest() -> where('status', true) -> get();
        $year = Studentyear::latest() -> where('status', true) -> get();
        $class = Studentclass::latest() -> where('status', true) -> get();
        $exam = Examtype::latest() -> where('status', true) -> get();
        return view('admin.pages.marksmanagement.editmarks',[
          'student'                 => $student,  
          'year'                    => $year,  
          'class'                   => $class,   
          'exam'                    => $exam,  
        ]);
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
            'class_id'                  => 'required',
            'year_id'                   => 'required',
            'assign_subject_id'         => 'required',
            'exam_type_id'              => 'required',
        ]);

       $studentcount = $request -> id;
       if ($studentcount) {
            for ($i=0; $i < count($request ->id); $i++) { 
                $data = New Studentmarks();
                $data -> class_id = $request -> class_id;
                $data -> year_id  = $request -> year_id;
                $data -> assign_subject_id  = $request -> assign_subject_id;
                $data -> exam_type_id  = $request -> exam_type_id;
                $data -> student_id  = $request -> id[$i];
                $data -> id_no  = $request -> student_id[$i];
                $data -> marks  = $request -> marks[$i];
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
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
