<?php

namespace App\Http\Controllers\Admin;

use SweetAlert;
use App\Models\Subject;
use Illuminate\Support\Str;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Studentclass::latest() -> where('status', true) -> get();
        $subject = Subject::latest() -> where('status', true) -> get();
        return view('admin.pages.studentsetup.studentclass', [
            'class'         => $class,
            'subject'       => $subject,
            'form_type'     => 'create',
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
            'name'      => 'required|unique:studentclasses',
        ]);

       Studentclass::create([
        'subject_id'    => json_encode($request -> subject),
        'name'          => $request -> name,
       ]);


       return back() -> with('success', 'Class Added Successful');

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
        $edit = Studentclass::findOrFail($id);
        $subject = Subject::latest() -> get();
        $class = Studentclass::latest() -> get();
        return view('admin.pages.studentsetup.studentclass', [
            'subject'               => $subject,
            'class'                 => $class,
            'form_type'             => 'edit',
            'edit'                  => $edit,
        ]);
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
        $update_data = Studentclass::findOrfail($id);
        $update_data ->update([
            'name'              => $request -> name,
            'subject_id'        => json_encode($request -> subject)
        ]);

        return back() -> with('success-main', 'Class Updated Successful');
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
