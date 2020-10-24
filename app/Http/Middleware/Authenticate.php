<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

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
        // Session::flush();
        return route('admin.login.show');
      }
    }

    // $guard = @$this->guards[0];
    // if (!$request->expectsJson()) {
    //   if ($guard === 'browser') {
    //     return route('browser.login.show');
    //   }

    //   // if($guard === 'lfc'){
    //   //   return route('lfc.login.show');
    //   // }

    //   return route('admin.login.show');
    // }
}
