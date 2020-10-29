<?php

namespace App\Http\Middleware\Browser;

use Closure;

class Activated
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
        $strArr = explode('.', $request->route()->getName());

        if ($strArr[1] == 'api') return forbidden_request(['message' => 'Please activate your account first.']);

        Session::flash('error', 'Please activate your account first in profile.');
        return redirect()->back();
      }

      return $next($request);
    }
}
