<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AdminAuthorization
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
        if (!$this->isAdmin($request)) {
            // abort(Response::HTTP_UNAUTHORIZED);
            
            return redirect()->route('home');
        }

        return $next($request);
    }

    protected function isAdmin($request)
    {
        return $request->user()->role_id == 1;
    }

}
