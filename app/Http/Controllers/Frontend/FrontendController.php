<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function showloginform()
    {
        return view('frontend.login');
    }

    public function userlogin(Request $request)
    {
        if( Auth::guard('admin') -> attempt( [ 'email' => $request -> email, 'password' => $request -> password ] ) ){
            return redirect() -> route('admin.dashboard'); 
        } else {
            return redirect() -> route('show.login.form'); 
        }
    }
}
