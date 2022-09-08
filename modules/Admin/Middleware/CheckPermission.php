<?php

namespace Modules\Admin\Middleware;

use Auth;
use Closure;
use Config;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  mixed   $request Request.
     * @param  Closure $next    Closure.
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $name = $request->route()->getName();
        $nameRoles = Auth::user()->roles;
        $checklogin = '';
        $name = substr($name, 0, strpos($name, '.'));
        foreach ($nameRoles as $role) {
            if ($role->hasPermissionTo($name) == true) {
                $checklogin = true;
                break;
            }
        }
        if ($name && config('constant.authorization') && $checklogin == false) {
            return response()->json(['message' => $name], 403);
        }

        return $next($request);
    }
}
