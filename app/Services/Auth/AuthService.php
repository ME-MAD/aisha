<?php

namespace App\Services\Auth;

use App\Providers\RouteServiceProvider;

class AuthService
{
    public function checkGuard($request)
    {
        if($request->type == 'admin')
        {
            $guardName = 'admin';
        }
        elseif ($request->type == 'teacher') 
        {
            $guardName = 'teacher';
        }
        elseif ($request->type == 'student') 
        {
            $guardName = 'student';
        }
        else
        {
           $guardName = "web";
        }
        return $guardName;
    }

}
