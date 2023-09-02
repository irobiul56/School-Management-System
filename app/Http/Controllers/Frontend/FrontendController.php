<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Examtype;
use App\Models\Studentyear;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use App\Models\finalstudentsmarks;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admin;
use App\Models\Apply;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function showloginform()
    {
        return view('frontend.login');
    }

    public function userlogin(Request $request)
    {
        if( Auth::guard('admin') -> attempt( [ 'email' => $request -> email, 'password' => $request -> password ] ) ){
            return redirect() -> route('admin.dashboard');
        } else {
            return redirect() -> route('show.login.form'); 
        }
    }

    public function resultsearchpage()
    {
       
        $year = Studentyear::latest() -> where('status', true) -> get();
        $class = Studentclass::latest() -> where('status', true) -> get();
        $exam = Examtype::latest() -> where('status', true) -> get();
        return view('frontend.index',[ 
          'year'                    => $year,  
          'class'                   => $class,   
          'exam'                    => $exam,   
        ]);
    }
    

    public function resultsearch(Request $request)
    {
       
        $fail_count = finalstudentsmarks::where('year_id', $request -> year_id) -> where('class_id', $request -> class_id) -> where('exam_type_id', $request -> exam_type_id) -> where('id_no', $request -> id_no)-> where('studentmarks', '<', '33') -> get() -> count();

        $singlestudent = finalstudentsmarks::where('year_id', $request -> year_id) -> where('class_id', $request -> class_id) -> where('exam_type_id', $request -> exam_type_id) -> where('id_no', $request -> id_no)-> first();

        if ($singlestudent == true) {
            # code...
            $data = finalstudentsmarks::with('studentinfo','year', 'assignsubject') -> where('class_id', $request->class_id)->where('year_id', $request-> year_id)-> where('exam_type_id', $request ->exam_type_id)-> where('id_no', $request -> id_no) -> get();
            $exam = Examtype:: where('id', $request -> exam_type_id) -> get();
            // return dd($data) ->to_arry();
    
            return view('frontend.search',[
                'data'                 => $data,  
                'exam'                 => $exam,  
            ]);
        }else{
            return back() -> with('danger', 'Does not match your information');
        }         
    }

    public function homepage() {
        $sliders = Slider::Where('status', true) ->where('trash', false)->latest() -> get();
        $about = About::Where('status', true) ->where('trash', false)->latest() -> get();
        $apply = Apply::Where('status', true) ->where('trash', false)->latest() -> get();
        $teacher = Admin::Where('status', true) ->where('trash', false)->latest() -> limit(4) -> get();
        $notice = Notice::with('userdata')->Where('status', true) ->where('trash', false)->latest() -> limit(3) -> get();
        $testimonial = Testimonial::Where('status', true) ->where('trash', false)->latest() -> get();
        return view('frontend.layouts.pages.homepage',[
           'sliders'            =>  $sliders,
           'about'              =>  $about,
           'notice'             =>  $notice,
           'apply'              =>  $apply,
           'teacher'            =>  $teacher,
           'testimonial'        =>  $testimonial,
        ]);
    }
}
