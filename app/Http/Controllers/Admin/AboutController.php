<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $about = About::latest() -> where('trash', false) ->get();
        return view('admin.pages.hompage.about.index', [
            'about'             => $about,
            'form_type'         => 'create'
        ]);
    }
    public function showTrashAbout()
    {
        $about_data = About::latest() -> where('trash', true) -> get();
        return view('admin.pages.hompage.about.trash', [
            'about_data'      => $about_data,
            'form_type'     => 'trash',
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

       About::create([
        'title'      => $request -> title,
        'desc'      => $request -> desc

       ]);

       return back() -> with('success', 'about added successful');
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
        $about = About::latest() ->get();
        $aboutus = About::findOrfail($id);
        return view('admin.pages.hompage.about.index', [
            'about'             => $about,
            'form_type'         => 'edit',
            'aboutus'           => $aboutus
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
        $update_data = About::findOrfail($id);
        $update_data -> update([
            'title'         => $request -> title,
            'desc'          => $request -> desc
           ]);
    
        return back() -> with('success', 'About updated successful');


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
        $delete = About::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'About delete successful');
    }

    public function aboutStatus($id)
    {
        $about_data = About::findOrfail($id);
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



    public function aboutTrash($id)
    {
        $about_data = About::findOrfail($id);
        if ($about_data -> trash) {
            $about_data -> update([
                'trash'    => false
            ]);

        }else{
            $about_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
