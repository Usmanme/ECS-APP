<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index()
    {

        // $data = DB::table('rides')->get();
        // $completed_rides = DB::table('rides')
        // ->where('rides.status', 'Completed')
        // ->join('drivers', 'rides.driver_id', '=', 'drivers.id')
        // ->join('vehicles', 'rides.vehicle_id', '=', 'vehicles.id')
        // ->get();
        $completed_rides = DB::table('rides')->where('status', 'Completed')->get();
        return view('pages.finance', compact('completed_rides'));
    }
}
