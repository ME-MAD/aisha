<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {

            // return route('selectionloginPage');

            if (Request::is(app()->getLocale() . '/student/admin')) {
                return route('selectionloginPage');
            }
            elseif(Request::is(app()->getLocale() . '/teacher/admin')) {
                return route('selectionloginPage');
            } 
            else {
                return route('selectionloginPage');
            }
        }
    }
}