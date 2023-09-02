<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Categorypost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryPostController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category = Categorypost::latest() -> where('trash', false) ->get();
        return view('admin.pages.post.category.index', [
            'category'               => $category,
            'form_type'         => 'create'
        ]);
    }
    public function showTrashCategory()
    {
        $category_data = Categorypost::latest() -> where('trash', true) -> get();
        return view('admin.pages.post.category.trash', [
            'category_data'     => $category_data,
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

       Categorypost::create([
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
        $category = Categorypost::latest() ->get();
        $category_data = Categorypost::findOrfail($id);
        return view('admin.pages.post.category.index', [
            'category'       => $category,
            'form_type'      => 'edit',
            'category_data'  => $category_data
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
        $category_data = Categorypost::findOrfail($id);
        $category_data -> update([
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
        $delete = Categorypost::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'Category delete successful');
    }

    public function categoryStatus($id)
    {
        $category_data = Categorypost::findOrfail($id);
        if ($category_data -> status) {
            $category_data -> update([
                'status'    => false
            ]);

        }else{
            $category_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Tag Update Successful');

    }

    public function categoryTrash($id)
    {
        $category_data = Categorypost::findOrfail($id);
        if ($category_data -> trash) {
            $category_data -> update([
                'trash'    => false
            ]);

        }else{
            $category_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');
    }
}