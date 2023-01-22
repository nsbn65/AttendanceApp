<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;


class RestContoller extends Controller
{
    public function restIn()
    {
        $user = Auth::user();
        
        $start_rest_time = Carbon::now();
        //dd($start_rest_time);
        return redirect('/');
    }

    public function restOut()
    {
        $user = Auth::user();
        
        $end_rest_time = Carbon::now();
        //dd($end_rest_time);
        return redirect('/');
    }
}
