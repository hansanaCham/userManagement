<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeParameter;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $table->bigInteger('user_id')->unsigned();
        // $table->string('designation', 255);
        // $table->string('department', 255)->nullable();
        // $table->date('join_date')->nullable();
        // $table->string('employee_type', 255)->nullable();
        // $table->string('tire', 255)->nullable();
        // $table->string('company_email', 255)->nullable();
        // $table->string('employee_status', 255)->nullable();
        // $table->string('supervisor', 255)->nullable();
        // $table->string('manager', 255)->nullable();
        // $table->string('leave_group', 255)->nullable();

        request()->validate([
            'user_id' => 'required|integer',
            'designation' => 'required|string|max:255',
            'department' => 'nullable|max:255|string',
            'join_date' => 'nullable|date',
            'employee_type' => 'nullable|max:255|string',
            'tire' => 'nullable|max:255|string',
            'company_email' => 'nullable|max:255|string',
            'employee_status' => 'nullable|max:255|string',
            'supervisor_id' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
            'leave_group' => 'nullable|max:255|string',
            'employee_no' => 'required|string',

        ]);
        return  \DB::transaction(function () use ($request) {
            $employee = new Employee();
            $employee->user_id = $request->user_id;
            $employee->designation = $request->designation;
            $employee->department = $request->department;
            $employee->join_date = $request->join_date;
            $employee->employee_type = $request->employee_type;
            $employee->tire = $request->tire;
            $employee->company_email = $request->company_email;
            $employee->employee_status = $request->employee_status;
            $employee->supervisor = $request->supervisor;
            $employee->manager = $request->manager;
            $employee->leave_group = $request->leave_group;
            $employee->employee_no = $request->employee_no;
            $msg =  $employee->save();
            $emparams = $request->employee_params;
            if (isset($emparams) && is_array($emparams)) {
                // dd($userParams);
                foreach ($emparams as $key => $value) {
                    $e = new EmployeeParameter();
                    $e->employee_id = $employee->id;
                    $e->name = $key;
                    $e->value = $value;
                    $msg = $msg && $e->save();
                }
            }
            LogActivity::addToLog('Create Employee Profile', $employee);
            if ($msg) {
                return response(array("id" => 1, "message" => "ok"));
            } else {
                return response(array("id" => 0, "message" => "fail"));
            }
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        request()->validate([
            'user_id' => 'sometimes|required|integer',
            'designation' => 'sometimes|required|string|max:255',
            'department' => 'nullable|max:255|string',
            'join_date' => 'nullable|date',
            'employee_type' => 'nullable|max:255|string',
            'tire' => 'nullable|max:255|string',
            'company_email' => 'nullable|max:255|string',
            'employee_status' => 'nullable|max:255|string',
            'supervisor_id' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
            'leave_group' => 'nullable|max:255|string',
            'employee_no' => 'nullable|string',

        ]);
        return  \DB::transaction(function () use ($request, $id) {
            $employee =  Employee::findOrFail($id);
            $req = request()->all();
            unset($req['employee_params']);

            $msg = Employee::where('id', $id)->update($req);
            $emparams = $request->employee_params;
            if (isset($emparams) && is_array($emparams)) {
                // dd($userParams);
                EmployeeParameter::where('employee_id', $id)->delete();
                foreach ($emparams as $key => $value) {
                    $emparam = new EmployeeParameter();
                    $emparam->employee_id = $id;
                    $emparam->name = $key;
                    $emparam->value = $value;
                    $msg = $msg && $emparam->save();
                }
            }
            LogActivity::addToLog('Update Employee Profile', $employee);
            if ($msg) {
                return response(array("id" => 1, "message" => "ok"));
            } else {
                return response(array("id" => 0, "message" => "fail"));
            }
        });
    }

    public function show()
    {
        return Employee::with('employeeParameters')->with('user')->orderBy('user_id')->get();
    }
    public function find($id)
    {
        return Employee::with('employeeParameters')->with('user')->find($id);
    }
    public function findByAttribute($attribute, $value)
    {
        return Employee::with('employeeParameters')->with('user')->where($attribute, $value)->orderBy('user_id')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $msg =  $employee->delete();
        LogActivity::addToLog('Employee Deleted', $employee);
        if ($msg) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }
}
