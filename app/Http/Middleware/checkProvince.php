<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class checkProvince
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $aUser = Auth::user();
        if ($aUser->office() == User::PROVINCIAL) {
            return $next($request);
        } else {
            return abort(403);
        }
    }
}
