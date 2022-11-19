<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feeamount;
use App\Models\Feecategory;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class StudentFeeAmount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amount = Feeamount::latest() -> where('status', true) -> get();
        return view('admin.pages.studentsetup.feeamount', [
            'amount'            => $amount,
            'form_type'         => 'create',
        ]);
    }

    public function addfee()
    {
        $feecategory = Feecategory::latest() -> where('status', true) -> get();
        $Studentclass = Studentclass::latest() -> where('status', true) -> get();
        return view('admin.pages.studentsetup.addfeeamount', [
            'feecategory'       => $feecategory,
            'Studentclass'      => $Studentclass,
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
    //    return $request -> all();
       $this-> validate($request,[
        'feecategory'   => 'required|not_in:0',
        'amount.*'     => 'required',
        'classid.*'     => 'required|not_in:0',
    ]);

    $countcalss = count($request -> classid);

        if ($countcalss != NULL) {
            for ($i=0; $i < $countcalss; $i++) { 
                $fee_amount = New Feeamount();
                $fee_amount -> fee_category_id  = $request -> feecategory;
                $fee_amount -> class_id         = $request -> classid[$i];
                $fee_amount -> amount           = $request -> amount[$i];

                $fee_amount -> save();
            }
        }

        return back() -> with('success', 'Fee Amount Added Successful');


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
