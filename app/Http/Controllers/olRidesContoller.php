<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            dd($data);
            $insert_data = [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $customer_email = isset($data['customer_email']) ? $data['customer_email'] : '';
            $customer_first_name = isset($data['customer_first_name']) ? $data['customer_first_name'] : '';
            $customer_last_name = isset($data['customer_last_name']) ? $data['customer_last_name'] : '';
            $airline_name = isset($data['airline_name']) ? $data['airline_name'] : '';
            $flight_number = isset($data['flight_number']) ? $data['flight_number'] : '';
            $driver_pick_up_sign = isset($data['driver_pick_up_sign']) ? $data['driver_pick_up_sign'] : '';
            $additional_info = isset($data['additional_info']) ? $data['additional_info'] : '';
            $pickuptime = isset($data['pickuptime']) ? $data['pickuptime'] : '';
            $pickupdate = isset($data['pickupdate']) ? $data['pickupdate'] : '';
            $from = isset($data['from']) ? $data['from'] : '';
            $to = isset($data['to']) ? $data['to'] : '';
            $passengers = isset($data['passengers']) ? $data['passengers'] : '';
            $car_name = isset($data['car_name']) ? $data['car_name'] : '';
            $fare = 0;
            $booking_type = isset($data['booking_type']) ? $data['booking_type'] : '';
            $hours = isset($data['hours']) ? $data['hours'] : '';
            $vehicle = DB::table('rides')->get();
            $veh = DB::table('vehicles')->where('code', $car_name)->first();
            // $driver = DB::table('drivers')->where('ride_id', $veh->id)->first();

            $response = array();


            if ($customer_email == '') {
                return response()->json(['msg' => 'Email can not be empty.']);
            } elseif ($customer_first_name == '') {
                return response()->json(['msg' => 'Firstname can not be empty.']);
            } elseif ($customer_last_name == '') {
                return response()->json(['msg' => 'Lastname can not be empty.']);
            } elseif ($airline_name == '') {
                return response()->json(['msg' => 'Airline name can not be empty.']);
            } elseif ($flight_number == '') {
                return response()->json(['msg' => 'Flight number can not be empty.']);
            } elseif ($driver_pick_up_sign == '') {
                return response()->json(['msg' => 'Driver pickup sign can not be empty.']);
            } elseif ($additional_info == '') {
                return response()->json(['msg' => 'Additional information can not be empty.']);
            } elseif ($pickuptime == '') {
                return response()->json(['msg' => 'Pickup time can not be empty.']);
            } elseif ($pickupdate == '') {
                return response()->json(['msg' => 'Pickup date can not be empty.']);
            } elseif ($from == '') {
                return response()->json(['msg' => 'Pickup location can not be empty.']);
            } elseif ($to == '') {
                return response()->json(['msg' => 'Dropoff location can not be empty.']);
            } elseif ($passengers == '') {
                return response()->json(['msg' => 'Passengers can not be empty.']);
            } elseif ($car_name == '') {
                return response()->json(['msg' => 'Car name can not be empty.']);
            }
            elseif ($booking_type == '') {
                return response()->json(['msg' => 'Booking Type can not be empty.']);
            }
            // elseif ($hours == '') {
            //     return response()->json(['msg' => 'Hours can not be empty.']);
            // }
            else {
                $insert_data['customer_email'] = $customer_email;
                $insert_data['customer_name'] = $customer_first_name . ' ' . $customer_last_name;
                $insert_data['airline_name'] = $airline_name;
                $insert_data['flight_number'] = $flight_number;
                $insert_data['driver_pick_up_sign'] = $driver_pick_up_sign;
                $insert_data['additional_info'] = $additional_info;
                $insert_data['booking_pickup'] = $pickupdate;
                $insert_data['booking_drop'] = $pickuptime;
                $insert_data['hotel_pickup'] = $from;
                $insert_data['hotel_drop'] = $to;
                $insert_data['passengers'] = $passengers;
                $insert_data['car_name'] = $car_name;
                $insert_data['status'] = 'Ride Created';
                $insert_data['vehicle_id'] = $veh->id;
                // $insert_data['driver_id'] = $driver->id;

                if ($booking_type == 'Hourly') {
                    $vehicle = DB::table('vehicles')->where('code', $car_name)->first();
                    $fare = $vehicle->fare * $hours;
                }
                else{
                    $vehicle = DB::table('vehicles')->where('code', $car_name)->first();
                    $fare = $vehicle->fare;
                }
                // if ($car_name == 'Mercedes S Class' || $car_name == 'BMW 7' || $car_name == 'AUDI A8') {
                //     $fare = 400;
                // } else if ($car_name == 'Mersedes E Class' || $car_name == 'BMW 5' || $car_name == 'AUDI A6') {
                //     $fare = 200;
                // } else if ($car_name == 'GMC' || $car_name == 'Tahoe' || $car_name == 'Suburban') {
                //     $fare = 200;
                // }

                $insert_data['fare'] = $fare;

                $res = DB::table('rides')->insert($insert_data);

                if ($res == true) {
                return response()->json([
                    'msg' => 'Your ride has been booked. Thank you.',
                    'to_route' => true
                    ]);

                    // return response()->json(['msg' => 'Your ride has been booked. Thankyou']);
                } else {
                    return response()->json(['msg' => 'Something went wrong!']);
                }
            }

            return response()->json($data)->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]);
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
        $id = (int)$request->input('id');
        return response()->json([
            'status'=>true,
            'ride'=>DB::table('rides')->whereId($id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
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
         $vehicles = DB::table('vehicles')->where('category', 'like', '%' . $category . '%')->get(['brand','fare']);

        return response()->json([
            'status' => true,
            'vehicles' => $vehicles
        ]);
    }
}
