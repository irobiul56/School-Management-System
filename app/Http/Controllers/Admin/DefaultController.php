<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignstudent;
use App\Models\Assignsubject;
use App\Models\Studentmarks;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class DefaultController extends Controller
{
    public function getsubject($id)
    {
        $assign_subject =Assignsubject::with('subject')->where('class_id', $id) -> get();
        return response()-> json($assign_subject);
    }

    //getstudent

    public function getstudent(Request $request)
    {
       $year_id = $request -> year_id;
       $class_id = $request -> class_id;
       $assign_subject_id = $request -> assign_subject_id;
       $exam_type_id = $request -> exam_type_id;
      

        $alldata = Assignstudent::with('studentinfo')->where('class_id', $class_id) ->where('year_id', $year_id)->get();
        return response()->json($alldata);
       
       

    }

    public function getstudenteditmarks(Request $request)
    {
       $year_id = $request -> year_id;
       $class_id = $request -> class_id;
       $assign_subject_id = $request -> assign_subject_id;
       $exam_type_id = $request -> exam_type_id;
   
       $alldata = Studentmarks::with('studentinfo')->where('class_id', $class_id) ->where('year_id', $year_id)->where('assign_subject_id', $assign_subject_id)->where('exam_type_id', $exam_type_id)->get();
       return response()->json($alldata);

    }

    public function marksedit(Request $request)
    {
        $this-> validate($request,[
            'class_id'                  => 'required',
            'year_id'                   => 'required',
            'assign_subject_id'         => 'required',
            'exam_type_id'              => 'required',
        ]);

        Studentmarks::where('class_id', $request->class_id)->where('year_id', $request-> year_id)-> where('assign_subject_id', $request-> assign_subject_id)->where('exam_type_id', $request ->exam_type_id)-> delete();
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


       return back() -> with('success', 'Marks Edit Successful');
    }

    
}
