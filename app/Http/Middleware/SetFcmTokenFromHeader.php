<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetFcmTokenFromHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (auth()->check()) {
            $user = auth()->user();

            $user->fcm_token = $request->header('fcmtoken') ? $request->header('fcmtoken') : $user->fcm_token;
            $user->save();
        }

        return $response;
    }
}
