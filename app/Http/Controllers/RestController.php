<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Rest;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;


class RestController extends Controller
{
    public function restIn()
    {
        $user = Auth::user();
        
        $resttimein = Rest::latest()->first();
        
        if(empty($resttimein->start_rest_time)) 
        {
            $resttimein->update([
                'start_rest_time' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();

    }

    public function restOut()
    {
        $user = Auth::user();
        
        $resttimeout = Rest::latest()->first();

        if(empty($resttimeout->end_rest_time)) 
        {
            $resttimeout->update([
                'end_rest_time' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }
}
