<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class checkCompostPlant
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
        if ($aUser->office() == User::COMPOST_PLANT || User::BOI_PLANT) {
            return $next($request);
        } else {
            return abort(403);
        }
    }
}
