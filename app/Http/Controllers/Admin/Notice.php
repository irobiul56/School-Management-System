<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Notice as ModelsNotice;

class Notice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $notice = ModelsNotice::latest() -> where('trash', false) ->get();
        return view('admin.pages.hompage.notice.index', [
            'notice'             => $notice,
            'form_type'         => 'create'
        ]);
    }
    public function showTrashNotice()
    {
        $notice_data = ModelsNotice::latest() -> where('trash', true) -> get();
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
        'title'  => 'required',
        'desc'  => 'required'
       ]);
       $user = Auth::guard('admin') -> user() -> id;
       ModelsNotice::create([
        'title'     => $request -> title,
        'desc'      => $request -> desc,
        'user_id'   => $user,

       ]);

       return back() -> with('success', 'Notice added successful');
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
        $notice = ModelsNotice::latest() ->get();
        $notice_data = ModelsNotice::findOrfail($id);
        return view('admin.pages.hompage.notice.index', [
            'notice'                => $notice,
            'form_type'             => 'edit',
            'notice_data'           => $notice_data
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
        $update_data = ModelsNotice::findOrfail($id);
        $update_data -> update([
            'title'         => $request -> title,
            'desc'          => $request -> desc
           ]);
    
        return back() -> with('success', 'Notice updated successful');


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
        $delete = ModelsNotice::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Notice delete successful');
    }

    public function noticeStatus($id)
    {
        $notice_data = ModelsNotice::findOrfail($id);
        if ($notice_data -> status) {
            $notice_data -> update([
                'status'    => false
            ]);

        }else{
            $notice_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Notice Update Successful');
    }



    public function noticeTrash($id)
    {
        $notice_data = ModelsNotice::findOrfail($id);
        if ($notice_data -> trash) {
            $notice_data -> update([
                'trash'    => false
            ]);

        }else{
            $notice_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
