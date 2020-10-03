<?php

namespace App\Http\Middleware\Admin;

use Closure;

class AdminMiddleware
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
      if(auth()->user()->isAdmin()) {
        return $next($request);
      }
      if ($request->expectsJson()) {
        return unauthorized_request('Unauthorized request');
      }

      auth()->logout();
      return redirect()->route('admin.login.show');
      
    }
}
