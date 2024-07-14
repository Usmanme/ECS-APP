<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DriversContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 25); // Default to 25 items per page

        // Paginate drivers and vehicles
        $data = DB::table('drivers')
            ->leftJoin('vehicles', 'drivers.vehicle_id', '=', 'vehicles.id')
            ->select(
                'drivers.id as driver_id',
                'drivers.firstname',
                'drivers.lastname',
                'drivers.phone_number',
                'drivers.iqama_number',
                'drivers.email_addr',
                'drivers.img',
                'drivers.status',
                'drivers.created_at',
                'drivers.updated_at',
                'vehicles.id as vehicle_id', // Alias to avoid conflict
                'vehicles.brand',
                'vehicles.model',
                'vehicles.year',
                'vehicles.type',
                'vehicles.code',
                'vehicles.reg_no',
                'vehicles.pass_cap',
                'vehicles.category',
                'vehicles.insurance',
                'vehicles.color',
                'vehicles.fare',
                'vehicles.destination_type',
                'vehicles.attachment',
                'vehicles.luggage'
            )
            ->paginate($perPage);

        $vehicle_data = DB::table('vehicles')->paginate($perPage);

        return view('pages.driver', compact('data', 'vehicle_data'));
    }


    public function newdriver()
    {

        $vehicle_data = DB::table('vehicles')
            ->leftJoin('drivers', 'vehicles.id', '=', 'drivers.vehicle_id')
            ->whereNull('drivers.vehicle_id')
            ->select('vehicles.*')
            ->get();

        return view('pages.newdriver', compact('vehicle_data'));
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

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone_number' => 'required|max:20|unique:drivers',
            'iqama_number' => 'required|max:20',
            'email_addr' => 'required|email|max:100',
            'driver_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'vehicles' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $destinationPath = 'uploads';
        $driver_img = $request->file('driver_img');
        $driver_img_name = '';
        $data = [
            'ride_id' => 0,
            'customer_id' => 0,
            'status' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->firstname) && $request->firstname != '') {
            $data['firstname'] = $request->firstname;
        }

        if (isset($request->vehicles) && $request->vehicles != '') {
            $data['vehicle_id'] = $request->vehicles;
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
            'ride_id' => 0,
            'customer_id' => 0,
            'status' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        if (isset($request->vehicles) && $request->vehicles != '') {
            $data['vehicle_id'] = $request->vehicles;
        }
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
        if (isset($request->vehicles) && $request->vehicles != '') {
            $data['vehicle_id'] = $request->vehicles;
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
        if (!is_null($vehicle)) {
            DB::table('rides')->whereVehicleId($request->input('vehicle_id'))->whereDriverId(0)->update([
                'driver_id' => $id
            ]);
            DB::table('vehicles')->where('driver_id', $id)->update(['driver_id' => 0]);
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
    public function getVehicleData(Request $request)
    {
        $vehicleId = $request->input('vehicle_id');
        $vehicleData = DB::table('vehicles')->where('id', $vehicleId)->first();
        return response()->json([
            'category' => $vehicleData->category,
            'name' => $vehicleData->brand,
            'plate_no' => $vehicleData->reg_no,
            'model_year' => $vehicleData->year,
            'color' => $vehicleData->color,
        ]);
    }

    public function editdriver($id)
    {

        $driver = DB::table('drivers')->where('id', $id)->first();

        

        // Fetch the assigned vehicle for the current driver and all unassigned vehicles
        $vehicle_data = DB::table('vehicles')
            ->leftJoin('drivers as d1', 'vehicles.id', '=', 'd1.vehicle_id')
            ->leftJoin('drivers as d2', function ($join) use ($id) {
                $join->on('vehicles.id', '=', 'd2.vehicle_id')
                    ->where('d2.id', '=', $id);
            })
            ->whereNull('d1.vehicle_id')
            ->orWhereNotNull('d2.vehicle_id')
            ->select('vehicles.*')
            ->get();

          

        return view('pages.editdriver', compact('driver','vehicle_data'));
    }
}
