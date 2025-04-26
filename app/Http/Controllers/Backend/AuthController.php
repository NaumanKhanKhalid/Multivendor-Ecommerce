<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){

        return view('pages.backend.auth.login');

    }

    public function login(Request $request){
dd(23213);
    }
}
