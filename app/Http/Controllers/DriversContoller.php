<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriversContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('drivers')->get();
        $vehicle_data = DB::table('vehicles')->get();
        return view('pages.driver', compact('data', 'vehicle_data'));
    }
    public function newdriver()
    {
        return view('pages.newdriver');
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
        $destinationPath = 'uploads';
        $driver_img = $request->file('driver_img');
        $driver_img_name = '';
        $data = [
            'vehicle_id' => 0,
            'ride_id' => 0,
            'customer_id' => 0,
            'status' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->firstname) && $request->firstname != '') {
            $data['firstname'] = $request->firstname;
        }

        if (isset($request->lastname) && $request->lastname != '') {
            $data['lastname'] = $request->lastname;
        }

        if (isset($request->phone_number) && $request->phone_number != '') {
            $data['phone_number'] = $request->phone_number;
        }

        if (isset($request->iqama_number) && $request->iqama_number != '') {
            $data['iqama_number'] = $request->iqama_number;
        }

        if (isset($request->email_addr) && $request->email_addr != '') {
            $data['email_addr'] = $request->email_addr;
        }

        if (isset($driver_img) && $driver_img != null) {
            $driver_img_name = uniqid() . '_' . $driver_img->getClientOriginalName();
            $driver_img->move($destinationPath, $driver_img_name);
            $data['img'] = $driver_img_name;
        }

        $res = DB::table('drivers')->insert($data);

        if ($res == true) {
            $status_save = session('status_save');
            return redirect('/drivers')->with('status_save', 'true');
        } else {
            $status_save = session('status_save');
            return redirect('/drivers')->with('status_save', 'false');
        }
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
        $destinationPath = 'uploads';
        $driver_img = $request->file('driver_img');
        $driver_img_name = '';
        $data = [
            'vehicle_id' => 0,
            'ride_id' => 0,
            'customer_id' => 0,
            'status' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->firstname) && $request->firstname != '') {
            $data['firstname'] = $request->firstname;
        }

        if (isset($request->lastname) && $request->lastname != '') {
            $data['lastname'] = $request->lastname;
        }

        if (isset($request->phone_number) && $request->phone_number != '') {
            $data['phone_number'] = $request->phone_number;
        }

        if (isset($request->iqama_number) && $request->iqama_number != '') {
            $data['iqama_number'] = $request->iqama_number;
        }

        if (isset($request->email_addr) && $request->email_addr != '') {
            $data['email_addr'] = $request->email_addr;
        }

        if (isset($driver_img) && $driver_img != null) {
            $driver_img_name = uniqid() . '_' . $driver_img->getClientOriginalName();
            $driver_img->move($destinationPath, $driver_img_name);
            $data['img'] = $driver_img_name;
        }

        $res = DB::table('drivers')->where('id', $id)->update($data);
        $vehicle = DB::table('vehicles')->find($id);
        if( !is_null( $vehicle ) )
        {
            DB::table('rides')->whereVehicleId($request->input('vehicle_id'))->whereDriverId(0)->update([
                'driver_id'=>$id
            ]);
            DB::table('vehicles')->where('driver_id',$id)->update(['driver_id'=>0]);
            $vehicles = DB::table('vehicles')->where('id', $request->input('vehicle_id'));
            $vehicles->update(['driver_id' => $id]);
        }

        if ($res == true) {
            $status_edit = session('status_edit');
            return redirect('/drivers')->with('status_edit', 'true');
        } else {
            $status_edit = session('status_edit');
            return redirect('/drivers')->with('status_edit', 'false');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
