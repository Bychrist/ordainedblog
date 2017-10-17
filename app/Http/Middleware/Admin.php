<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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

        if(!Auth::user()->admin)
        {
            return redirect('dashboard')->with(['fail'=>'You do not have permission to perform that task.']); 
        }

        return $next($request);
        
    }
}
