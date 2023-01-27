<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gradepoint;
use Illuminate\Http\Request;

class GradepointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $gradepoint = gradepoint::get();
        return view('admin.pages.marksmanagement.gradepointavarage', [
            'gradepoint'        => $gradepoint,
            'form_type'              => 'create',
        ]); 
    }

    public function gradepointavarage()
    {
       return view('admin.pages.marksmanagement.gradepoint');
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
            'grade_name'                => 'required',
            'grade_point'               => 'required',
            'start_marks'               => 'required',
            'end_marks'                 => 'required',
            'start_point'               => 'required',
            'end_point'                 => 'required',
            'remarks'                   => 'required',
        ]);

        gradepoint::create([
                'grade_name'        => $request -> grade_name,
                'grade_point'       => $request -> grade_point,
                'start_marks'       => $request -> start_marks,
                'end_marks'         => $request -> end_marks,
                'start_point'       => $request -> start_point,
                'end_point'         => $request -> end_point,
                'remarks'           => $request -> remarks,
               ]);
        
        
               return back() -> with('success', 'Grade Point Added Successful');

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
