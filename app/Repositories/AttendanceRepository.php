<?php

namespace App\Repositories;

use App\Attendance;
use Maatwebsite\Excel\Facades\Excel;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SurveyRepository
 *
 * @author hansana
 */
class AttendanceRepository
{
    public function save($request)
    {
        // return LeaveConfig::create($request->all());
        $path = $request->file('file')->getRealPath();
        Excel::import(new UsersImport, request()->file('your_file'));
        $data = Excel::load($path)->get();

        if ($data->count() > 0) {
            foreach ($data->toArray() as $key => $value) {
                foreach ($value as $row) {
                    $insert_data[] = array(
                        'employee_no'  => $row['AC-No.'],
                        'name'   => $row['Name'],
                        'date'   => $row['Date'],
                        'time_table'    => $row['Timetable'],
                        'on_duty'  => $row['On duty'],
                        'off_duty'   => $row['Off duty'],
                        'clock_in'   => $row['Clock In'],
                        'clock_out'   => $row['Clock Out'],
                        'late'   => $row['Late'],
                        'early'   => $row['Early'],
                        'absent'   => $row['Absent'],
                        'ot_time'   => $row['OT Time'],
                        'work_time'   => $row['Work Time'],
                    );
                }
            }

            if (!empty($insert_data)) {
                dump($insert_data);
                Attendance::create($insert_data);
            }
        }
    }

    public function update($leaveConfig, $request)
    {
        // return LeaveConfig::create($request->all());
        // return $leaveConfig->update($request->all());
    }
    public function all()
    {
        // return LeaveConfig::all();
    }
    public function delete($leaveConfig)
    {
        // return $leaveConfig->delete();
    }
    public function getByAttribute($attribute, $value)
    {
        // return LeaveConfig::where($attribute, $value)->get();
    }
}
