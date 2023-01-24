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
        $attendance = new Attendance();
        $attendance = Attendance::create([
            'user_id' => $user->id,
            'start_time' => date()->format("H:i:s"),
        ]);

        //
        //$nowTime = format("H:i:s");
        dd($attendance);
        return redirect('/');
    }


    public function punchOut() 
    {
        $user = Auth::user();
        
        $nowTime = new DateTime();
        $nowTime = format("H:i:s");
        //dd($nowTime);
        return redirect('/');
    }
}
