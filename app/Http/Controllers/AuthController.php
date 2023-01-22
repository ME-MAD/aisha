<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm($type){

        return view('pages.auth.login',
        [
            'type' => $type
        ]);
    }

    public function index()
    {
       return view('pages.auth.selection');
    }


    public function login(LoginRequest $request)
    {
        $dataLoginPage = $request->only(['email', 'password']);

        if (Auth::guard($request->type)->attempt($dataLoginPage)) 
        {
            Session::put('admin_guard', $request->type);
            Alert::success('تم الدخول بنجاح');
            return redirect(route('admin.home'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function logout()
    {
        $guard = Session::get('admin_guard');

        Auth::guard($guard)->logout();
        return redirect(route('selectionloginPage'));
    }
}