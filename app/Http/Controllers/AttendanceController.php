<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class AttendanceController extends Controller
{

    public function attendanceIndex()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        // Fetch all attendance records for the current month
        $attendanceRecords = Attendance::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function($attendance) {
                return Carbon::parse($attendance->created_at)->format('Y-m-d');
            });

        // Get all employees
        // $employees = User::all();
        $admin_id = adminId();
        $employees = DB::table('users')
                    ->where('users.admin_id',$admin_id)
                    ->join('employees', 'users.user_id', '=', 'employees.employee_id')
                    ->select('users.*', 'employees.birth_date', 'employees.gender', 'employees.company')
                    ->get();

        $dates = [];
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        $monthlySummaries = [];

        foreach ($employees as $employee) {
            $employeeSummary = [
                    'employee_name' => $employee->name,
                    'employee_id' => $employee->user_id ,
                    'attendance' => []];

            foreach ($dates as $date) {
                $employeeRecords = $attendanceRecords->get($date, collect())->where('employee_id', $employee->user_id);

                if ($employeeRecords->isEmpty()) {
                    $employeeSummary['attendance'][$date] = 'Absent';
                } else {
                    $employeeSummary['attendance'][$date] = 'Present';
                }
            }

            $monthlySummaries[] = $employeeSummary;
        }

        return view('form.attendance',compact('dates','monthlySummaries'));
    }

    public function employee_report(Request $request)
    {
        $currentStatus = Attendance::where('employee_id',$request->id)
            ->whereDate('created_at',$request->date)
            ->orderBy('id','DESC')
            ->first();
        $firstIn = Attendance::where('employee_id',$request->id)
        ->where('status','=','in')
        ->whereDate('created_at',$request->date)
        ->first();

        $outTime = Attendance::where('employee_id',$request->id)
            ->where('status','=','out')
            ->whereDate('created_at',$request->date)
            ->orderBy('created_at','DESC')
            ->first();
        $todaysActivity = Attendance::where('employee_id',$request->id)
            ->whereDate('created_at',$request->date)
            ->orderBy('created_at','DESC')
            ->get()
            ->map(function ($item) {
                $item->time = date('h.i A',strtotime($item->created_at));
                return $item;
            });

        $totalPunching = Attendance::where('employee_id',$request->id)
            ->whereDate('created_at',$request->date)
            ->orderBy('created_at')
            ->get();
        $totalWorkTime = 0;
        $totalBreakTime = 0;
        $lastPunchInTime = null;
        $lastPunchOutTime = null;

        foreach ($totalPunching as $punch) {
            if ($punch->status == 'in') {
                if ($lastPunchInTime === null) {
                    $lastPunchInTime = Carbon::parse($punch->created_at);
                } elseif ($lastPunchOutTime !== null) {
                    // Calculate break time
                    $breakTime = Carbon::parse($punch->created_at)->diffInMinutes($lastPunchOutTime);
                    $totalBreakTime += $breakTime;
                    $lastPunchInTime = Carbon::parse($punch->created_at);
                    $lastPunchOutTime = null;
                }
            } elseif ($punch->status == 'out' && $lastPunchInTime !== null) {
                // Calculate work time
                $workTime = Carbon::parse($punch->created_at)->diffInMinutes($lastPunchInTime);
                $totalWorkTime += $workTime;
                $lastPunchOutTime = Carbon::parse($punch->created_at);
                // $lastPunchInTime = null;
            }
        }
        // dd($totalBreakTime);
        $totalWorkHours = floor($totalWorkTime / 60);
        $totalWorkMinutes = $totalWorkTime % 60;
        $todayTotalWorkTime = sprintf('%02d:%02d', $totalWorkHours, $totalWorkMinutes);

        // Calculate total break time in H:i format
        $totalBreakHours = floor($totalBreakTime / 60);
        $totalBreakMinutes = $totalBreakTime % 60;
        $todayTotalBreakTime = sprintf('%02d:%02d', $totalBreakHours, $totalBreakMinutes);

        // Calculate overtime if total work hours exceed 8 hours
        $overtimeMinutes = 0;
        if ($totalWorkTime > 8 * 60) {
            $overtimeMinutes = $totalWorkTime - (8 * 60);
        }
        $overtimeHours = floor($overtimeMinutes / 60);
        $overtimeMinutes = $overtimeMinutes % 60;
        $todayOvertime = sprintf('%02d:%02d', $overtimeHours, $overtimeMinutes);

        $punchRecords = Attendance::where('employee_id', $request->id)
        ->orderBy('created_at')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });

        $data = [
            'currentStatus' => $currentStatus,
            'firstIn'=> date('D, jS M Y h.i A', strtotime($firstIn->created_at)),
            'outTime' => date('D, jS M Y h.i A', strtotime($outTime->created_at)),
            'todaysActivity'=>$todaysActivity,
            'todayTotalWorkTime'=>$todayTotalWorkTime,
            'todayTotalBreakTime'=>$todayTotalBreakTime,
            'todayOvertime'=>$todayOvertime,
            'date' => date('d M Y',strtotime($request->date))
        ];

        return response()->json($data);
    }

    // attendance employee
    public function AttendanceEmployee()
    {
        $currentStatus = Attendance::where('employee_id',auth()->user()->user_id)
            ->whereDate('created_at',date('Y-m-d'))
            ->orderBy('id','DESC')
            ->first();
        $firstIn = Attendance::where('employee_id',auth()->user()->user_id)
        ->where('status','=','in')
        ->whereDate('created_at',date('Y-m-d'))
        ->first();
        $todaysActivity = Attendance::where('employee_id',auth()->user()->user_id)
            ->whereDate('created_at',date('Y-m-d'))
            ->orderBy('created_at','DESC')
            ->get();

        $totalPunching = Attendance::where('employee_id',auth()->user()->user_id)
            ->whereDate('created_at',date('Y-m-d'))
            ->orderBy('created_at')
            ->get();
        $totalWorkTime = 0;
        $totalBreakTime = 0;
        $lastPunchInTime = null;
        $lastPunchOutTime = null;

        foreach ($totalPunching as $punch) {
            if ($punch->status == 'in') {
                if ($lastPunchInTime === null) {
                    $lastPunchInTime = Carbon::parse($punch->created_at);
                } elseif ($lastPunchOutTime !== null) {
                    // Calculate break time
                    $breakTime = Carbon::parse($punch->created_at)->diffInMinutes($lastPunchOutTime);
                    $totalBreakTime += $breakTime;
                    $lastPunchInTime = Carbon::parse($punch->created_at);
                    $lastPunchOutTime = null;
                }
            } elseif ($punch->status == 'out' && $lastPunchInTime !== null) {
                // Calculate work time
                $workTime = Carbon::parse($punch->created_at)->diffInMinutes($lastPunchInTime);
                $totalWorkTime += $workTime;
                $lastPunchOutTime = Carbon::parse($punch->created_at);
                // $lastPunchInTime = null;
            }
        }
        // dd($totalBreakTime);
        $totalWorkHours = floor($totalWorkTime / 60);
        $totalWorkMinutes = $totalWorkTime % 60;
        $todayTotalWorkTime = sprintf('%02d:%02d', $totalWorkHours, $totalWorkMinutes);

        // Calculate total break time in H:i format
        $totalBreakHours = floor($totalBreakTime / 60);
        $totalBreakMinutes = $totalBreakTime % 60;
        $todayTotalBreakTime = sprintf('%02d:%02d', $totalBreakHours, $totalBreakMinutes);

        // Calculate overtime if total work hours exceed 8 hours
        $overtimeMinutes = 0;
        if ($totalWorkTime > 8 * 60) {
            $overtimeMinutes = $totalWorkTime - (8 * 60);
        }
        $overtimeHours = floor($overtimeMinutes / 60);
        $overtimeMinutes = $overtimeMinutes % 60;
        $todayOvertime = sprintf('%02d:%02d', $overtimeHours, $overtimeMinutes);

        $punchRecords = Attendance::where('employee_id', auth()->user()->user_id)
        ->orderBy('created_at')
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });
        // dd($punchRecords);
        $dailySummaries = [];

        foreach ($punchRecords as $date => $punches) {
            $totalWorkTime = 0; // in minutes
            $totalBreakTime = 0; // in minutes
            $lastPunchInTime = null;
            $lastPunchOutTime = null;
            $firstPunchInTime = null;
            $lastPunchOutTimeOfDay = null;

            foreach ($punches as $punch) {
                $punchTime = Carbon::parse($punch->created_at);

                if ($punch->status == 'in') {
                    if ($lastPunchInTime === null) {
                        $lastPunchInTime = $punchTime;

                        // Set the first punch-in time for the day
                        if ($firstPunchInTime === null) {
                            $firstPunchInTime = $punchTime;
                        }

                        // Calculate break time if there was a previous punch out time
                        if ($lastPunchOutTime !== null) {
                            $breakTime = $lastPunchInTime->diffInMinutes($lastPunchOutTime);
                            $totalBreakTime += $breakTime;
                        }
                    }
                } elseif ($punch->status == 'out' && $lastPunchInTime !== null) {
                    // Calculate work time
                    $workTime = $punchTime->diffInMinutes($lastPunchInTime);
                    $totalWorkTime += $workTime;
                    $lastPunchOutTime = $punchTime;
                    $lastPunchInTime = null;
                }
            }

            // Set the last punch-out time of the day
            $lastPunchOutTimeOfDay = $lastPunchOutTime;

            // Calculate total work time in H:i format
            $totalWorkHours = floor($totalWorkTime / 60);
            $totalWorkMinutes = $totalWorkTime % 60;
            $formattedTotalWorkTime = sprintf('%02d:%02d', $totalWorkHours, $totalWorkMinutes);

            // Calculate total break time in H:i format
            $totalBreakHours = floor($totalBreakTime / 60);
            $totalBreakMinutes = $totalBreakTime % 60;
            $formattedTotalBreakTime = sprintf('%02d:%02d', $totalBreakHours, $totalBreakMinutes);

            // Calculate overtime if total work hours exceed 8 hours
            $overtimeMinutes = 0;
            if ($totalWorkTime > 8 * 60) {
                $overtimeMinutes = $totalWorkTime - (8 * 60);
            }
            $overtimeHours = floor($overtimeMinutes / 60);
            $overtimeMinutes = $overtimeMinutes % 60;
            $formattedOvertime = sprintf('%02d:%02d', $overtimeHours, $overtimeMinutes);

            // Format the first punch-in time and last punch-out time
            $formattedFirstPunchInTime = $firstPunchInTime ? $firstPunchInTime->format('H:i') : 'N/A';
            $formattedLastPunchOutTime = $lastPunchOutTimeOfDay ? $lastPunchOutTimeOfDay->format('H:i') : 'N/A';

            $dailySummaries[] = [
                'date' => $date,
                'firstPunchInTime' => $formattedFirstPunchInTime,
                'lastPunchOutTime' => $formattedLastPunchOutTime,
                'totalWorkTime' => $formattedTotalWorkTime,
                'totalBreakTime' => $formattedTotalBreakTime,
                'overtime' => $formattedOvertime
            ];
        }
        usort($dailySummaries, function($a, $b) {
            return Carbon::parse($b['date'])->timestamp - Carbon::parse($a['date'])->timestamp;
        });
        // dd($dailySummaries);
        return view('form.attendanceemployee',compact('currentStatus','firstIn','todaysActivity','todayTotalWorkTime','todayTotalBreakTime','todayOvertime','dailySummaries'));
    }

    public function PunchIn()
    {
        Attendance::create([
            'employee_id' => auth()->user()->user_id,
            'status' => 'in'
        ]);

        Toastr::success('Punch in successfully :)','Success');
        return redirect()->route('attendance/employee/page');
    }

    public function PunchOut()
    {
        Attendance::create([
            'employee_id' => auth()->user()->user_id,
            'status' => 'out'
        ]);

        Toastr::success('Punch out successfully :)','Success');
        return redirect()->route('attendance/employee/page');
    }
}
