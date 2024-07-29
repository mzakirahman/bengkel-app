<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserSessionMobile
{

    public function handle($request, Closure $next, ...$levels)
    {
        if(!empty(session('hak_akses_id'))){
            if(in_array(session('hak_akses_id'),$levels)){
                return $next($request);
            }
        }
        return redirect('/mobile/logout');
    }

}