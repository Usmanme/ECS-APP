<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleAPIController extends Controller
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
        
        $vehicle = DB::table('vehicles')->where('category', $request->category)->get();
        $pickup = $request->pickup;
        $dropoff = $request->dropoff;
        $picktime = $request->picktime;
        $pickdate = $request->pickdate;
        $passengers = $request->passengers;
        $category = $request->category;

        $response = array();

        if ($pickup == '') {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Pickup can not be empty.';
        } elseif ($dropoff == '') {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Drop off can not be empty.';
        } elseif ($picktime == '') {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Pick up can not be empty.';
        } elseif ($pickdate == '') {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Pick up can not be empty.';
        } elseif ($passengers == '') {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Passengers can not be empty.';
        }
        elseif ($category == '') {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Category can not be empty.';
        }
        elseif (str_contains($pickup, 'Riyadh') && str_contains($dropoff, 'Riyadh')) {
            foreach ($vehicle as $key => $value) {
                $response[$key]['name'] = $value->code;
                $response[$key]['type'] = $value->type;
                $response[$key]['fare'] = $value->fare;
                $response[$key]['color'] = $value->color;
                $response[$key]['category'] = $value->category;
                $response[$key]['pass_cap'] = $value->pass_cap;
                $response[$key]['luggage'] = $value->luggage;
                $response[$key]['img'] = ($value->img != '') ? asset('/uploads/' . $value->img) : asset('/assets/images/placeholder-car.png');
                $response[$key]['created_at'] = $value->created_at;
                $response[$key]['updated_at'] = $value->updated_at;

                $data['status'] = 200;
                $data['success'] = true;
            }
            $data['result'] = $response;
        } else {
            $data['status'] = 200;
            $data['success'] = false;
            $data['result'] = 'Cars not available at this location';
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
