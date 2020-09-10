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
        // $table->double('basic_salary', 11, 2)->unsigned();
        // $table->string('ot_category', 70);
        // $table->double('fixed_allowance', 11, 2)->nullable();
        // $table->boolean('extra_allowance')->default(0)->comment('0 => false , 1=> true');
        // $table->boolean('attendance_type')->default(0)->comment('0 => fixed , 1=> true');
        // $table->string('salary_categoty', 70);

        request()->validate([
            'user_id' => 'required|integrer',
            'basic_salary' => 'required|numeric',
            'ot_category' => 'required|max:70|string',
            'fixed_allowance' => 'nullable|numeric',
            'extra_allowance' => ['nullable', 'regex:(Active|0|1)'],
            'attendance_type' => ['nullable', 'regex:(Active|0|1)'],
            'salary_categoty' => 'required|max:70|string',

        ]);
        return  \DB::transaction(function () use ($request) {
            $empyloyee = new Employee();
            $empyloyee->user_id = $request->user_name;
            $empyloyee->basic_salary = $request->initials;
            $empyloyee->ot_category = $request->first_name;
            $empyloyee->fixed_allowance = $request->last_name;
            $empyloyee->extra_allowance = $request->surname;
            $empyloyee->attendance_type = $request->nic;
            $empyloyee->salary_categoty = $request->date_of_birth;
            $msg =  $empyloyee->save();
            $emparams = $request->empyloyee_params;
            if (isset($emparams) && is_array($emparams)) {
                // dd($userParams);
                foreach ($emparams as $key => $value) {
                    $emparam = new EmployeeParameter();
                    $emparam->user_id = $empyloyee->id;
                    $emparam->name = $key;
                    $emparam->value = $value;
                    $msg = $msg && $emparam->save();
                }
            }
            LogActivity::addToLog('Create Empyloyee Profile', $empyloyee);
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
            'user_id' => 'sometimes|required|integrer',
            'basic_salary' => 'sometimes|required|numeric',
            'ot_category' => 'sometimes|required|max:70|string',
            'fixed_allowance' => 'nullable|numeric',
            'extra_allowance' => ['nullable', 'regex:(Active|0|1)'],
            'attendance_type' => ['nullable', 'regex:(Active|0|1)'],
            'salary_categoty' => 'sometimes|required|max:70|string',

        ]);
        return  \DB::transaction(function () use ($request, $id) {
            $empyloyee =  Employee::findOrFail($id);
            $req = request()->all();
            unset($req['empyloyee_params']);

            $msg = Employee::where('id', $id)->update($req);
            $emparams = $request->empyloyee_params;
            if (isset($emparams) && is_array($emparams)) {
                // dd($userParams);
                EmployeeParameter::where('user_id', $id)->delete();
                foreach ($emparams as $key => $value) {
                    $emparam = new EmployeeParameter();
                    $emparam->user_id = $id;
                    $emparam->name = $key;
                    $emparam->value = $value;
                    $msg = $msg && $emparam->save();
                }
            }
            LogActivity::addToLog('Update Empyloyee Profile', $empyloyee);
            if ($msg) {
                return response(array("id" => 1, "message" => "ok"));
            } else {
                return response(array("id" => 0, "message" => "fail"));
            }
        });
    }

    public function show()
    {
        return Employee::with('employeeParameters')->with('user')->orderBy('initials')->get();
    }
    public function find($id)
    {
        return Employee::with('employeeParameters')->with('user')->find($id);
    }
    public function findByAttribute($attribute, $value)
    {
        return Employee::with('employeeParameters')->with('user')->where($attribute, $value)->orderBy('initials')->get();
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
        $employee = EmployeeParameter::findOrFail($id);
        $msg =  $employee->delete();
        LogActivity::addToLog('Employee Deleted', $employee);
        if ($msg) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }
}
