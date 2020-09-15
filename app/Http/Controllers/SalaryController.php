<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;
use App\Helpers\LogActivity;
use App\SalaryParameter;

class SalaryController extends Controller
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
            'user_id' => 'required|integer',
            'basic_salary' => 'required|numeric',
            'ot_category' => 'required|max:70|string',
            'fixed_allowance' => 'nullable|numeric',
            'extra_allowance' => ['nullable', 'max:1'],
            'attendance_type' => ['nullable', 'max:1'],
            'salary_category' => 'required|max:70|string',

        ]);
        return  \DB::transaction(function () use ($request) {
            $salary = new Salary();
            $salary->user_id = $request->user_id;
            $salary->basic_salary = $request->basic_salary;
            $salary->ot_category = $request->ot_category;
            $salary->fixed_allowance = $request->fixed_allowance;
            $salary->extra_allowance = $request->extra_allowance;
            $salary->attendance_type = $request->attendance_type;
            $salary->salary_categoty = $request->salary_categoty;
            $msg =  $salary->save();
            $emparams = $request->empyloyee_params;
            if (isset($emparams) && is_array($emparams)) {
                // dd($userParams);
                foreach ($emparams as $key => $value) {
                    $slry = new Salary();
                    $slry->salary_id = $slry->id;
                    $slry->name = $key;
                    $slry->value = $value;
                    $msg = $msg && $slry->save();
                }
            }
            LogActivity::addToLog('Create Salary Profile', $salary);
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
            'basic_salary' => 'sometimes|required|numeric',
            'ot_category' => 'sometimes|required|max:70|string',
            'fixed_allowance' => 'nullable|numeric',
            'extra_allowance' => ['nullable', 'regex:(Active|0|1)'],
            'attendance_type' => ['nullable', 'regex:(Active|0|1)'],
            'salary_categoty' => 'sometimes|required|max:70|string',

        ]);
        return  \DB::transaction(function () use ($request, $id) {
            $salary =  Salary::findOrFail($id);
            $req = request()->all();
            unset($req['empyloyee_params']);

            $msg = Salary::where('id', $id)->update($req);
            $slparams = $request->salary_params;
            if (isset($emparams) && is_array($emparams)) {
                // dd($userParams);
                SalaryParameter::where('employee_id', $id)->delete();
                foreach ($emparams as $key => $value) {
                    $slparams = new SalaryParameter();
                    $slparams->salary_id = $id;
                    $slparams->name = $key;
                    $slparams->value = $value;
                    $msg = $msg && $slparams->save();
                }
            }
            LogActivity::addToLog('Update Salary Profile', $slparams);
            if ($msg) {
                return response(array("id" => 1, "message" => "ok"));
            } else {
                return response(array("id" => 0, "message" => "fail"));
            }
        });
    }

    public function show()
    {
        return Salary::with('employeeParameters')->with('user')->orderBy('user_id')->get();
    }
    public function find($id)
    {
        return Salary::with('employeeParameters')->with('user')->find($id);
    }
    public function findByAttribute($attribute, $value)
    {
        return Salary::with('employeeParameters')->with('user')->where($attribute, $value)->orderBy('user_id')->get();
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
    public function edit(Salary $salary)
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
    public function update(Request $request, Salary $employee)
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
        $salary = Salary::findOrFail($id);
        $msg =  $salary->delete();
        LogActivity::addToLog('Employee Deleted', $salary);
        if ($msg) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }
}
