<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tagpost;
use App\Models\Blogpost;
use Illuminate\Support\Str;
use App\Models\Categorypost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

    public function singleBlogPost($id)
    {

        $singleblog = Blogpost::with('category')->findOrfail($id);
        $blogpost_data = Blogpost::latest() -> where('trash', false) -> limit(3) -> get();
        $category = Categorypost::latest() -> where('trash', false) ->get();
        return view('admin.pages.post.blogpost.blogsingle', [
            'singleblog'             => $singleblog,
            'blogpost_data'          => $blogpost_data,
            'category'               => $category,
           
        ]);
    }


    public function showTrashbBogpost()
    {
        $blogpost_data = Blogpost::latest() -> where('trash', true) -> get();
        return view('admin.pages.post.blogpost.trash', [
            'blogpost_data'     => $blogpost_data,
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
       //validation
       $this -> validate($request,[

        'title'             => 'required',
        'content'           => 'required',
        'tag'               => 'required',
        'cat'              => 'required',
        
    ]);


    if ($request -> hasFile('photo')) {
        $img = $request -> file('photo');
        $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

        $image = Image::make($img -> getRealPath());

        $image -> save(storage_path('app/public/featured/') . $imageName);

    }


    $post = Blogpost::create([
        'admin_id'              =>Auth::guard('admin') -> user()-> id,
        'title'                 => $request -> title,
        'slug'                  => Str::slug($request -> title),
        'featured'              => $imageName,
        'content'               => $request -> content,
        
    ]);


    $post -> category() -> attach($request -> cat);
    $post -> tag() -> attach($request -> tag);

    return redirect() -> route('show.all.post') -> with('success', 'Post Publish Successful');
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

        $blogpost_data = Blogpost::findOrfail($id);
        $category= Categorypost::latest() -> where('trash', false) -> get();
        $tag= Tagpost::latest() -> where('trash', true) -> get();
        return view('admin.pages.post.blogpost.editpost', [
            'blogpost_data'     => $blogpost_data,
            'category'          => $category,
            'tag'               => $tag,
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

    public function blogpostStatus($id)
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
