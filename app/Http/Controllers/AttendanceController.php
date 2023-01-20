<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('attendance',
        [
        'user' => $user,
        ]);
    }

    public function punchIn()
    {
        $user = Auth::user();
        
        $start_time = Carbon::now();
        //dd($start_time);
        return redirect('/');
    }


    public function punchOut() 
    {
        $user = Auth::user();
        
        $end_time = Carbon::now();
        //dd($end_time);
        return redirect('/');
    }
}
