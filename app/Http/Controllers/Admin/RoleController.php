<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::latest() -> where('status', true) -> get();
        $role = Role::latest() -> where('status', true) -> get();
        return view('admin.pages.user.role', [
            'permission'            => $permission,
            'role'                  => $role,
            'form_type'             => 'create',
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
        $this-> validate($request,[
            'name'      => 'required',
        ]);

       Role::create([
        'name'              => $request -> name,
        'slug'              => Str::slug($request -> name),
        'permission'        => json_encode($request -> permission),
       ]);


       return back() -> with('success', 'Role Added Successful');
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
        $edit = Role::findOrFail($id);
        $permission = Permission::latest() -> get();
        $role = Role::latest() -> get();
        return view('admin.pages.user.role', [
            'permission'            => $permission,
            'role'                  => $role,
            'form_type'             => 'edit',
            'edit'                  => $edit,
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
        $update_data = Role::findOrfail($id);
        $update_data ->update([
            'name'          => $request -> name,
            'slug'          => Str::slug($request -> name),
            'permission'   => json_encode($request -> permission)
        ]);

        return back() -> with('success-main', 'Role Updated Successful');
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
