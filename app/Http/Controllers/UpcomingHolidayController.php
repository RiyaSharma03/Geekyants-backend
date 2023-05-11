<?php

namespace App\Http\Controllers;
use App\Models\UpcomingHoliday;
use Illuminate\Http\Request;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");
class UpcomingHolidayController extends Controller
{
    public function index()
    {
        $holidays = UpcomingHoliday::all();
        return response()->json($holidays);
    }
}
