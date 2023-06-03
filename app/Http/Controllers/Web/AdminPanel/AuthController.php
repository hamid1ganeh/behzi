<?php

namespace App\Http\Controllers\Web\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ThrottlesLogins;


//    public $redirectTo = '/cp/dashboard';
    public $maxAttempts = 5;
    public $decayMinutes = 3;

    public function username(){
        return 'email';
    }

    public function loginPage()
    {
        if (Auth::guard('admin')->check())
        {
            return  redirect()->route('adminPanel.dashboard');
        }
        return view('admin-panel.login');
    }

    public function login(Request $request)
    {
        //attempt login.
        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authenticated
            return redirect()->route('adminPanel.dashboard')->with('status','You are Logged in as Admin!');
        }
        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);
        //Authentication failed
        return $this->loginFailed();
    }
    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminPanel.loginPage');
    }

}