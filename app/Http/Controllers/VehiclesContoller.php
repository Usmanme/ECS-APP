<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 25); 
        $data = DB::table('vehicles')->paginate($perPage);

        return view('pages.vehicle', compact('data'));
    }
    public function newvehicle()
    {
        return view('pages.newvehicle');
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
        $vehicle_img = $request->file('vehicle_img');
        $vehicle_img_name = '';
        $vehicle_attchment = $request->file('vehicle_attachment');
        $vehicle_attchment_name = '';
        $data = [
            'driver_id' => 0,
            'ride_id' => 0,
            'customer_id' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->vehicle_brand) && $request->vehicle_brand != '') {
            $data['brand'] = $request->vehicle_brand;
        }

        if (isset($request->vehicle_model) && $request->vehicle_model != '') {
            $data['model'] = $request->vehicle_model;
        }

        if (isset($request->vehicle_year) && $request->vehicle_year != '') {
            $data['year'] = $request->vehicle_year;
        }

        if (isset($request->vehicle_type) && $request->vehicle_type != '') {
            $data['type'] = $request->vehicle_type;
        }

        if (isset($request->vehicle_code) && $request->vehicle_code != '') {
            $data['code'] = $request->vehicle_code;
        }

        if (isset($request->registration_no) && $request->registration_no != '') {
            $data['reg_no'] = $request->registration_no;
        }

        if (isset($request->vehicle_pass_cap) && $request->vehicle_pass_cap != '') {
            $data['pass_cap'] = $request->vehicle_pass_cap;
        }

        if (isset($request->vehicle_category) && $request->vehicle_category != '') {
            $data['category'] = $request->vehicle_category;
        }

        if (isset($request->vehicle_insurance) && $request->vehicle_insurance != '') {
            $data['insurance'] = $request->vehicle_insurance;
        }

        if (isset($request->vehicle_color) && $request->vehicle_color != '') {
            $data['color'] = $request->vehicle_color;
        }

        if (isset($request->vehicle_destination_type) && $request->vehicle_destination_type != '') {
            $data['destination_type'] = $request->vehicle_destination_type;
        }

        if (isset($request->vehicle_fare) && $request->vehicle_fare != '') {
            $data['fare'] = $request->vehicle_fare;
        }
        if (isset($request->luggage) && $request->luggage != '') {
            $data['luggage'] = $request->luggage;
        }
        if (isset($vehicle_img) && $vehicle_img != null) {
            $vehicle_img_name = uniqid() . '_' . $vehicle_img->getClientOriginalName();
            $vehicle_img->move($destinationPath, $vehicle_img_name);
            $data['img'] = $vehicle_img_name;
        }

        if (isset($vehicle_attchment) && $vehicle_attchment != null) {
            $vehicle_attchment_name = uniqid() . '_' . $vehicle_attchment->getClientOriginalName();
            $vehicle_attchment->move($destinationPath, $vehicle_attchment_name);
            $data['attachment'] = $vehicle_attchment_name;
        }

        $res = DB::table('vehicles')->insert($data);

        if ($res == true) {
            $status_save = session('status_save');
            return redirect('/vehicles')->with('status_save', 'true');
        } else {
            $status_save = session('status_save');
            return redirect('/vehicles')->with('status_save', 'false');
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
        $vehicle_img = $request->file('vehicle_img');
        $vehicle_img_name = '';
        $vehicle_attchment = $request->file('vehicle_attachment');
        $vehicle_attchment_name = '';
        $data = [
            'driver_id' => 0,
            'ride_id' => 0,
            'customer_id' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->vehicle_brand) && $request->vehicle_brand != '') {
            $data['brand'] = $request->vehicle_brand;
        }

        if (isset($request->vehicle_model) && $request->vehicle_model != '') {
            $data['model'] = $request->vehicle_model;
        }

        if (isset($request->vehicle_year) && $request->vehicle_year != '') {
            $data['year'] = $request->vehicle_year;
        }

        if (isset($request->vehicle_type) && $request->vehicle_type != '') {
            $data['type'] = $request->vehicle_type;
        }

        if (isset($request->vehicle_code) && $request->vehicle_code != '') {
            $data['code'] = $request->vehicle_code;
        }
        if (isset($request->registration_no) && $request->registration_no != '') {
            $data['reg_no'] = $request->registration_no;
        }

        if (isset($request->vehicle_pass_cap) && $request->vehicle_pass_cap != '') {
            $data['pass_cap'] = $request->vehicle_pass_cap;
        }

        if (isset($request->vehicle_category) && $request->vehicle_category != '') {
            $data['category'] = $request->vehicle_category;
        }

        if (isset($request->vehicle_insurance) && $request->vehicle_insurance != '') {
            $data['insurance'] = $request->vehicle_insurance;
        }

        if (isset($request->vehicle_color) && $request->vehicle_color != '') {
            $data['color'] = $request->vehicle_color;
        }

        if (isset($vehicle_img) && $vehicle_img != null) {
            $vehicle_img_name = uniqid() . '_' . $vehicle_img->getClientOriginalName();
            $vehicle_img->move($destinationPath, $vehicle_img_name);
            $data['img'] = $vehicle_img_name;
        }

        if (isset($vehicle_attchment) && $vehicle_attchment != null) {
            $vehicle_attchment_name = uniqid() . '_' . $vehicle_attchment->getClientOriginalName();
            $vehicle_attchment->move($destinationPath, $vehicle_attchment_name);
            $data['attachment'] = $vehicle_attchment_name;
        }

        $res = DB::table('vehicles')->where('id', $id)->update($data);

        if ($res == true) {
            $status_edit = session('status_edit');
            return redirect('/vehicles')->with('status_edit', 'true');
        } else {
            $status_edit = session('status_edit');
            return redirect('/vehicles')->with('status_edit', 'false');
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
