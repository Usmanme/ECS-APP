<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\PayLaterMail;
use Illuminate\Support\Facades\Mail;

class BookingAndCustomerDetailAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       

        $data = $request->all();

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
            // $insert_data['category'] = $veh->category;

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

            // $res = DB::table('rides')->insert($insert_data);
            $res = DB::table('rides')->insertGetId($insert_data);

            if ($res == true) {
                
            if ($request->payType == "paylater") {
                 DB::table('rides')
        ->where('id', $res)
        ->update(['payment_type' => 'paylater']);
                    $pickup = $from;
                    $fare = $fare;
                    $drop = $to;
                    $name = $customer_first_name . ' ' . $customer_last_name;
                    Mail::to($customer_email)->cc('reservation@ecsprovider.com')->send(new PaylaterMail($name,$pickup, $drop,$pickupdate, $pickuptime, $fare));
                }
               return response()->json([
                'msg' => 'Your ride has been booked. Thank you.',
                ]);
                
            } else {
                return response()->json(['msg' => 'Something went wrong!']);
            }
        }

        return response()->json($data)->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]);
    }

    public function showBookingConfirmation()
    {
        return view('pages.checkout');
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
