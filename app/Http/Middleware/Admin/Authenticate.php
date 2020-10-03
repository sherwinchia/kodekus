<?php

namespace App\Http\Middleware\Admin;

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
      if (! $request->expectsJson()) {
        Session::flush();
        return route('admin.login.show');
      }
    }
}
