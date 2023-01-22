<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\AuthService;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
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
        // dump($dataLoginPage);
        // dd(Auth::guard($this->authService->checkGuard($request))
        // ->attempt($dataLoginPage));

        if (Auth::guard($this->authService->checkGuard($request))
                ->attempt($dataLoginPage)) 
        {
            
            Alert::success('تم الدخول بنجاح');
            return redirect(route('admin.home'));
            
        }
        else
        {
            dd('kdjfkdsjf');

            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}