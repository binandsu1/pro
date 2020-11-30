<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ShowSql
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $logs = Cache::pull('logs');
        if (!empty($logs)){
//            dump($logs);
//            echo 1;

        }
        Cache::forget('logs');
        return $next($request);
    }
}
