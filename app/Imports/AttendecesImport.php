<?php

namespace App\Imports;

use App\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendecesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $date = '2020-01-01';
        if ($row[10] == null) {
            $absent = 0;
        } else {
            $absent = 1;
        }
        return new Attendance(
            [
                'employee_no'  => $row[0],
                'name'   => $row[1],
                'date'   => $date,
                'time_table'    => $row[3],
                'on_duty'  => $row[4],
                'off_duty'   => $row[5],
                'clock_in'   => $row[6],
                'clock_out'   => $row[7],
                'late'   => $row[8],
                'early'   => $row[9],
                'absent'   =>  $absent,
                'ot_time'   => $row[11],
                'work_time'   => $row[12],
            ]
        );
    }
}
