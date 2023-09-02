<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $apply = Apply::latest() -> where('trash', false) ->get();
        return view('admin.pages.hompage.application.index', [
            'apply'             => $apply,
            'form_type'         => 'create'
        ]);
    }
    public function showTrashApply()
    {
        $apply_data = Apply::latest() -> where('trash', true) -> get();
        return view('admin.pages.hompage.application.trash', [
            'apply_data'        => $apply_data,
            'form_type'         => 'trash',
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
       $this -> validate( $request, [
        'title'  => 'required',
        'desc'  => 'required'
       ]);

       $buttons = [];
        
        for ($i=0; $i < count($request -> btn_link); $i++) { 
            
            array_push($buttons,[
                'btn_title'     => $request -> btn_title[$i],
                'btn_link'     => $request -> btn_link[$i],
                'btn_type'     => $request -> btn_type[$i],
            ]);
        }


       Apply::create([
        'title'         => $request -> title,
        'desc'          => $request -> desc,
        'btns'          => json_encode($buttons),

       ]);

       return back() -> with('success', 'Application added successful');
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
        $apply = Apply::latest() ->get();
        $apply_data = Apply::findOrfail($id);
        return view('admin.pages.hompage.application.index', [
            'apply'                => $apply,
            'form_type'             => 'edit',
            'apply_data'           => $apply_data
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
        $update_data = Apply::findOrfail($id);

        $buttons = [];
        for ($i=0; $i < count($request -> btn_link); $i++) { 
            array_push($buttons,[
                'btn_title'     => $request -> btn_title[$i],
                'btn_link'     => $request -> btn_link[$i],
                'btn_type'     => $request -> btn_type[$i],
            ]);
        }

        $update_data -> update([
            'title'         => $request -> title,
            'desc'          => $request -> desc,
            'btns'          => json_encode($buttons),
           ]);
    
        return back() -> with('success', 'Apply updated successful');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Method
        $delete = Apply::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Apply delete successful');
    }

    public function applyStatus($id)
    {
        $apply_data = Apply::findOrfail($id);
        if ($apply_data -> status) {
            $apply_data -> update([
                'status'    => false
            ]);

        }else{
            $apply_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Apply Update Successful');
    }



    public function applyTrash($id)
    {
        $apply_data = Apply::findOrfail($id);
        if ($apply_data -> trash) {
            $apply_data -> update([
                'trash'    => false
            ]);

        }else{
            $apply_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
