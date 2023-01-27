<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assignsubject;
use App\Models\Studentclass;

use function GuzzleHttp\Promise\all;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignsubject = Assignsubject::latest() -> select('class_id')-> groupBy('class_id') -> where('status', true) -> get();
        return view('admin.pages.studentsetup.assignsubjectshow', [
            'assignsubject'             => $assignsubject,
            'form_type'                 => 'create',
        ]);
    }

    public function showassignsubjectform()
    {
        $subject = Subject::latest() -> where('status', true) -> get();
        $class = Studentclass::latest() -> where('status', true) -> get();
        return view('admin.pages.studentsetup.assignsubjectform', [
            'subject'                   => $subject,
            'class'                     => $class,
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
            'class'                 => 'required|not_in:0',
            'subject.*'             => 'required',
            'fullmark.*'            => 'required|not_in:0',
            'passmark.*'            => 'required|not_in:0', 
            'subjectivemark.*'     => 'required|not_in:0', 
        ]);
    
        $fullmark = count($request -> fullmark);
    
            if ($fullmark != NULL) {
                for ($i=0; $i < $fullmark; $i++) { 
                    $assignsubject = New Assignsubject();
                    $assignsubject -> class_id          = $request -> class;
                    $assignsubject -> subject_id        = $request -> subject[$i];
                    $assignsubject -> full_mark         = $request -> fullmark[$i];
                    $assignsubject -> pass_mark         = $request -> passmark[$i];
                    $assignsubject -> subjective_mark   = $request -> subjectivemark[$i];
    
                    $assignsubject -> save();
                }
            }
    
            return back() -> with('success', 'Assign Subject Added Successful');
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
