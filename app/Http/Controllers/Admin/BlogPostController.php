<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blogpost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorypost;
use App\Models\Tagpost;

class BlogPostController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllPost()
    {
       $allblogpost = Blogpost::latest() -> where('trash', false) ->get();
        return view('admin.pages.post.blogpost.allpost', [
            'allblogpost'           => $allblogpost,
            'form_type'             => 'create'
        ]);
    }

    public function index()
    {
       $category = Categorypost::latest() -> where('trash', false) ->get();
       $tag = Tagpost::latest() -> where('trash', false) ->get();
        return view('admin.pages.post.blogpost.addpost', [
            'category'          => $category,
            'tag'               => $tag,
            'form_type'         => 'create'
        ]);
    }

    public function showTrashblogpost()
    {
        $blogpost_data = Blogpost::latest() -> where('trash', true) -> get();
        return view('admin.pages.post.blogpost.trash', [
            'blogpost_data'     => $blogpost_data,
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
        'name'   => 'required',

       ]);

       Blogpost::create([
        'name'      => $request -> name,
        'slug'       => Str::slug($request -> name),

       ]);

       return back() -> with('success', 'Category added successful');
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
        $blogpost = Blogpost::latest() ->get();
        $blogpost_data = Blogpost::findOrfail($id);
        return view('admin.pages.post.category.index', [
            'blogpost'       => $blogpost,
            'form_type'      => 'edit',
            'blogpost_data'  => $blogpost_data
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
        $blogpost_data = Blogpost::findOrfail($id);
        $blogpost_data -> update([
            'name'          => $request -> name,
            'slug'       => Str::slug($request -> name),
           ]);
    
        return back() -> with('success', 'Category updated successful');


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
        $delete = Blogpost::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Category delete successful');
    }

    public function categoryStatus($id)
    {
        $blogpost_data = Blogpost::findOrfail($id);
        if ($blogpost_data -> status) {
            $blogpost_data -> update([
                'status'    => false
            ]);

        }else{
            $blogpost_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Tag Update Successful');

    }

    public function blogpostTrash($id)
    {
        $blogpost_data = Blogpost::findOrfail($id);
        if ($blogpost_data -> trash) {
            $blogpost_data -> update([
                'trash'    => false
            ]);

        }else{
            $blogpost_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');
    }
}
