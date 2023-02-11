<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    
    protected function redirectTo($request)
    {
        // dump(Auth::guard('admin')->check());
        // dump(Auth::guard('teacher')->check());
        // dump(Auth::guard('student')->check());
        if (
            !Auth::guard('admin')->check() ||
            !Auth::guard('teacher')->check() ||
            !Auth::guard('student')->check() 
        ) {
            return route('loginPage');
        }
    }
}