<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 25);

        // $data = DB::table('rides')->where('status', 'Completed') ->paginate($perPage);
        $data = DB::table('rides')->where('status', 'Completed')
        ->leftJoin('drivers', 'rides.driver_id', '=', 'drivers.id')
        ->orderByDesc('rides.created_at')
        ->select('rides.*', 'drivers.firstname','drivers.lastname') // Specify the columns you want to select
        ->paginate($perPage);
        return view('pages.finance', compact('data'));
    }
}
