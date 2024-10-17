<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Pedagang;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function DashboardOperator()
    {
        return view('operator.dashboard');
    }
    public function PedagangOperator()
    {

        $pedagangs = Pedagang::paginate(10);
        return view('operator.pedagang', compact('pedagangs'));
    }
    public function KeluhanOperator()
    {
        $keluhans = Keluhan::with(['pembeli', 'pedagang'])->paginate(10);
        return view('operator.keluhan', compact('keluhans'));
    }
    
}
