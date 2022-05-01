<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CheckBanned
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
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            $banned_hours = now()->diffInHours(auth()->user()->banned_until);
            $banned_minutes = now()->diffInMinutes(auth()->user()->banned_until);
            $banned_seconds = now()->diffInSeconds(auth()->user()->banned_until);

            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Your account has been suspended. Please contact administrator.';
            } else {
                if ($banned_hours < 24 && $banned_hours > 1) {
                    $message = 'Your account has been suspended for ' . $banned_hours . ' ' . Str::plural('hour', $banned_hours) . '. Please contact administrator.';
                }else{
                    if ($banned_minutes < 60 && $banned_minutes > 1){
                        $message = 'Your account has been suspended for ' . $banned_minutes . ' ' . Str::plural('minute', $banned_minutes) . '. Please contact administrator.';
                    }
                    else{
                        if ($banned_seconds < 120 ){
                            $message = 'Your account has been suspended for '.$banned_seconds.' '.Str::plural('second', $banned_seconds).'. Please contact administrator.';
                        }
                        else{
                            $message = 'Your account has been suspended for '.$banned_days.' '.Str::plural('day', $banned_days).'. Please contact administrator.';
                        }
                    }
                }
            }
            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
