<?php

namespace App\Http\Middleware\Browser;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
      if ($request->expectsJson()){
        return response()->json(['error' => 'Unauthenticated'], 401);
      }
      
      if (!$request->expectsJson()) {
        return route('browser.auth.show', ['type' => 'login']);
      }
    }
}
