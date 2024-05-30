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
                $completed_rides = DB::table('rides')->where('status', 'Completed')->get();
        return view('home.index', compact('rides', 'customers', 'vehicles', 'drivers', 'completed_rides'));
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
