<?php

namespace SON\Http\Middleware;

use Closure;

class TenantMiddleware
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
        $user = \JWTAuth::parseToken()->toUser();
        \TenantManager::addTenant($user);
        return $next($request);
    }
}
