<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Examtype;
use App\Models\Studentyear;
use App\Models\Studentclass;
use App\Models\Studentmarks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\finalstudentsmarks;
use App\Models\monthlyexam;
use App\Models\tutorialmarksmodel;

use function GuzzleHttp\Promise\all;

class FinalExamResultController extends Controller
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
        return view('admin.pages.finalexamresults.results',[
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Studentmarks::with('studentinfo')-> with('tutorialmarks')->where('class_id', $request->class_id)->where('year_id', $request-> year_id)-> where('exam_type_id', $request ->exam_type_id)-> where('assign_subject_id', $request-> assign_subject_id)->get();
        // return dd($data);
        return view('admin.pages.finalexamresults.allresults',[
            'data'                 => $data,  
              
          ]);
        
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
    public function update(Request $request, $id)
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


    public function publishresult(Request $request)
    {

        // return $request -> all();

        $this-> validate($request,[
            
        ]);

       $studentcount = $request -> id;
       if ($studentcount) {
            for ($i=0; $i < count($request ->id); $i++) { 
                $data = New finalstudentsmarks();
                $data -> class_id = $request -> class_id[$i];
                $data -> year_id  = $request -> year_id[$i];
                $data -> assign_subject_id  = $request -> assign_subject_id[$i];
                $data -> exam_type_id  = $request -> exam_type_id[$i];
                $data -> student_id  = $request -> id[$i];
                $data -> id_no  = $request -> student_id[$i];
                $data -> studentmarks  = $request -> studentmarks[$i];
                $data -> save();
            
            }
       }

       return back() -> with('success', 'Result Published Successful');
    }



}
