<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class CheckUser
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
        if(session('user_id')) {
            $userId = session('user_id');
            $user = User::find($userId);
            if($user){
                if($user->admin_status) {
                    return $next($request);
                }
            }
        }
        //return new RedirectResponse('/auth?hasError=true');
        return response()->redirectTo('/auth?hasError=true');
    }
}
