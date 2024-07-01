<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RideAssignMail;
use App\Mail\CompletedMail;

class RidesContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = DB::table('rides')->get();
        $data = DB::table('rides')
            ->orderByDesc('created_at')
            ->get();
        $customers = DB::table('customers')->get();
        return view('pages.ride', compact('data', 'customers'));
    }

    public function newride()
    {
        $customers = DB::table('customers')->get();
        return view('pages.newride', compact('customers'));
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
    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     $status_exists = array_key_exists('status',$request->all());
    //     $id_exists = array_key_exists('id',$request->all());
    //     $destinationPath = 'uploads';
    //     $data = [
    //         'driver_id' => 0,
    //         'customer_id' => 0,
    //         'vehicle_id' => 0,
    //         'status' => 'Ride Created',
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now()
    //     ];

    //     if (isset($request->ride_city) && $request->ride_city != '') {
    //         $data['ride_city'] = $request->ride_city;
    //     }

    //     if (isset($request->b2b_day_hour) && $request->b2b_day_hour != '') {
    //         $data['b2b_day_hour'] = $request->b2b_day_hour;
    //     }

    //     if (isset($request->booking_pickup) && $request->booking_pickup != '') {
    //         $data['booking_pickup'] = $request->booking_pickup;
    //     }

    //     if (isset($request->booking_drop) && $request->booking_drop != '') {
    //         $data['booking_drop'] = $request->booking_drop;
    //     }

    //     if (isset($request->distance) && $request->distance != '') {
    //         $data['distance'] = $request->distance;
    //     }

    //     if (isset($request->category) && $request->category != '') {
    //         $data['category'] = $request->category;
    //     }

    //     if (isset($request->cutomer_number) && $request->cutomer_number != '') {
    //         $data['cutomer_number'] = $request->cutomer_number;
    //     }

    //     if (isset($request->customer_name) && $request->customer_name != '') {
    //         $data['customer_name'] = $request->customer_name;
    //     }

    //     if (isset($request->customer_email) && $request->customer_email != '') {
    //         $data['customer_email'] = $request->customer_email;
    //     }

    //     if (isset($request->guest_number) && $request->guest_number != '') {
    //         $data['guest_number'] = $request->guest_number;
    //     }

    //     if (isset($request->flight_number) && $request->flight_number != '') {
    //         $data['flight_number'] = $request->flight_number;
    //     }

    //     if (isset($request->terminal_number) && $request->terminal_number != '') {
    //         $data['terminal_number'] = $request->terminal_number;
    //     }

    //     if (isset($request->flight_detail) && $request->flight_detail != '') {
    //         $data['flight_detail'] = $request->flight_detail;
    //     }

    //     if (isset($request->hotel_name) && $request->hotel_name != '') {
    //         $data['hotel_name'] = $request->hotel_name;
    //     }

    //     if (isset($request->hotel_pickup) && $request->hotel_pickup != '') {
    //         $data['hotel_pickup'] = $request->hotel_pickup;
    //     }

    //     if (isset($request->hotel_drop) && $request->hotel_drop != '') {
    //         $data['hotel_drop'] = $request->hotel_drop;
    //     }
    //      if( $id_exists ) {
    //         $res_up = DB::table('rides')->where('id', $request->input('id'))->update(['status' => $request->status]);

    //         // $res_up = DB::table('rides')->where('id',$request->input('id'))->update($data);
    //         $res = false;
    //     } else {
    //         $res = DB::table('rides')->insert($data);
    //         $res_up = false;
    //     }

    //     if ($res ) {
    //         $status_save = session('status_save');
    //         return redirect('/rides')->with('status_save', 'true');
    //     } else if ($res_up){
    //         $status_save = session('status_update');
    //         return redirect('/rides')->with('status_update', 'true');
    //     }else {
    //         $status_save = session('status_save');
    //         return redirect('/rides')->with('status_save', 'false');
    //     }

    //     // $res = DB::table('rides')->insert($data);

    //     // if ($res == true) {
    //     //     $status_save = session('status_save');
    //     //     return redirect('/rides')->with('status_save', 'true');
    //     // } else {
    //     //     $status_save = session('status_save');
    //     //     return redirect('/rides')->with('status_save', 'false');
    //     // }
    // }
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     // $this->validate($request, [
    //     //     'customer_id' => 'exists:customers,customer_id'
    //     // ]);


    //     $customer = DB::table('customers')->where('id', $request->customer_id)->first();
    //     $vehicle = Db::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();

    //     $data = [
    //         'customer_id' => $request->customer_id,
    //         'customer_name' => $customer->name,
    //         'cutomer_number' => $customer->mobile_number,
    //         'customer_email' => $customer->email,
    //         'vehicle_id' => $vehicle->id,
    //         'car_name' => $vehicle->brand,
    //         'fare' => $vehicle->fare,
    //         'booking_pickup' => $request->booking_pickup_date,
    //         'booking_drop' => $request->booking_drop_time,
    //         'status' => 'Ride Created',
    //         'driver_pick_up_sign' => $request->driver_sign ?? 'null',
    //         'additional_info' => $request->driver_note ?? 'null',
    //         'passengers' => $request->passengers,
    //         'category' => $request->category,
    //         'hotel_pickup' =>$request->booking_pickup,
    //         'hotel_drop' =>$request->booking_drop
    //     ];
    //     // dd($data, $request->all());
    //     $destinationPath = 'uploads';
    //     // $data = [

    //     //     'driver_id' => 0,
    //     //     'customer_id' => 0,
    //     //     'vehicle_id' => 0,
    //     //     'status' => 'booked',
    //     //     'created_at' => Carbon::now(),
    //     //     'updated_at' => Carbon::now()
    //     // ];

    //     // if (isset($request->ride_city) && $request->ride_city != '') {
    //     //     $data['ride_city'] = $request->ride_city;
    //     // }

    //     // if (isset($request->b2b_day_hour) && $request->b2b_day_hour != '') {
    //     //     $data['b2b_day_hour'] = $request->b2b_day_hour;
    //     // }

    //     // if (isset($request->booking_pickup) && $request->booking_pickup != '') {
    //     //     $data['booking_pickup'] = $request->booking_pickup;
    //     // }

    //     // if (isset($request->booking_drop) && $request->booking_drop != '') {
    //     //     $data['booking_drop'] = $request->booking_drop;
    //     // }

    //     // if (isset($request->distance) && $request->distance != '') {
    //     //     $data['distance'] = $request->distance;
    //     // }

    //     // if (isset($request->category) && $request->category != '') {
    //     //     $data['category'] = $request->category;
    //     // }

    //     // if (isset($request->cutomer_number) && $request->cutomer_number != '') {
    //     //     $data['cutomer_number'] = $request->cutomer_number;
    //     // }

    //     // if (isset($request->customer_name) && $request->customer_name != '') {
    //     //     $data['customer_name'] = $request->customer_name;
    //     // }

    //     // if (isset($request->customer_email) && $request->customer_email != '') {
    //     //     $data['customer_email'] = $request->customer_email;
    //     // }

    //     // if (isset($request->guest_number) && $request->guest_number != '') {
    //     //     $data['guest_number'] = $request->guest_number;
    //     // }

    //     // if (isset($request->flight_number) && $request->flight_number != '') {
    //     //     $data['flight_number'] = $request->flight_number;
    //     // }

    //     // if (isset($request->terminal_number) && $request->terminal_number != '') {
    //     //     $data['terminal_number'] = $request->terminal_number;
    //     // }

    //     // if (isset($request->flight_detail) && $request->flight_detail != '') {
    //     //     $data['flight_detail'] = $request->flight_detail;
    //     // }

    //     // if (isset($request->hotel_name) && $request->hotel_name != '') {
    //     //     $data['hotel_name'] = $request->hotel_name;
    //     // }

    //     // if (isset($request->hotel_pickup) && $request->hotel_pickup != '') {
    //     //     $data['hotel_pickup'] = $request->hotel_pickup;
    //     // }

    //     // if (isset($request->hotel_drop) && $request->hotel_drop != '') {
    //     //     $data['hotel_drop'] = $request->hotel_drop;
    //     // }

    //     $res = DB::table('rides')->insert($data);

    //     if ($res == true) {
    //         $status_save = session('status_save');
    //         return redirect('/rides')->with('status_save', 'true');
    //     } else {
    //         $status_save = session('status_save');
    //         return redirect('/rides')->with('status_save', 'false');
    //     }
    // }
    public function store(Request $request)
    {
        $data = $request->all();
        $insert_data = [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        if ($request->catgory == 'airport') {
            $customer = DB::table('customers')->where('id', $data['customer_id'])->first();
            $customer_email = $customer->email;
            $customer_name = $customer->name;
            $insert_data['customer_email'] = $customer_email;
            $insert_data['customer_name'] = $customer_name;
            $insert_data['flight_number'] = $request->flight_number_airport;
            $insert_data['driver_pick_up_sign'] = $request->driver_sign_airport;
            $insert_data['additional_info'] = $request->driver_note_airport;
            $insert_data['booking_pickup'] = $request->booking_pickup_date_airport;
            $insert_data['booking_drop'] = $request->booking_drop_time_airport;
            $insert_data['hotel_pickup'] = $request->booking_pickup_airport;
            $insert_data['hotel_drop'] = $request->booking_drop_airport;
            $insert_data['passengers'] = $request->passengers_airport;
            $veh = DB::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();
            $insert_data['status'] = 'Ride Created';
            $insert_data['category'] = $veh->category;
            $insert_data['vehicle_id'] = $veh->id;
            $insert_data['fare'] = $veh->fare;
            $insert_data['car_name'] = $veh->brand;
            $res = DB::table('rides')->insert($insert_data);
            if ($res == true) {
                $status_save = session('status_save');
                return redirect('/rides')->with('status_save', 'true');
            } else {
                $status_save = session('status_save');
                return redirect('/rides')->with('status_save', 'false');
            }
        } elseif ($request->catgory == 'hourly') {
            $customer = DB::table('customers')->where('id', $data['customer_id'])->first();
            $customer_email = $customer->email;
            $customer_name = $customer->name;
            $insert_data['customer_email'] = $customer_email;
            $insert_data['customer_name'] = $customer_name;
            $insert_data['flight_number'] = $request->flight_number_hourly;
            $insert_data['driver_pick_up_sign'] = $request->driver_sign_hourly;
            $insert_data['additional_info'] = $request->driver_note_hourly;
            $insert_data['booking_pickup'] = $request->booking_pickup_date;
            $insert_data['booking_drop'] = $request->booking_drop_time_hourly;
            $insert_data['hotel_pickup'] = $request->booking_pickup_hourly;
            $insert_data['hotel_drop'] = $request->booking_drop_hourly;
            $insert_data['passengers'] = $request->passengers_hourly;
            $veh = DB::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();
            $insert_data['status'] = 'Ride Created';
            $insert_data['category'] = $veh->category;
            $insert_data['vehicle_id'] = $veh->id;
            $fare = $veh->fare * $request->pickup_hours;
            $insert_data['fare'] = $fare;
            $insert_data['car_name'] = $veh->brand;
            $res = DB::table('rides')->insert($insert_data);
            if ($res == true) {
                $status_save = session('status_save');
                return redirect('/rides')->with('status_save', 'true');
            } else {
                $status_save = session('status_save');
                return redirect('/rides')->with('status_save', 'false');
            }
        } else {
            $customer = DB::table('customers')->where('id', $data['customer_id'])->first();
            $customer_email = $customer->email;
            $customer_name = $customer->name;
            $insert_data['customer_email'] = $customer_email;
            $insert_data['customer_name'] = $customer_name;
            $insert_data['flight_number'] = $request->flight_number_full_day;
            $insert_data['driver_pick_up_sign'] = $request->driver_sign_full_day;
            $insert_data['additional_info'] = $request->driver_note_full_day;
            $insert_data['booking_pickup'] = $request->booking_pickup_date_full_day;
            $insert_data['booking_drop'] = $request->booking_drop_time_full_day;
            $insert_data['hotel_pickup'] = $request->booking_pickup_full_day;
            $insert_data['hotel_drop'] = $request->booking_drop_full_day;
            $insert_data['passengers'] = $request->passengers_full_day;
            $veh = DB::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();
            $insert_data['status'] = 'Ride Created';
            $insert_data['category'] = $veh->category;
            $insert_data['vehicle_id'] = $veh->id;
            $insert_data['fare'] = $veh->fare;
            $insert_data['car_name'] = $veh->brand;
            $res = DB::table('rides')->insert($insert_data);
            if ($res == true) {
                $status_save = session('status_save');
                return redirect('/rides')->with('status_save', 'true');
            } else {
                $status_save = session('status_save');
                return redirect('/rides')->with('status_save', 'false');
            }
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
    // public function edit(string $id)
    // {
    //     //
    // }
    public function edit(Request $request)
    {
        $id = (int) $request->input('id');
        return response()->json([
            'status' => true,
            'ride' => DB::table('rides')->whereId($id)->first()
        ]);
    }
    public function ride_edit($id)
    {

        // Cast the ID to an integer, though it should already be an integer
        $id = (int) $id;
        // Retrieve the ride details from the database
        $ride = DB::table('rides')->where('id', $id)->first();

        // Check if the ride exists
        if (!$ride) {
            return response()->json([
                'status' => false,
                'message' => 'Ride not found'
            ]);
        }

        // Return the ride details as JSON
        return view('pages.ride-detail', compact('ride'));
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {

    //     if($request->status == 'Driver Assigned')
    //     {
    //         $updateData = [
    //             'status' => $request->input('status'),
    //             'driver_id' => $request->input('driver_id')
    //         ];

    //         // Update the ride
    //         $res_up = DB::table('rides')
    //             ->where('id', $request->input('id'))
    //             ->update($updateData);
    //     // $res_up = DB::table('rides')->where('id', $request->input('id'))->update(['status' => $request->status], ['driver_id' => $request->driver_id]);
    //     $status_save = session('status_update');
    //     return redirect('/rides')->with('status_update', 'true');
    //     }
    //     $res_up = DB::table('rides')->where('id', $request->input('id'))->update(['status' => $request->status]);
    //     $status_save = session('status_update');
    //     return redirect('/rides')->with('status_update', 'true');
    // }
    public function update(Request $request)
    {

        if ($request->status == 'Driver Assigned') {
            $updateData = [
                'status' => $request->input('status'),
                'driver_id' => $request->input('driver_id')
            ];

            // Update the ride
            $res_up = DB::table('rides')
                ->where('id', $request->input('id'))
                ->update($updateData);
            $ride = DB::table('rides')->where('id', $request->input('id'))->first();

            $driver = DB::table('drivers')->where('id', $request->input('driver_id'))->first();

            $name = $driver->firstname . ' ' . $driver->lastname;
            $number = $driver->phone_number;
            $image = $driver->img;
            $customer_mail = $ride->customer_email;
            $vehicle = DB::table('vehicles')->where('id', $driver->vehicle_id)->first();
            $customer_name = $ride->customer_name;
            $vehicle_name = $vehicle->brand . ' ' . $vehicle->model;
            $category = $vehicle->category;
            $reg = $vehicle->reg_no;
            $pickup = $ride->hotel_pickup;
            $drop = $ride->hotel_drop;
            $date = $ride->booking_pickup;
            $time = $ride->booking_drop;
            $fare = $ride->fare;
            // Mail::to($customer_mail)->send(new RideAssignMail($name, $number, $image, $vehicle_name, $category, $reg, $pickup, $drop, $date, $time));
            Mail::to($customer_mail)->cc('reservation@ecsprovider.com')
                ->send(new RideAssignMail($name, $number, $vehicle_name, $reg, $customer_name, $pickup, $drop, $date, $time, $fare));
            $status_save = session('status_update');
            return redirect('/rides')->with('status_update', 'true');
        }
        if ($request->status == 'Completed') {


            // Update the ride
            $res_up = DB::table('rides')->where('id', $request->input('id'))->update(['status' => $request->status]);

            $ride = DB::table('rides')->where('id', $request->input('id'))->first();

            $driver = DB::table('drivers')->where('id', $request->input('driver_id'))->first();

            $customer_name = $ride->customer_name;
            $customer_mail = $ride->customer_email;
            $customer_number = $ride->cutomer_number;
            $passenger = $ride->passengers;
            $car_name = $ride->car_name;
            $pickup = $ride->hotel_pickup;
            $drop = $ride->hotel_drop;
            $date = $ride->booking_pickup;
            $time = $ride->booking_drop;
            $fare = $ride->fare;
            $payment_type = $ride->payment_type ?? 'Card';
            Mail::to($customer_mail)->cc('reservation@ecsprovider.com')
                ->send(
                    new CompletedMail(
                        $date,
                        $time,
                        $customer_name,
                        $customer_number,
                        $passenger,
                        $car_name,
                        $payment_type,
                        $pickup,
                        $drop,
                        $fare
                    )
                );
            $status_save = session('status_update');
            return redirect('/rides')->with('status_update', 'true');
        }
        $res_up = DB::table('rides')->where('id', $request->input('id'))->update(['status' => $request->status]);
        $status_save = session('status_update');
        return redirect('/rides')->with('status_update', 'true');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getVehicleByCategory(Request $request)
    {
        $category = $request->input('category');
        $vehicles = DB::table('vehicles')->where('category', 'like', '%' . $category . '%')->get(['brand', 'fare']);

        return response()->json([
            'status' => true,
            'vehicles' => $vehicles
        ]);
    }
    public function getDriver(Request $request)
    {
        // $driver = DB::table('drivers')->get();
        $driver = DB::table('drivers')
            ->where('vehicle_id', '>', 0)
            ->get();
        return response()->json([
            'status' => true,
            'driver' => $driver
        ]);
    }

}
