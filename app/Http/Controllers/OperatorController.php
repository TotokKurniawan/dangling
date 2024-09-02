<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function DashboardOperator()
    {
        return view('operator.dashboard');
    }
    public function PedagangOperator()
    {
        return view('operator.pedagang');
    }
    public function KeluhanOperator()
    {
        return view('operator.keluhan');
    }
    public function ProfileOperator()
    {
        return view('operator.profile');
    }
}
