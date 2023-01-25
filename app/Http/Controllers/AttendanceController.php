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
        //同じ日に2回出勤が押せない設定(もし打刻されていたらhomeに戻る)
        $oldtimein = Attendance::where('user_id',$user->id)->latest()->first();
        $oldDay = '';

        //退勤前に出勤を2度押せない制御
        if($oldtimein) {
            $oldTimePunchIn = new Carbon($oldtimein->start_time);
            $oldDay = $oldTimePunchIn->startOfDay();//最後に登録したpunchInの時刻を00:00:00で代入
        }
        $today = Carbon::today();//当日の日時を00:00:00で代入

        if(($oldDay == $today) && (empty($oldtimein->end_time))) {
            return redirect()->back()->with('message','出勤打刻済みです');
        }

        // 退勤後に再度出勤を押せない制御
        if($oldtimein) {
            $oldTimePunchOut = new Carbon($oldtimein->end_time);
            $oldDay = $oldTimePunchOut->startOfDay();//最後に登録したpunchInの時刻を00:00:00で代入
        }

        if(($oldDay == $today)) {
            return redirect()->back()->with('message','退勤打刻済みです');
        }

        $time = attendance::create([
            'user_id' => $user->id,
            'user_name' =>$user->name,
            'start_time' => Carbon::now(),
        ]);
        return redirect('/');
    }


    public function punchOut()
    {
        $user = Auth::user();
        
        $timeOut = Attendance::where('user_id',$user->id)->latest()->first();

        //退勤処理がされていない場合のみ退勤処理を実行
        if($timeOut) {
            if(empty($timeOut->end_time)) {
                if($timeOut->start_rest_time && !$timeOut->end_rest_time) {
                    return redirect()->back()->with('message','休憩終了が打刻されていません');
                }else{
                    $timeOut->update([
                        'end_time' => Carbon::now(),
                    ]);
                    return redirect()->back()->with('message','お疲れ様でした!'); 
                }
            }else{
                $today = new Carbon();
                $day = $today->day;
                $oldPunchOut = new Carbon();
                $oldPunchOutDay = $oldPunchOut->day;
                if ($day == $oldPunchOutDay) {
                    return redirect()->back()->with('message','退勤済みです');
                } else {
                    return redirect()->back()->with('message','出勤打刻をしてください');
                }
            }
        } else {
            return redirect()->back()->with('message','出勤打刻がされていません');
        }
    }
}
