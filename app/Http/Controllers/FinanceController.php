<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index()
    {

    
        $completed_rides = DB::table('rides')->where('status', 'Completed')->get();
        return view('pages.finance', compact('completed_rides'));
    }
}
