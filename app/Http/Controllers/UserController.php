<?php

namespace App\Http\Controllers;

use App\Roll;
use App\User;
use App\Level;
use App\UserParameter;
use App\Plant;
use App\Privilege;
use App\Rules\contactNo;
use App\TransferStation;
use App\Rules\nationalID;
use Illuminate\Support\Str;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Facade\Ignition\QueryRecorder\Query;

class UserController extends Controller
{
    public function index()
    {
    }

    public function __construct()
    {
        $this->middleware(['auth:api']);
    }
    public function test()
    {
        return "h1";
    }

    public function create(Request $request)
    {
        request()->validate([
            'user_name' => 'required|max:20|string|unique:users',
            'initials' => 'required|max:255|string',
            'first_name' => 'nullable|max:255|string',
            'last_name' => 'nullable|max:255|string',
            'surname' => 'nullable|max:255|string',
            'nic' => ['nullable', 'unique:users', new nationalID],
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', 'regex:(Male|Female)'],
            'title' => 'nullable||max:255|string',
            'religion' => 'nullable||max:50|string',
            'nationality' => 'nullable||max:50|string',
            'race' => 'nullable||max:50|string',
            'email' => 'nullable||max:255|email',
            'mobile' => ['nullable', new contactNo],
            'land_line' => ['nullable', new contactNo],
            'status' => ['required', 'regex:(Active|Inactive|Archived)'],
            'civil_status' => 'required||max:50|string',
            'password' => 'required|min:8',
            'no' => 'nullable|string',
            'street' => 'nullable|string',
            'postal' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'is_admin' => 'required|integer',
        ]);
        return  \DB::transaction(function () use ($request) {
            $user = new User();
            $user->user_name = $request->user_name;
            $user->initials = $request->initials;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->surname = $request->surname;
            $user->nic = $request->nic;
            $user->date_of_birth = $request->date_of_birth;
            $user->gender = $request->gender;
            $user->title = $request->title;
            $user->religion = $request->religion;
            $user->nationality = $request->nationality;
            $user->race = $request->race;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->land_line = $request->land_line;
            $user->status = $request->status;
            $user->civil_status = $request->civil_status;
            $user->password = Hash::make($request->password);
            $user->no = $request->no;
            $user->street = $request->street;
            $user->postal = $request->postal;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->is_admin = $request->is_admin;
            $user->api_token = Str::random(80);
            $msg =  $user->save();
            $userParams = $request->userParams;
            if (isset($userParams) && is_array($userParams)) {
                // dd($userParams);
                foreach ($userParams as $key => $value) {
                    $userParameter = new UserParameter();
                    $userParameter->user_id = $user->id;
                    $userParameter->name = $key;
                    $userParameter->value = $value;
                    $msg = $msg && $userParameter->save();
                }
            }
            LogActivity::addToLog('User Create', $user);
            if ($msg) {
                return response(array("id" => 1, "message" => "ok", "user_id" => $user->id));
            } else {
                return response(array("id" => 0, "message" => "fail"));
            }
        });
    }
    public function show()
    {
        return User::with('userParameters')->with('employee.employeeParameters')->orderBy('initials')->get();
    }
    public function find($id)
    {
        return User::with('userParameters')->with('employee.employeeParameters')->find($id);
    }
    public function findByAttribute($attribute, $value)
    {
        return User::with('userParameters')->with('employee.employeeParameters')->where($attribute, $value)->orderBy('initials')->get();
    }
    public function edit(Request $request, $id)
    {
    }
    public function myProfile()
    {
        $aUser = Auth::user();
        $pageAuth = $aUser->authentication(config('auth.privileges.userCreate'));
        return view('my_profile', ['user' => $aUser, 'pageAuth' => $pageAuth]);
    }

    public function PrevilagesAdd($user)
    {
    }



