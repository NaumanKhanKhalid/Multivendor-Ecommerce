<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsErrors;
class AuthController extends Controller
{
    use LogsErrors;
    public function showLoginForm()
    {
        if (Auth::check()) {
                return redirect()->route('frontend.home');
        }
    
        return view('pages.frontend.auth.login');
    }


    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                return redirect()->route('frontend.home');
            } else {
                return back()->with('error', 'Invalid email or password');
            }
        } catch (\Exception $e) {
            $this->logError('Auth', 'login', $e, $request->all());

            return back()->with('error', 'Login Failed. Please try again later.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.login.form')->with('success', 'Logout Successfully');
    }
}
