<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoverningBody as ModelsGoverningBody;

class governingBody extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Admin::latest() -> where('status', true) -> get();
        $governingbody = ModelsGoverningBody::latest() -> where('status', true) -> get();
        return view('admin.pages.governingbody.index', [
            'user'                  => $user,
            'governingbody'         => $governingbody,
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

        // return $request -> all();
        
        $this -> validate( $request, [
            'admin_id'    => 'required|unique:governing_bodies',
           ]);

       ModelsGoverningBody::create([
        'admin_id'     => $request -> admin_id,
       ]);

       return back() -> with('success', 'Governing Body added successful');
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
        $delete = ModelsGoverningBody::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Governing Body delete successful');
    }

    public function governingStatus($id)
    {
        $about_data = ModelsGoverningBody::findOrfail($id);
        if ($about_data -> status) {
            $about_data -> update([
                'status'    => false
            ]);

        }else{
            $about_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Status Update Successful');
    }
}
