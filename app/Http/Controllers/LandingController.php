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
    public function features()
    {
        return view('landingpage.features');
    }
    public function contact()
    {
        return view('landingpage.contact');
    }
    public function galery()
    {
        return view('landingpage.galery');
    }
}
