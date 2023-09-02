<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $testimonial = Testimonial::latest() -> where('trash', false) ->get();
        return view('admin.pages.hompage.testimonial.index', [
            'testimonial'       => $testimonial,
            'form_type'         => 'create'
        ]);
    }
    public function showTrashTestimonial()
    {
        $testimonial_data = Testimonial::latest() -> where('trash', true) -> get();
        return view('admin.pages.hompage.testimonial.trash', [
            'testimonial_data'      => $testimonial_data,
            'form_type'             => 'trash',
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
        'name'          => 'required',
        'designation'   => 'required',
        'desc'          => 'required'
       ]);

       if ($request -> hasFile('photo')) {
        $img = $request -> file('photo');
        $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

        $image = Image::make($img -> getRealPath());

        $image -> save(storage_path('app/public/testimonial/') . $imageName);

        }

       Testimonial::create([
        'name'              => $request -> name,
        'designation'       => $request -> designation,
        'desc'              => $request -> desc,
        'photo'             => $imageName


       ]);

       return back() -> with('success', 'Testimonial added successful');
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
        $testimonial = Testimonial::latest() ->get();
        $testimonial_data = Testimonial::findOrfail($id);
        return view('admin.pages.hompage.testimonial.index', [
            'testimonial'           => $testimonial,
            'form_type'             => 'edit',
            'testimonial_data'      => $testimonial_data
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
        $update_data = Testimonial::findOrfail($id);

        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();
    
            $image = Image::make($img -> getRealPath());
    
            $image -> save(storage_path('app/public/testimonial/') . $imageName);
    
            }

        $update_data -> update([
            'name'              => $request -> name,
            'designation'       => $request -> designation,
            'desc'              => $request -> desc,
            'photo'             => $imageName
           ]);
    


        return back() -> with('success', 'Testimonial updated successful');


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
        $delete = Testimonial::findOrFail($id);
        $delete -> delete();
        return back() -> with('danger-main', 'About delete successful');
    }

    public function testimonialStatus($id)
    {
        $testimonial_data = Testimonial::findOrfail($id);
        if ($testimonial_data -> status) {
            $testimonial_data -> update([
                'status'    => false
            ]);

        }else{
            $testimonial_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Status Update Successful');
    }



    public function testimonialTrash($id)
    {
        $testimonial_data = Testimonial::findOrfail($id);
        if ($testimonial_data -> trash) {
            $testimonial_data -> update([
                'trash'    => false
            ]);

        }else{
            $testimonial_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
