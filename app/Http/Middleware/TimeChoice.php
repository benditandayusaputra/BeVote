<?php

namespace App\Http\Middleware;

use Closure;
use App\Config;

class TimeChoice
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
        date_default_timezone_set('Asia/Jakarta');
        $config = Config::first();
        $now    = time();
        $open   = strtotime($config->open);
        $close  = strtotime($config->close);
        if ( $config ) {
            if ( $now < $close ) {
                if ( $now > $open ) {
                    return $next($request);
                } else {
                    return redirect()->route('landing');
                }
            } else {
                return redirect()->route('landing');
            }
        } else {
            return redirect()->route('landing');
        }
    }
}
