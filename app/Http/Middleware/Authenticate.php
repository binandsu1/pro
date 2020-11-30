<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    public function handle($request, $next, $guard = null)
    {

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                $path = 'admin/login';
//                switch ($guard) {
//                    case 'admin':
//                        $path = 'admin/login';
//                        break;
//                    case 'web/user':
//                        $path = loginUrl('user');
//                        break;
//                    case 'web/teacher':
//                        $path =loginUrl('teacher');
//                        break;
//                    default:
//                        $path = 'login';
//                        break;
//                }
                return redirect()->guest($path);
            }
        }


        return $next($request);
    }

    #old
//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
//    }
}
