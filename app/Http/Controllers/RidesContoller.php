<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RideAssignMail;
use App\Mail\CompletedMail;
use App\Mail\CustomerMail;
use Illuminate\Support\Facades\URL;
use App\Mail\PayLaterMail;


class RidesContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 25); // Default to 25 items per page
        // $data = DB::table('rides')
        //     ->orderByDesc('created_at')
        //     ->paginate($perPage);
 $data = DB::table('rides')
        ->leftJoin('drivers', 'rides.driver_id', '=', 'drivers.id')
        ->orderByDesc('rides.created_at')
        ->select('rides.*', 'drivers.firstname','drivers.lastname') // Specify the columns you want to select
        ->paginate($perPage);
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
        
        
    //     $insert_data = [
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ];
    //     if ($request->catgory == 'airport') {
    //         $customer = DB::table('customers')->where('id', $request->input(['customer_id']))->first();
    //         $customer_email = $customer->email;
    //         $customer_name = $customer->name;
    //         $insert_data['customer_email'] = $customer_email;
    //         $insert_data['customer_name'] = $customer_name;
    //         $insert_data['flight_number'] = $request->flight_number_airport;
    //         $insert_data['driver_pick_up_sign'] = $request->driver_sign_airport;
    //         $insert_data['additional_info'] = $request->driver_note_airport;
    //         $insert_data['booking_pickup'] = $request->booking_pickup_date_airport;
    //         $insert_data['booking_drop'] = $request->booking_drop_time_airport;
    //         $insert_data['hotel_pickup'] = $request->booking_pickup_airport;
    //         $insert_data['hotel_drop'] = $request->booking_drop_airport;
    //         $insert_data['passengers'] = $request->passengers_airport;
    //         $veh = DB::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();
    //         $insert_data['status'] = 'Ride Created';
    //         $insert_data['category'] = $veh->category;
    //         $insert_data['vehicle_id'] = $veh->id;
    //         $insert_data['fare'] = $veh->fare;
    //         $insert_data['car_name'] = $veh->brand;
    //         $res = DB::table('rides')->insert($insert_data);
    //         if ($res == true) {
    //              $status_save = session('status_save');
    //             $url = URL::route('customers.mail');
    //             $from = $request->booking_pickup_airport;
    //             $to = $request->booking_drop_airport;
    //             $date = $request->booking_pickup_date_airport;
    //             $time = $request->booking_drop_time_airport;
    //             $amount = $veh->fare;
    //             $category = $veh->category;
    //             // Mail::to($customer_email)->send(new CustomerMail($url, $customer_email, $from, $to, $date, $time, $amount, $category));
    //             $status_save = session('status_save');
    //             return redirect('/rides')->with('status_save', 'true');
    //         } else {
    //             $status_save = session('status_save');
    //             return redirect('/rides')->with('status_save', 'false');
    //         }
    //     } elseif ($request->catgory == 'hourly') {
    //         $customer = DB::table('customers')->where('id', $data['customer_id'])->first();
    //         $customer_email = $customer->email;
    //         $customer_name = $customer->name;
    //         $insert_data['customer_email'] = $customer_email;
    //         $insert_data['customer_name'] = $customer_name;
    //         $insert_data['flight_number'] = $request->flight_number_hourly;
    //         $insert_data['driver_pick_up_sign'] = $request->driver_sign_hourly;
    //         $insert_data['additional_info'] = $request->driver_note_hourly;
    //         $insert_data['booking_pickup'] = $request->booking_pickup_date;
    //         $insert_data['booking_drop'] = $request->booking_drop_time_hourly;
    //         $insert_data['hotel_pickup'] = $request->booking_pickup_hourly;
    //         $insert_data['hotel_drop'] = $request->booking_drop_hourly;
    //         $insert_data['passengers'] = $request->passengers_hourly;
    //         $veh = DB::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();
    //         $insert_data['status'] = 'Ride Created';
    //         $insert_data['category'] = $veh->category;
    //         $insert_data['vehicle_id'] = $veh->id;
    //         $fare = $veh->fare * $request->pickup_hours;
    //         $insert_data['fare'] = $fare;
    //         $insert_data['car_name'] = $veh->brand;
    //         $res = DB::table('rides')->insert($insert_data);
    //         if ($res == true) {
    //             $status_save = session('status_save');
    //             return redirect('/rides')->with('status_save', 'true');
    //         } else {
    //             $status_save = session('status_save');
    //             return redirect('/rides')->with('status_save', 'false');
    //         }
    //     } else {
    //         $customer = DB::table('customers')->where('id', $data['customer_id'])->first();
    //         $customer_email = $customer->email;
    //         $customer_name = $customer->name;
    //         $insert_data['customer_email'] = $customer_email;
    //         $insert_data['customer_name'] = $customer_name;
    //         $insert_data['flight_number'] = $request->flight_number_full_day;
    //         $insert_data['driver_pick_up_sign'] = $request->driver_sign_full_day;
    //         $insert_data['additional_info'] = $request->driver_note_full_day;
    //         $insert_data['booking_pickup'] = $request->booking_pickup_date_full_day;
    //         $insert_data['booking_drop'] = $request->booking_drop_time_full_day;
    //         $insert_data['hotel_pickup'] = $request->booking_pickup_full_day;
    //         $insert_data['hotel_drop'] = $request->booking_drop_full_day;
    //         $insert_data['passengers'] = $request->passengers_full_day;
    //         $veh = DB::table('vehicles')->where('brand', 'like', '%' . $request->vehicle_id . '%')->first();
    //         $insert_data['status'] = 'Ride Created';
    //         $insert_data['category'] = $veh->category;
    //         $insert_data['vehicle_id'] = $veh->id;
    //         $insert_data['fare'] = $veh->fare;
    //         $insert_data['car_name'] = $veh->brand;
    //         $res = DB::table('rides')->insert($insert_data);
    //         if ($res == true) {
    //             $status_save = session('status_save');
    //             return redirect('/rides')->with('status_save', 'true');
    //         } else {
    //             $status_save = session('status_save');
    //             return redirect('/rides')->with('status_save', 'false');
    //         }
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
            $insert_data['payment_type'] = 'Pay Later';
            $res = DB::table('rides')->insert($insert_data);
            if ($res == true) {

                $pickup = $request->booking_pickup_airport;
                $fare = $veh->fare;
                $drop = $request->booking_drop_airport;
                $name = $customer_name;
                $pickupdate = $request->booking_pickup_date_airport;
                $pickuptime = $request->booking_drop_time_airport;
                Mail::to($customer_email)->cc('reservation@ecsprovider.com')->send(new PaylaterMail($name, $pickup, $drop, $pickupdate, $pickuptime, $fare));

                // $url = URL::route('customers.mail');
                // $from = $request->booking_pickup_airport;
                // $to = $request->booking_drop_airport;

                // $amount = $veh->fare;
                // $category = $veh->category;
                // Mail::to($customer_email)->send(new CustomerMail($url, $customer_email, $from, $to, $date, $time, $amount, $category));
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
            $insert_data['payment_type'] = 'Pay Later';
            $res = DB::table('rides')->insert($insert_data);
            if ($res == true) {
                $pickup = $request->booking_pickup_airport;
                $fare = $veh->fare;
                $drop = $request->booking_drop_airport;
                $name = $customer_name;
                $pickupdate = $request->booking_pickup_date_airport;
                $pickuptime = $request->booking_drop_time_airport;
                Mail::to($customer_email)->cc('reservation@ecsprovider.com')->send(new PaylaterMail($name, $pickup, $drop, $pickupdate, $pickuptime, $fare));
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
            $insert_data['payment_type'] = 'Pay Later';
            $res = DB::table('rides')->insert($insert_data);
            if ($res == true) {
                $pickup = $request->booking_pickup_airport;
                $fare = $veh->fare;
                $drop = $request->booking_drop_airport;
                $name = $customer_name;
                $pickupdate = $request->booking_pickup_date_airport;
                $pickuptime = $request->booking_drop_time_airport;
                Mail::to($customer_email)->cc('reservation@ecsprovider.com')->send(new PaylaterMail($name, $pickup, $drop, $pickupdate, $pickuptime, $fare));
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
                ->where('id', $request->input('ride_id'))
                ->update($updateData);
            $ride = DB::table('rides')->where('id', $request->input('ride_id'))->first();

            $driver = DB::table('drivers')->where('id', $request->input('driver_id'))->first();

            $name = $driver->firstname . ' ' . $driver->lastname;
            $number = $driver->phone_number ?? '';
            $image = $driver->img ?? '';
            $customer_mail = $ride->customer_email ?? '';
            $vehicle = DB::table('vehicles')->where('id', $driver->vehicle_id)->first();
            $customer_name = $ride->customer_name ?? '';
            $vehicle_name = $vehicle->brand . ' ' . $vehicle->model ?? '';
            $category = $vehicle->category ?? '';
            $reg = $vehicle->reg_no ?? '';
            $pickup = $ride->hotel_pickup ?? '';
            $drop = $ride->hotel_drop ?? '';
            $date = $ride->booking_pickup ?? '';
            $time = $ride->booking_drop ?? '';
            $fare = $ride->fare ?? '';
            // Mail::to($customer_mail)->send(new RideAssignMail($name, $number, $image, $vehicle_name, $category, $reg, $pickup, $drop, $date, $time));
            Mail::to($customer_mail)->cc('reservation@ecsprovider.com')
                ->send(new RideAssignMail($name, $number, $vehicle_name, $reg, $customer_name, $pickup, $drop, $date, $time, $fare));
            $status_save = session('status_update');
            return redirect('/rides')->with('status_update', 'true');
        }
        if ($request->status == 'Completed') {


            // Update the ride
            $res_up = DB::table('rides')->where('id', $request->input('ride_id'))->update(['status' => $request->status]);

            $ride = DB::table('rides')->where('id', $request->input('ride_id'))->first();

            $driver = DB::table('drivers')->where('id', $request->input('driver_id'))->first();

            $customer_name = $ride->customer_name ?? '';
            $customer_mail = $ride->customer_email ?? '';
            $customer_number = $ride->cutomer_number ?? '';
            $passenger = $ride->passengers ?? '';
            $car_name = $ride->car_name ?? '';
            $pickup = $ride->hotel_pickup ?? '';
            $drop = $ride->hotel_drop ?? '';
            $date = $ride->booking_pickup ?? '';
            $time = $ride->booking_drop ?? '';
            $fare = $ride->fare ?? '';
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
        $res_up = DB::table('rides')->where('id', $request->input('ride_id'))->update(['status' => $request->status]);
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
