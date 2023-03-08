<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\Permission\PermissionService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    private $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->middleware('guest')->except('logout');

        $this->permissionService = $permissionService;
    }


    public function loginPage()
    {

        return view('pages.auth.login');
    }

    public function index()
    {
        return view('pages.auth.selection');
    }


    public function login(LoginRequest $request)
    {
        $dataLoginPage = $request->only(['email', 'password']);
        if (Auth::guard($request->type)->attempt($dataLoginPage)) {
            $permissions = Auth::guard($request->type)->user()->allPermissions()->pluck('name');

            $this->permissionService->setPermissionsSession($permissions);

            Session::put('admin_guard', $request->type);
            Alert::success('تم الدخول بنجاح');

            return redirect(route('admin.home'));
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {

        $guard = Session::get('admin_guard');

        Auth::guard($guard)->logout();
        return redirect(route('loginPage'));
    }
}
