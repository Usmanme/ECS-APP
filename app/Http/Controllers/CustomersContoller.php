<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('customers')->get();
        return view('pages.customer', compact('data'));
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
        $customer_img = $request->file('customer_img');
        $customer_img_name = '';
        $data = [
            'driver_id' => 0,
            'ride_id' => 0,
            'vehicle_id' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->name) && $request->name != '') {
            $data['name'] = $request->name;
        }

        if (isset($request->mobile_number) && $request->mobile_number != '') {
            $data['mobile_number'] = $request->mobile_number;
        }

        if (isset($request->email) && $request->email != '') {
            $data['email'] = $request->email;
        }

        if (isset($request->nationality) && $request->nationality != '') {
            $data['nationality'] = $request->nationality;
        }

        if (isset($request->company) && $request->company != '') {
            $data['company'] = $request->company;
        }

        if (isset($request->department) && $request->department != '') {
            $data['department'] = $request->department;
        }

        if (isset($request->designation) && $request->designation != '') {
            $data['designation'] = $request->designation;
        }

        if (isset($customer_img) && $customer_img != null) {
            $customer_img_name = uniqid() . '_' . $customer_img->getClientOriginalName();
            $customer_img->move($destinationPath, $customer_img_name);
            $data['img'] = $customer_img_name;
        }

        $res = DB::table('customers')->insert($data);

        if ($res == true) {
            $status_save = session('status_save');
            return redirect('/customers')->with('status_save', 'true');
        } else {
            $status_save = session('status_save');
            return redirect('/customers')->with('status_save', 'false');
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
        $customer_img = $request->file('customer_img');
        $customer_img_name = '';
        $data = [
            'driver_id' => 0,
            'ride_id' => 0,
            'vehicle_id' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->name) && $request->name != '') {
            $data['name'] = $request->name;
        }

        if (isset($request->mobile_number) && $request->mobile_number != '') {
            $data['mobile_number'] = $request->mobile_number;
        }

        if (isset($request->email) && $request->email != '') {
            $data['email'] = $request->email;
        }

        if (isset($request->nationality) && $request->nationality != '') {
            $data['nationality'] = $request->nationality;
        }

        if (isset($request->company) && $request->company != '') {
            $data['company'] = $request->company;
        }

        if (isset($request->department) && $request->department != '') {
            $data['department'] = $request->department;
        }

        if (isset($request->designation) && $request->designation != '') {
            $data['designation'] = $request->designation;
        }

        if (isset($customer_img) && $customer_img != null) {
            $customer_img_name = uniqid() . '_' . $customer_img->getClientOriginalName();
            $customer_img->move($destinationPath, $customer_img_name);
            $data['img'] = $customer_img_name;
        }

        $res = DB::table('customers')->where('id', $id)->update($data);

        if ($res == true) {
            $status_edit = session('status_edit');
            return redirect('/customers')->with('status_edit', 'true');
        } else {
            $status_edit = session('status_edit');
            return redirect('/customers')->with('status_edit', 'false');
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
