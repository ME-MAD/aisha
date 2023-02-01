<?php


namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    private function handlePermissions(array $arr)
    {
        foreach($arr as $method => $permission)
        {
            $this->middleware(function($request, $next) use ($permission) {
                $user = Auth::guard(getGuard())->user();
                if($user->isAbleTo($permission))
                {
                    return $next($request);
                }
                abort(403);
            })->only($method);
        }
    }
}
