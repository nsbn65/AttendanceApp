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
        $oldAttendance = Attendance::where('user_id', $user->id)->latest()->first();
        if ($oldAttendance) {
            $oldAttendancePunchIn = new Carbon($oldAttendance->punchIn);
            $oldAttendanceDay = $oldAttendancePunchIn->startOfDay();
        }

        $newAttendanceDay = Carbon::today();

        /**
         * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
         */
        if (($oldAttendanceDay == $newAttendanceDay) && (empty($oldAttendanceDay->punchOut))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $attendance = Attendance::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function punchOut() 
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();

        if(!empty($timestamp->punchOut)) {
            return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        }
        $attendance->update([
            'end_time' => Carbon::now()
        ]);

        return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }
}
