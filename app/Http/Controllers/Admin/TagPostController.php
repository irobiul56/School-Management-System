<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tagpost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TagPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tag = Tagpost::latest() -> where('trash', false) ->get();
        return view('admin.pages.post.tag.index', [
            'tag'               => $tag,
            'form_type'         => 'create'
        ]);
    }
    public function showTrashTag()
    {
        $tag_data = Tagpost::latest() -> where('trash', true) -> get();
        return view('admin.pages.post.tag.trash', [
            'tag_data'      => $tag_data,
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
        'name'   => 'required',

       ]);

       Tagpost::create([
        'name'      => $request -> name,
        'slug'       => Str::slug($request -> name),

       ]);

       return back() -> with('success', 'Tag added successful');
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
        $tag = Tagpost::latest() ->get();
        $tag_data = Tagpost::findOrfail($id);
        return view('admin.pages.post.tag.index', [
            'tag'                   => $tag,
            'form_type'             => 'edit',
            'tag_data'              => $tag_data
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
        $tag_data = Tagpost::findOrfail($id);
        $tag_data -> update([
            'name'          => $request -> name,
            'slug'       => Str::slug($request -> name),
           ]);
    
        return back() -> with('success', 'Tag updated successful');


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
        $delete = Tagpost::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Tag delete successful');
    }

    public function tagStatus($id)
    {
        $tag_data = Tagpost::findOrfail($id);
        if ($tag_data -> status) {
            $tag_data -> update([
                'status'    => false
            ]);

        }else{
            $tag_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Tag Update Successful');
    }



    public function tagTrash($id)
    {
        $tag_data = Tagpost::findOrfail($id);
        if ($tag_data -> trash) {
            $tag_data -> update([
                'trash'    => false
            ]);

        }else{
            $tag_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
