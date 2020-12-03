<?php

namespace App\Http\Middleware\Browser;

use Closure;

class NonActivated
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
      if (!current_user()->is_activated) {
        return $next($request);
      } 
      abort(403);
    }
}
