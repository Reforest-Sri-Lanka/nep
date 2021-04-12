<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Access;
use App\Models\Role_has_access;
use Illuminate\Support\Facades\Auth;

class access_control
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $access)
    {
        if (!Auth::check()) 
        return redirect('login'); //will redirect to login if not logged
        //return redirect('/home')->with('message', 'You do not have access permision');
        $role = Auth::user()->role_id;
        if($role != 1){
            $access1 = Role_has_access::where('role_id',$role)->where('access_id',$access)->first();;
            if($access1 == null)
            {
                return redirect('/home/main')->with('warning', 'You do not have access permision to '.$accesstitle->access); 
            }
        }
        return $next($request);
    }
}