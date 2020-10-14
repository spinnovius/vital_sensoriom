<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckAuth {


    public function handle($request, Closure $next) {
        $data = $request->session()->all();
        if (@$data['admin_id']) {
            return $next($request);
        } else {
            $request->session()->flush();
            return redirect()->route('admin.index');
        }
    }

}
