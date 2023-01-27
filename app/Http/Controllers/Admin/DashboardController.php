<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admindashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin') ->logout();
        return redirect() -> route('show.login.form');
    }
}
