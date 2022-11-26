<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UserCreateNotification;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Admin::latest() -> where('status', true) -> get();
        $role = Role::latest() -> where('status', true) -> get();
        return view('admin.pages.user.admin', [
            'user'         => $user,
            'role'          => $role,
            'form_type'     => 'create',
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

        
        $this -> validate($request,[
            'name'              => ['required'],
            'email'             => ['required', 'unique:admins'],
            'phone'              => ['required', 'unique:admins'],
        ]);


        //genarete password
        $pass_string = str_shuffle('0123456789ABCD');
        $pass = substr($pass_string, 3, 6);
        //data send

        $user = Admin::create([
            'name'      => $request -> name,
            'role'      => $request -> role,
            'email'     => $request -> email,
            'phone'     => $request -> phone,
            'password'  => Hash::make($pass),
        ]);


        $user -> notify(new UserCreateNotification([$user['name'], $pass ]));
        return back() -> with('success','User created Successful!');
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
        //
    }
}
