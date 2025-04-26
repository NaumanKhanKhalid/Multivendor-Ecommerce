<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Role;
use App\Models\User;
use App\Traits\LogsErrors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function showRegisterForm()
    {
        return view('pages.frontend.auth.register');
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $data = $validator->validated();

            $user = User::create([
                'name' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $role = Role::where('slug', 'customer')->first();

            if ($role) {
                $user->roles()->attach($role->id);
            }

            return redirect()->route('frontend.home');

        } catch (\Exception $e) {
            $this->logError('Auth', 'User Registration', $e, $request->all());
            return back()->with('error', 'Registration failed. Please try again later.');
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('frontend.home');
            }

            return back()->with('error', 'Invalid email or password');

        } catch (\Exception $e) {
            $this->logError('Auth', 'Login', $e, $request->all());
            return back()->with('error', 'Login failed. Please try again later.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.login.form')->with('success', 'Logout Successfully');
    }
}
