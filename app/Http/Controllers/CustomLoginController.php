<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($login)) {
            return response(['message' => 'invalid login']);
        }
        $aUser = Auth::user();
        $accrssToken = $aUser->createToken('api-token')->accessToken;

        return response(['user' => $aUser, 'accessToken' => $accrssToken]);
    }
}
