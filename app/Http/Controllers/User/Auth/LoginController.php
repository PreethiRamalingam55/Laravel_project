<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.user.login');
    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            'account_number' => 'required|min:6',
            'password' => 'required|min:6',
        ]);
    }

    public function username()
    {
        return 'account_number';
    }
    
    protected function guard()
    {
        return Auth::guard('user');
    }

    public function logout()
    {
        
        $route = route('user.login');
        Session::flash('message', 'You Logout Successfully');
        session()->regenerate();
        return redirect()->to($route);
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
        $request->session()->regenerate();
        return redirect()->intended($this->redirectPath());
    }
}
