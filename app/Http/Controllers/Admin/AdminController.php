<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use App\Models\designation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Notifications\UserCreateNotification;

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
            'user'          => $user,
            'role'          => $role,
            'form_type'     => 'create',
        ]);
    }

    public function userpdf()
    {
        $user = Admin::latest() -> where('status', true) -> get();
        $pdf = Pdf::loadView('admin.pages.user.employeepdf', compact('user'));
        return $pdf->stream('invoice');
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
            'phone'             => ['required', 'unique:admins'],
        ]);


        //genarete password
        $pass_string = str_shuffle('0123456789ABCD');
        $pass = substr($pass_string, 3, 6);
        //data send

        //ID generate
        $employee = Admin::where('status', true) -> orderBy('id','DESC')->first();
        if ($employee == null) {
             $firsReg = 0;
             $employeeid = $firsReg + 1;
             if ($employeeid < 10) {
                 $id_no = '000'.$employeeid;
             } elseif ($employeeid < 100) {
                 $id_no = '00'.$employeeid;
             } elseif ($employeeid < 1000) {
                 $id_no = '0'.$employeeid;
             }
             
        }else{
             $employee = Admin::where('status', true)->orderBy('id','DESC') -> first() -> id;
             $employeeid = $employee +1;
             if ($employeeid < 10) {
                 $id_no = '000'.$employeeid;
             } elseif ($employeeid < 100) {
                 $id_no = '00'.$employeeid;
             } elseif ($employeeid < 1000) {
                 $id_no = '0'.$employeeid;
             }
        }
 
       $final_id_no = '2016'.$id_no;

        $user = Admin::create([
            'name'      => $request -> name,
            'role'      => $request -> role,
            'email'     => $request -> email,
            'phone'     => $request -> phone,
            'password'  => Hash::make($pass),
            'id_no'     => $final_id_no,
        ]);


        $user -> notify(new UserCreateNotification([$user['name'], $pass, $final_id_no ]));
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
        $user = Admin::findOrFail($id);
        $role = Role::latest() -> where('status', true) -> get();
        $designation = designation::latest() -> where('status', true) -> get();
        return view('admin.pages.user.edituser', [
            'user'          => $user,
            'role'          => $role,
            'designation'   => $designation,
            'form_type'     => 'create',
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
        $this -> validate($request,[
            'name'              => ['required'],
            'email'             => ['required'],
            'phone'             => ['required'],
            'fname'             => ['required'],
            'fname'             => ['required'],
            'mname'             => ['required'],
        ]);

        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

            $image = Image::make($img -> getRealPath());

            $image -> save(storage_path('app/public/user/') . $imageName);
            }

            $student_data = Admin::findOrfail($id);
            $student_data -> update([
            'image'                 => $imageName ?? '',
            'name'                  => $request -> name,
            'fname'                 => $request -> fname,
            'mname'                 => $request -> mname,
            'gender'                => $request -> gender,
            'religion'              => $request -> religion,
            'dob'                   => $request -> dob,
            'phone'                 => $request -> phone,
            'email'                 => $request -> email,
            'role'                  => $request -> role,
            'join_date'             => $request -> join_date,
            'salary'                => $request -> salary,
            'designation_id'        => $request -> designation,
            'address'               => $request -> address1,
        ]);
    
        return back() -> with('success', 'Employee Data Update Successful');
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
