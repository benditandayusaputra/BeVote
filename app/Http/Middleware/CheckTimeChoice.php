<?php

namespace App\Http\Middleware;

use App\Config;
use Closure;

class CheckTimeChoice
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
        if ($config) {
            $now    = time();
            $close  = strtotime($config->close);
            $open   = strtotime($config->open);
            if ($now > $close || $now < $open) {
                return $next($request);
            } else {
                return redirect()->route('login.index');
            }
        } else {
            return $next($request);
        }
    }
}
