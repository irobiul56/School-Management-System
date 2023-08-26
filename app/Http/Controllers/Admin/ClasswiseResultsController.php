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

class ClasswiseResultsController extends Controller
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
        return view('admin.pages.finalexamresults.classwiseresults',[
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
    public function finalclasswiseresult(Request $request)
    {
        
        $data = finalstudentsmarks::with('studentinfo','year') -> where('class_id', $request->class_id)->where('year_id', $request-> year_id)-> where('exam_type_id', $request ->exam_type_id)-> select(['year_id', 'class_id', 'exam_type_id','student_id'])-> groupby(['year_id', 'class_id', 'exam_type_id','student_id'])-> orderBy('studentmarks', 'desc') -> selectRaw('sum(studentmarks) as studentmark')-> get();
        
        $class = Studentclass:: where('id', $request -> class_id) -> get();
        $exam = Examtype:: where('id', $request -> exam_type_id) -> get();
        $year = Studentyear:: where('id', $request -> year_id) -> get();
       
        // return dd($data);
        return view('admin.pages.finalexamresults.classwiseresultview',[
            'data'                 => $data,  
            'class'                 =>$class,  
            'exam'                 => $exam,  
            'year'                 => $year,  
              
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
}
