<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\LogsErrors;

class AuthController extends Controller
{
    use LogsErrors;

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('backend.dashboard');
        }
        return view('pages.backend.auth.login');

    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                $user = Auth::user();
                
                $roles = $user->roles->pluck('slug')->toArray(); // Get all roles user has
    
                if (in_array('admin', $roles) || in_array('vendor', $roles)) {
                    return redirect()->route('backend.dashboard');
                }
    
                Auth::logout();
                return back()->with('error', 'Unauthorized access.');
            }
    
            return back()->with('error', 'Invalid email or password');
    
        } catch (\Exception $e) {
            $this->logError('Auth', 'AdminVendorLogin', $e, $request->all());
            return back()->with('error', 'Login failed. Please try again later.');
        }
    }
    
    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully!');
    }
}
