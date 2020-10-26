<?php

namespace App\Http\Controllers;

use App\Client;
use App\EPL;
use App\InspectionSession;
use App\SiteClearenceSession;
use Illuminate\Http\Request;

class FieUploadController extends Controller
{
    public const BASE_PATH = "attachements";

    public static function getLeavePath($user_id)
    {
        return  FieUploadController::BASE_PATH . "/" . $user_id . "/leaves";
    }
}
