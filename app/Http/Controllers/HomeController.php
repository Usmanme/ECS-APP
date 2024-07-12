<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rides = DB::table('rides')->get();
        $customers = DB::table('customers')->get();
        $vehicles = DB::table('vehicles')->get();
        $drivers = DB::table('drivers')->get();
        // $completed_rides = DB::table('rides')
        // ->where('rides.status', 'Completed')
        // ->join('drivers', 'rides.driver_id', '=', 'drivers.id')
        // ->join('vehicles', 'rides.vehicle_id', '=', 'vehicles.id')
        // ->get();

        // Today Record Query
        $completed_rides_today = DB::table('rides')
            ->where('status', 'Completed')
            ->whereDate('created_at', now())
            ->get();
        $completed_earning_today = DB::table('rides')
            ->where('status', 'Completed')
            ->whereDate('created_at', now())
            ->sum('fare');

        $rides_created_today = DB::table('rides')
            ->where('status', 'Ride Created')
            ->whereDate('created_at', now())
            ->get();
        $driver_assigned_today = DB::table('rides')
            ->where('status', 'Driver Assigned')
            ->whereDate('created_at', now())
            ->get();

        // This Month Query
        $driver_assigned_this_month = DB::table('rides')
            ->where('status', 'Driver Assigned')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();

        $completed_rides_this_month = DB::table('rides')
            ->where('status', 'Completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();

        $rides_created_this_month = DB::table('rides')
            ->where('status', 'Ride Created')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();

        // This minth earning
        $completed_earning_rides_this_month = DB::table('rides')
            ->where('status', 'Completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('fare');

        $completed_rides = DB::table('rides')->where('status', 'Completed')->get();
        $fare = DB::table('rides')->whereStatus('Completed')->sum('fare');
        $ride_created = DB::table('rides')->where('status', 'Ride Created')->get();
        $driver_assigned = DB::table('rides')->where('status', 'Driver Assigned')->get();
        return view('home.index', compact('rides', 'customers', 'vehicles', 'drivers', 'completed_rides', 'fare', 'ride_created', 'driver_assigned', 'completed_rides_today', 'rides_created_today', 'driver_assigned_today', 'driver_assigned_this_month', 'completed_rides_this_month', 'rides_created_this_month', 'completed_earning_rides_this_month', 'completed_earning_today'));
    }
    public function getBookRidesFare(Request $request)
    {
        $date = '';
        // dd($request->all());
        $request = $request->input('filter');
        if ($request == 'today') {
            $date = Carbon::now();
        }
        $fare = DB::table('rides')->whereStatus('Booked')->whereDate('created_at', $date)->sum('fare');
        return response()->json([
            'status' => true,
            'fare' => $fare
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
