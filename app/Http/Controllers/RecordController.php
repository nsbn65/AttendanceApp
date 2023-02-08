<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $times = Attendance::where('user_id',$user->id)->where('year',$request->year)->where('month',$request->month)->get();
        return view('record',['times'=>$times]);
        //$times = Attendance::whereYear('start_time', 2022)->whereMonth('start_time', 1)->orderBy('start_time')->get()->groupBy(function ($row) {return $row->created_at->format('d');})->map(function ($day) {
            //return $day->sum('count');});
        
        return view('record', [
            'times' => '$times'
        ]
    );
    }
}