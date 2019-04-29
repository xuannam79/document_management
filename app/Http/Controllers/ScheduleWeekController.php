<?php

namespace App\Http\Controllers;

use App\Models\ScheduleWeek;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleWeekController extends Controller
{
    public function index(){
        $schedule = ScheduleWeek::where('is_active', config('setting.active.is_active'))
            ->get();

        return view('schedule_week.index', compact('schedule'));
    }

    public function show($id){
        try
        {
            $schedule = ScheduleWeek::where('is_active', config('setting.active.is_active'))
                ->where(DB::raw('DATEDIFF(CURRENT_DATE(), scheduleweek.start)'),'<=','6')
                ->first();
            $timeTable = json_decode($schedule->content);
            $scheduleRandom = ScheduleWeek::where('is_active', config('setting.active.is_active'))
                ->where('id', '!=', $id)
                ->orderBy(DB::raw('RAND()'))
                ->limit(5)
                ->get();
            $countSchedule =  $scheduleRandom->count();

            return view('schedule_week.detail', compact('schedule', 'timeTable', 'scheduleRandom', 'countSchedule'));
        }
        catch (Exception $exception)
        {
            return redirect()->back()->with('messageFail', "Lỗi Hệ Thống");
        }
    }

    public function indexNoLogin(){
        $schedule = ScheduleWeek::where('is_active', config('setting.active.is_active'))
            ->where(DB::raw('DATEDIFF(CURRENT_DATE(), scheduleweek.start)'),'<=','6')
            ->first();
        $timeTable = json_decode($schedule->content);

        return view('common.schedule_week', compact('schedule', 'timeTable'));
    }
}
