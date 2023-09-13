<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoutineModel;
use App\Models\Studentclass;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $routine = ClassRoutineModel::latest() -> where('status', true) -> get();
        return view('admin.pages.classroutine.allroutine', [
            'routine'       => $routine,
        ]);
    }

    public function createRoutine() {
        $subject = Subject::latest() -> where('status', true) -> get();
        $class = Studentclass::latest() -> where('status', true) -> get();
        return view('admin.pages.classroutine.index', [
            'subject'       => $subject,
            'class'         => $class,
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
       $this -> validate($request, [
            'class' => 'required',
       ]);
        
        $subject = [
            'sat900' => $request -> sat900,
            'sat950' => $request -> sat950,
            'sat1040' => $request -> sat1040,
            'sat1130' => $request -> sat1130,
            'sat1220' => $request -> sat1220,
            'sat150' => $request -> sat150,
            'sat235' => $request -> sat235,
            'sat320' => $request -> sat320,

            'sun900' => $request -> sun900,
            'sun950' => $request -> sun950,
            'sun1040' => $request -> sun1040,
            'sun1130' => $request -> sun1130,
            'sun1220' => $request -> sun1220,
            'sun150' => $request -> sun150,
            'sun235' => $request -> sun235,
            'sun320' => $request -> sun320,

            'mon900' => $request -> mon900,
            'mon950' => $request -> mon950,
            'mon1040' => $request -> mon1040,
            'mon1130' => $request -> mon1130,
            'mon1220' => $request -> mon1220,
            'mon150' => $request -> mon150,
            'mon235' => $request -> mon235,
            'mon320' => $request -> mon320,

            'tue900' => $request -> tue900,
            'tue950' => $request -> tue950,
            'tue1040' => $request -> tue1040,
            'tue1130' => $request -> tue1130,
            'tue1220' => $request -> tue1220,
            'tue150' => $request -> tue150,
            'tue235' => $request -> tue235,
            'tue320' => $request -> tue320,

            'wed900' => $request -> wed900,
            'wed950' => $request -> wed950,
            'wed1040' => $request -> wed1040,
            'wed1130' => $request -> wed1130,
            'wed1220' => $request -> wed1220,
            'wed150' => $request -> wed150,
            'wed235' => $request -> wed235,
            'wed320' => $request -> wed320,

            'thu900' => $request -> thu900,
            'thu950' => $request -> thu950,
            'thu1040' => $request -> thu1040,
            'thu1130' => $request -> thu1130,
            'thu1220' => $request -> thu1220,
            'thu150' => $request -> thu150,
            'thu235' => $request -> thu235,
            'thu320' => $request -> thu320,

        ];

      ClassRoutineModel::create([
        'class' => $request -> class,
        'subject' => json_encode($subject),

      ]);
        
      return back() -> with('success', 'Routine has been created successful');
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
