<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {

        $data = Patient::select(DB::raw("date(created_at) as dates"), DB::raw("COUNT(*) as count"))
            ->orderBy("created_at", 'DESC')
            ->whereDate('created_at', ">=", Carbon::now()->subMonth(1))
            ->groupBy(DB::raw("day(created_at)"))
            ->get()->toArray();
        $dates = Arr::pluck($data, 'dates');
        $count = Arr::pluck($data, 'count');
        $max = round(max($count) + 5, -1);
        $min = round(min($count), -1);  
        $chartdata = [
            'dates' => $dates,
            'count' => $count,
            'max' => $max,
            'min' => $min,
            'step' => (($max - $min) / 8),

        ];
        return view('doctor.chart', compact('chartdata'));
    }
}
