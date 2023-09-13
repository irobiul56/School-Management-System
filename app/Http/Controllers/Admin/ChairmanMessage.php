<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\admin;
use App\Models\ChairmanMessage as ModelsChairmanMessage;
use App\Models\Role;
use Illuminate\Http\Request;

class ChairmanMessage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $message = ModelsChairmanMessage::latest() -> where('trash', false) ->get();
        return view('admin.pages.chairmanmessage.index', [
            'message'             => $message,
            'form_type'         => 'create'
        ]);
    }

    public function chairmanmessages() {
        $message = ModelsChairmanMessage::latest() -> where('status', true)-> where('trash', false) ->get();
        return view('frontend.administration.chairmanmessage', [
            'message'             => $message,
        ]);
    }


    public function showTrashChairman()
    {
        $notice_data = ModelsChairmanMessage::latest() -> where('trash', true) -> get();
        return view('admin.pages.hompage.notice.trash', [
            'notice_data'      => $notice_data,
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
        'desc'  => 'required'
       ]);

       ModelsChairmanMessage::create([
        'desc'          => $request -> desc,

       ]);

       return back() -> with('success', 'Message added successful');
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
        $message = ModelsChairmanMessage::latest() ->get();
        $message_data = ModelsChairmanMessage::findOrfail($id);
        return view('admin.pages.chairmanmessage.index', [
            'message'                => $message,
            'form_type'             => 'edit',
            'message_data'           => $message_data
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
        $update_data = ModelsChairmanMessage::findOrfail($id);
        $update_data -> update([
            'desc'          => $request -> desc
           ]);
    
        return back() -> with('success', 'Message updated successful');


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
        $delete = ModelsChairmanMessage::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Message delete successful');
    }

    public function chairmanStatus($id)
    {
        $notice_data = ModelsChairmanMessage::findOrfail($id);
        if ($notice_data -> status) {
            $notice_data -> update([
                'status'    => false
            ]);

        }else{
            $notice_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Message Update Successful');
    }



    public function chairmanTrash($id)
    {
        $message_data = ModelsChairmanMessage::findOrfail($id);
        if ($message_data -> trash) {
            $message_data -> update([
                'trash'    => false
            ]);

        }else{
            $message_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
