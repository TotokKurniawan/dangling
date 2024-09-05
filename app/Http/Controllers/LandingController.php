<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        return view('landingpage.home');
    }
    public function about()
    {
        return view('landingpage.about');
    }
    public function fitur()
    {
        return view('landingpage.fitur');
    }
}