    public function store(Request $request, $id)
    {
        request()->validate([
            'user_name' => 'sometimes|required|max:20|string|unique:users,user_name,' . $id,
            'initials' => 'sometimes|required|max:255|string',
            'first_name' => 'nullable|max:255|string',
            'last_name' => 'nullable|max:255|string',
            'surname' => 'nullable|max:255|string',
            'nic' => ['nullable', 'unique:users,nic,' . $id, new nationalID],
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', 'regex:(Male|Female)'],
            'title' => 'nullable||max:255|string',
            'religion' => 'nullable||max:50|string',
            'nationality' => 'nullable||max:50|string',
            'race' => 'nullable||max:50|string',
            'email' => 'nullable||max:255|email',
            'mobile' => ['nullable', new contactNo],
            'land_line' => ['nullable', new contactNo],
            'status' => ['sometimes', 'required', 'regex:(Active|Inactive|Archived)'],
            'civil_status' => 'sometimes|required||max:50|string',
            'password' => 'sometimes|required|min:8',
            'no' => 'nullable|string',
            'street' => 'nullable|string',
            'postal' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'is_admin' => 'required|integer',
        ]);
        return  \DB::transaction(function () use ($request, $id) {
            $user =  User::findOrFail($id);
            $req = request()->all();
            unset($req['userParams']);
            if (array_key_exists('password', $req)) {
                $req['password'] = Hash::make($request->password);
            }
            // dd($req);
            $msg = User::where('id', $id)->update($req);
            $userParams = $request->userParams;
            if (isset($userParams) && is_array($userParams)) {
                // dd($userParams);
                UserParameter::where('user_id', $id)->delete();
                foreach ($userParams as $key => $value) {
                    $userParameter = new UserParameter();
                    $userParameter->user_id = $id;
                    $userParameter->name = $key;
                    $userParameter->value = $value;
                    $msg = $msg && $userParameter->save();
                }
            }
            LogActivity::addToLog('User Update', $user);
            if ($msg) {
                return response(array("id" => 1, "message" => "ok"));
            } else {
                return response(array("id" => 0, "message" => "fail"));
            }
        });
    }

    public function storePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        request()->validate([
            'password' => 'required|confirmed|min:6',
        ]);
        $user->password = Hash::make(request('password'));
        $msg = $user->save();
        LogActivity::addToLog('Change User Password', $user);
        if ($msg) {
            return redirect()
                ->back()
                ->with('success', 'Ok');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error');
        }
    }
    public function changeMyPass()
    {
        // $aUser = Auth::user();
        // request()->validate([
        //     'password' => 'required|confirmed|min:6',
        // ]);
        // $aUser->password = Hash::make(request('password'));
        // $msg = $aUser->save();
        // LogActivity::addToLog('Change User Password', $aUser);
        // if ($msg) {
        //     return redirect()
        //         ->back()
        //         ->with('success', 'Ok');
        // } else {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with('error', 'Error');
        // }
    }

    public function activeStatus(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // switch ($request['status']) {
        //     case 'ACTIVE':
        //         $user->activeStatus = User::ACTIVE;
        //         return array('id' => 1, 'msg' => 'success');
        //         break;
        //     case 'INACTIVE':
        //         $user->activeStatus = User::INACTIVE;
        //         return array('id' => 1, 'msg' => 'success');
        //         break;
        //     case 'ARCHIVED':
        //         $user->activeStatus = User::ARCHIVED;
        //         return array('id' => 1, 'msg' => 'success');
        //         break;
        //     default:
        //         return array('id' => 2, 'msg' => 'invalid Input');
        // }
        // $user->save();
    }



    public function delete($id)
    {
        $user = User::findOrFail($id);
        $msg =  $user->delete();
        LogActivity::addToLog('Delete User', $user);
        if ($msg) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }
    public function authUser()
    {
        return User::with('employee.employeeParameters')->findOrFail(Auth::user()->id);
    }

    public function logout()
    {
        // Auth::logout();
        // LogActivity::addToLog('logout', array());
        // return view('auth.login');
    }



    public function login(Request $request)
    {
        // LogActivity::addToLog('login', array());
        // $login = $request->validate([
        //     'name' => 'required|string',
        //     'password' => 'required|string'
        // ]);
        // if (!Auth::attempt([$login])) {
        //     return response(['message' => 'invalid login']);
        // }
        // $aUser = Auth::user();
        // $accrssToken = $aUser->createToken('api-token')->accessToken;
        // return response(['user' => $aUser, 'accessToken' => $accrssToken]);
    }
}
