<?php

namespace App\Http\Controllers;

use App\Repositories\AttendanceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\LeaveApplyRepository;
use App\User;

class ReportController extends Controller
{
    public function getCounts()
    {
        $leaveRepo = new LeaveApplyRepository();
        $attendanceRepo = new AttendanceRepository();
        $toDay = Carbon::now()->toDateTimeString();
        $todayLeave = $leaveRepo->getByDate($toDay)->count();
        $attendanceCount = $attendanceRepo->getByAttribute('date', $toDay)->count();
        $birthdayCount = User::where('date_of_birth', $toDay)->get()->count();
        $pendingLeaveCount = $leaveRepo->getByAttribute('status', 0)->count();
        return compact('todayLeave', 'attendanceCount', 'birthdayCount', 'pendingLeaveCount');
    }
}
