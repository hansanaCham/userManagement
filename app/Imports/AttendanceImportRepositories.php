<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Attendance;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImportRepositories implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {

            Validator::make($rows->toArray(), [
                '*.ac_no' => 'required|integer',
                '*.name' => 'required|string',
                '*.date' => 'required|date',
                '*.timetable' => 'required|string',
                '*.on_duty' => 'required|date_format:H:i',
                '*.off_duty' => 'required|date_format:H:i',
                '*.clock_in' => 'nullable|date_format:H:i',
                '*.clock_out' => 'nullable|date_format:H:i',
                '*.late' => 'nullable|date_format:H:i',
                '*.early' => 'nullable|date_format:H:i',
                '*.absent' => 'nullable',
                '*.ot_time' => 'nullable|date_format:H:i',
                '*.work_time' => 'nullable|date_format:H:i',
            ])->validate();

            $dt = Carbon::parse($row['date']);
            if ($row['absent'] == null) {
                $absent = 0;
            } else {
                $absent = 1;
            }
            Attendance::insertOrIgnore([
                'employee_no'  => $row['ac_no'],
                'name'   => $row['name'],
                'date'   => $dt->toDateString(),
                'time_table'    => $row['timetable'],
                'on_duty'  => $row['on_duty'],
                'off_duty'   => $row['off_duty'],
                'clock_in'   => $row['clock_in'],
                'clock_out'   => $row['clock_out'],
                'late'   => $row['late'],
                'early'   => $row['early'],
                'absent'   =>  $absent,
                'ot_time'   => $row['ot_time'],
                'work_time'   => $row['work_time'],
            ]);
        }
    }
}
