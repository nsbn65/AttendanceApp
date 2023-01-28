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
        
        $oldtimein = Rest::where('user_id',$user->id)->latest()->first();
        
        if(empty($oldtimein->start_rest_time)) 
        {
            $oldtimein->create([
                'start_rest_time' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();

    }

    public function restOut()
    {
        $user = Auth::user();
        
        $oldtimein = Rest::where('user_id',$user->id)->latest()->first();

        if(empty($oldtimein->end_rest_time)) 
        {
            $oldtimein->create([
                'end_rest_time' => Carbon::now(),
            ]);
            return redirect()->back();
        }
        return redirect()->back();
    }
}
