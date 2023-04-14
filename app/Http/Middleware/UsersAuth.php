<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class UsersAuth
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

        if(session()->has('unlocker_user')){

            $administrator_chk = User::where('id',session()->get('unlocker_user')[0])->first();
            if($administrator_chk){
                $response = $next($request);
                return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                ->header('Pragma','no-cache')
                ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
            }else{
                return redirect('/login');
            }
            
        }else{
            return redirect('/login');
        }
        
        
    }
}
