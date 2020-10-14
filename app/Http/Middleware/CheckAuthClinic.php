<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuthClinic
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
        $data = $request->session()->all();
        if (@$data['role']==5) {
            return $next($request,true);
        }
        elseif(@$data['role']==2)
        {
            return $next($request,true);
        }
        elseif(@$data['role']==6)
        {
            return $next($request,true);
        }
        elseif(@$data['role']==8)
        {
            return $next($request,true);
        }
        else
        {
            $request->session()->flush();
            return redirect()->route('admin.index');
        }
    }
}
