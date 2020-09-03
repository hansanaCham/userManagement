<?php

namespace App\Http\Controllers;

use App\User;
use App\Plant;
use App\Driver;
use App\Vehicle;
use App\DumpSite;
use App\WasteType;
use Carbon\Carbon;
use App\LocalAuthority;
use App\MainCollection;
use App\CollectionRatio;
use App\TransferStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileController extends Controller
{

    public function index()
    {
        $aUser = Auth::user();
        $pageAuth = $aUser->authentication(config('auth.privileges.personalsRegister'));
        return view('worker', ['pageAuth' => $pageAuth]);
    }
    public function __construct()
    {
        $this->middleware(['auth:mob']);
    }
    public function test()
    {
        return User::all();
    }

    public function vehicles()
    {
        return Vehicle::where('broken', 0)->where('is_tempory', 0)->get();
    }
    public function drivers()
    {
        return Driver::get();
    }

    public function sessions()
    {
        return  array(
            MainCollection::SESSION_MORNING => 'Morning',
            MainCollection::SESSION_AFTERNOON => 'Afternoon',
            MainCollection::SESSION_EVENING => 'Evening',
            MainCollection::SESSION_NIGHT => 'Night'
        );
    }

    public function loacaAuthorities()
    {
        return LocalAuthority::with('wards')->whereNull('parent_id')->whereHas('wards')->get();
    }
    public function wasteTypes()
    {
        return WasteType::with('densities')->whereHas('densities')->get();
    }
    public function ratios()
    {
        return CollectionRatio::get();
    }
    public function transferStations()
    {
        return TransferStation::get();
    }


    public function plants()
    {
        return Plant::get();
    }

    public function dumpsites()
    {
        return DumpSite::get();
    }

    public function sync(Request $request)
    {
        return  \DB::transaction(function () {
            $rtm = true;
            $al = json_decode(\request('data'), true);
            foreach ($al as $value) {            // return array('id' => '1', 'msg' => $value['vehicle']['vID']);
                if ($value['destinationType'] == MainCollection::DUMPSITE || $value['destinationType'] == MainCollection::TRANSFERSTATION || $value['destinationType'] == MainCollection::PLANT) {
                    $user = Auth::user();
                    $pageAuth = $user->authentication(config('auth.privileges.mainWasteCollection'));
                    $mainCollection = new MainCollection();
                    $mainCollection->vehicle_id = $value['vehicle']['vID'];
                    $mainCollection->waste_type_id = $value['WasteType']['wasteId'];
                    $mainCollection->ward_id = $value['ward']['wardId'];
                    $mainCollection->is_accurate = $value['isActual'];
                    $vehicle = Vehicle::find($mainCollection->vehicle_id);
                    $mainCollection->vehicle_capacity = $vehicle->capacity;
                    $mainCollection->destination_type = $value['destinationType'];
                    if ($mainCollection->destination_type == MainCollection::TRANSFERSTATION) {
                        $mainCollection->destination_id = $value[MainCollection::TRANSFERSTATION]['transferID'];
                    } else if ($mainCollection->destination_type == MainCollection::DUMPSITE) {
                        $mainCollection->destination_id = $value[MainCollection::DUMPSITE]['innerID'];
                    } else {
                        $mainCollection->destination_id = $value[MainCollection::PLANT]['innerID'];
                    }
                    $mainCollection->date = Carbon::now()->toDateTimeString();;
                    $mainCollection->is_submitted = 1;
                    $mainCollection->is_updatable = 1;
                    $mainCollection->local_authority_id = $value['local_authority']['localAuthority_id'];
                    $mainCollection->driver_id = $value['driver']['driver_id'];
                    $mainCollection->session = $value['session']['sessionId'];
                    if ($mainCollection->is_accurate == 1) {
                        // accurate reading session
                        $mainCollection->amount = $value['reading'];
                    } else {
                        // inaccurate reading session                 
                        $mainCollection->density = $value['density']['amount'];
                        $mainCollection->ratio = $value['ratio']['amount'];
                        $mainCollection->amount =  $mainCollection->density * $mainCollection->vehicle_capacity * $mainCollection->ratio;
                    }
                    $msg =  $mainCollection->save();
                    $rtm =    $rtm  && $msg;
                } else {
                    return response(array("message" => "The given data was invalid.", "errors" =>
                    array("destination_type" =>
                    array("destination type must be one of " . MainCollection::DUMPSITE . "," . MainCollection::TRANSFERSTATION . "," . MainCollection::PLANT))), 422);
                }
            }
            if ($rtm) {
                return array('id' => 1, 'message' => 'true');
            } else {
                return array('id' => 1, 'message' => 'false');
            }
        });
    }
}
