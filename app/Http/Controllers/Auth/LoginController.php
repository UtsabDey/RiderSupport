<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated()
    {
        if (Auth::user()->role == '0') { // 0 = Admin & 1 = Agent & 2 = Q/A
            return redirect('/admin')->with('success', 'Welcome to Rider Support Site');
        } elseif (Auth::user()->role == '1') {
            return redirect('/agent')->with('success', 'Welcome to Rider Support Site');
        }elseif (Auth::user()->role == '2') {
            return redirect('/QA')->with('success', 'Welcome to Rider Support Site');
        } else {
            return redirect('/login')->with('warning', 'Please Login First!');
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
