<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blogpost;
use App\Models\Categorypost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    
    public function aboutUs()
    {

        $category = Categorypost::with('blogpost')->latest() -> where('id', 4) -> where('trash', false) ->get();
        $blogpost_data = Blogpost::latest() -> where('trash', false) -> limit(3) -> get();
        return view('frontend.layouts.pages.about', [
            'category'             => $category,
            'blogpost_data'        => $blogpost_data,



        ]);
    }

    public function history()
    {
        $category = Categorypost::with('blogpost')->latest() -> where('id', 5) -> where('trash', false) ->get();
        $blogpost_data = Blogpost::latest() -> where('trash', false) -> limit(3) -> get();
        return view('frontend.layouts.pages.history', [
            'category'             => $category,
            'blogpost_data'        => $blogpost_data,

        ]);
    }

    public function missionAndVision()
    {
        $category = Categorypost::with('blogpost')->latest() -> where('id', 7) -> where('trash', false) ->get();
        $blogpost_data = Blogpost::latest() -> where('trash', false) -> limit(3) -> get();
        return view('frontend.layouts.pages.achievement', [
            'category'             => $category,
            'blogpost_data'        => $blogpost_data,

        ]);
    }

    public function newsAndEvent()
    {
        $category = Categorypost::with('blogpost')->latest() -> where('id', 8) -> where('trash', false) ->get();
        $blogpost_data = Blogpost::latest() -> where('trash', false) -> limit(3) -> get();
        return view('frontend.layouts.pages.newsandevent', [
            'category'             => $category,
            'blogpost_data'        => $blogpost_data,

        ]);
    }

    public function achievement()
    {
        $category = Categorypost::with('blogpost')->latest() -> where('id', 7) -> where('trash', false) ->get();
        $blogpost_data = Blogpost::latest() -> where('trash', false) -> limit(3) -> get();
        return view('frontend.layouts.pages.achievement', [
            'category'             => $category,
            'blogpost_data'        => $blogpost_data,

        ]);
    }
}
