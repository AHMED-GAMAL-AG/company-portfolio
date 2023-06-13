<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next) // This middleware will set the selected locale for each request if it exists in the session.
    {
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }
        return $next($request);
    }
}
