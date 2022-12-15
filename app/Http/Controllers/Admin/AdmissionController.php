<?php

namespace App\Http\Controllers\Admin;
use App\Models\Student;
use App\Models\Feeamount;
use App\Models\Feecategory;
use App\Models\Studentyear;
use Illuminate\Support\Str;
use App\Models\Studentclass;
use App\Models\Studentgroup;
use App\Models\Studentshift;
use Illuminate\Http\Request;
use App\Models\Assignstudent;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::latest() -> where('trash', false) -> get();
        return view('admin.pages.admission.student', [
            'student'       => $student,
            'form_type'     => 'create',
        ]);
    }

    public function trashstudentshow()
    {
        $student = Student::latest() -> where('trash', true) -> get();
        return view('admin.pages.admission.trashstudent', [
            'student'       => $student,
            'form_type'     => 'create',
        ]);
    }

    public function showstudentform()
    {
        $class = Studentclass::latest() -> where('status', true) -> get();
        $group = Studentgroup::latest() -> where('status', true) -> get();
        $shift = Studentshift::latest() -> where('status', true) -> get();
        $year = Studentyear::latest() -> where('status', true) -> get();
        return view('admin.pages.admission.admissionform', [
            'class'      =>  $class,
            'group'      =>  $group,
            'shift'      =>  $shift,
            'year'       =>  $year,

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

        'name'                  => 'required',
        'fathername'            => 'required',
        'mothername'            => 'required',
        // 'gender'                => 'required',
        'dob'                   => 'required',
        'pastschool'            => 'required',
        'class'                 => 'required',
        'group'                 => 'required',
        'motherphone'           => 'required',
        'fatherphone'           => 'required',
        'photo'                 => 'required',
        'year'                  => 'required',
        'shift'                 => 'required',
        'bcn'                   => 'required',
        'fnid'                  => 'required',
        'mnid'                  => 'required',
        'address1'              => 'required',
        'gurdianname'           => 'required',
        'gurdianphone'          => 'required',
       ]);


       //genarete Student Id
       $checkYear = Studentyear::find($request -> year) -> name;
       $student = Student::where('status', false) -> orderBy('id','DESC')->first();
       if ($student == null) {
            $firsReg = 0;
            $studentId = $firsReg + 1;
            if ($studentId < 10) {
                $id_no = '000'.$studentId;
            } elseif ($studentId < 100) {
                $id_no = '00'.$studentId;
            } elseif ($studentId < 1000) {
                $id_no = '0'.$studentId;
            }
            
       }else{
            $student = Student::where('status', false)->orderBy('id','DESC') -> first() -> id;
            $studentId = $student +1;
            if ($studentId < 10) {
                $id_no = '000'.$studentId;
            } elseif ($studentId < 100) {
                $id_no = '00'.$studentId;
            } elseif ($studentId < 1000) {
                $id_no = '0'.$studentId;
            }
       }

      $final_id_no = $checkYear. $id_no;

       // Photo 
       if ($request -> hasFile('photo')) {
        $img = $request -> file('photo');
        $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

        $image = Image::make($img -> getRealPath());

        $image -> save(storage_path('app/public/students/') . $imageName);
       }


        $students = Student::create([
            'admin_id'              =>Auth::guard('admin') -> user()-> id,
            'student_id'            => $final_id_no,
            'photo'                 => $imageName,
            'name'                  => $request -> name,
            'birthnumber'           => $request -> bcn,
            // 'gender'                => $request -> gender,
            'fnid'                  => $request -> fnid,
            'mothername'            => $request -> mothername,
            'fathername'            => $request -> fathername,
            'mnid'                  => $request -> mnid,
            'fatherphone'           => $request -> fatherphone,
            'motherphone'           => $request -> motherphone,
            'admitedclass'          => $request -> class,
            'admit_group'           => $request -> group,
            'shift'                 => $request -> shift,
            'year'                  => $request -> year,
            'presentaddress'        => $request -> address1,
            'gurdianname'           => $request -> gurdianname,
            'gurdianphone'          => $request -> gurdianphone,
            'dob'                   => $request -> dob,
            'pastschool'            => $request -> pastschool,
            'slug'                  => Str::slug($request -> name),
        ]);

        $assignstudent = Assignstudent::create([
            'student_id'            => $students -> id,
            'class_id'              => $request -> class,
            'group_id'              => $request -> group,
            'shift_id'              => $request -> shift,
            'year_id'               => $request -> year,
        ]);


        return redirect(route('show.student.form')) -> with('success', 'Student Registration Successful');
    
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
        $class = Studentclass::latest() -> where('status', true) -> get();
        $group = Studentgroup::latest() -> where('status', true) -> get();
        $shift = Studentshift::latest() -> where('status', true) -> get();
        $year = Studentyear::latest() -> where('status', true) -> get();
        $students = Student::findOrfail($id);
        return view('admin.pages.admission.editadmissionform', [
            'class'         =>  $class,
            'group'         =>  $group,
            'shift'         =>  $shift,
            'year'          =>  $year,
            'students'      =>  $students,

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
        $this-> validate($request,[

            'name'                  => 'required',
            'fathername'            => 'required',
            'mothername'            => 'required',
            // 'gender'                => 'required',
            'dob'                   => 'required',
            'pastschool'            => 'required',
            'class'                 => 'required',
            'group'                 => 'required',
            'motherphone'           => 'required',
            'fatherphone'           => 'required',
            'year'                  => 'required',
            'shift'                 => 'required',
            'bcn'                   => 'required',
            'fnid'                  => 'required',
            'mnid'                  => 'required',
            'address1'              => 'required',
            'gurdianname'           => 'required',
            'gurdianphone'          => 'required',
           ]);

            if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

            $image = Image::make($img -> getRealPath());

            $image -> save(storage_path('app/public/students/') . $imageName);
            }

            $student_data = Student::findOrfail($id);
            $student_data -> update([
            'admin_id'              =>Auth::guard('admin') -> user()-> id,
            'photo'                 => $imageName,
            'name'                  => $request -> name,
            'birthnumber'           => $request -> bcn,
            // 'gender'                => $request -> gender,
            'fnid'                  => $request -> fnid,
            'mothername'            => $request -> mothername,
            'fathername'            => $request -> fathername,
            'mnid'                  => $request -> mnid,
            'fatherphone'           => $request -> fatherphone,
            'motherphone'           => $request -> motherphone,
            'admitedclass'          => $request -> class,
            'admit_group'           => $request -> group,
            'shift'                 => $request -> shift,
            'year'                  => $request -> year,
            'presentaddress'        => $request -> address1,
            'gurdianname'           => $request -> gurdianname,
            'gurdianphone'          => $request -> gurdianphone,
            'dob'                   => $request -> dob,
            'pastschool'            => $request -> pastschool,
            'slug'                  => Str::slug($request -> name),

        ]);
    
        return back() -> with('success', 'Student Data Update Successful');

    }

    public function studentstatus($id)
    {
        $student_data = Student::findOrfail($id);
        if ($student_data -> status) {
            $student_data -> update([
                'status'    => false
            ]);

        }else{
            $student_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Status Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_data = Student::findOrfail($id);
        $student_data -> delete();

        return back() -> with('danger-main', 'Student Data Deleted');
    }

    public function studenttrash($id)
    {
        $admin_data = Student::findOrfail($id);
        if ($admin_data -> trash) {
            $admin_data -> update([
                'trash'    => false
            ]);

        }else{
            $admin_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Student Trash Successful');

    }

    
    //PDF Generator
    public function admissionadmit($id)
    {
        $class = Studentclass::latest() -> where('status', true) -> get();
        $students = Student::findOrfail($id);
        return view('admin.pages.admission.admitcard', [
            'class'         =>  $class,
            'students'      =>  $students,
        ]);
    }

    //Registration Fee
    public function registrationfee()
    {
        $feeamount = DB::table('assignstudents') -> 
        join('feeamounts', 'assignstudents.class_id', 'feeamounts.class_id') ->
        join('students', 'assignstudents.student_id', 'students.id') ->
        join('feecategories', 'feeamounts.fee_category_id', 'feecategories.id')
        -> get();
        // dd($feeamount);
        return view('admin.pages.admission.feeamount', [
            'feeamount'            =>  $feeamount,

        ]);
    }


}
