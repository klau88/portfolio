<?php

namespace App\Http\Controllers;

use App\User;

class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login', 'postLogin');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        if (auth()->attempt([
            'email' => request()->email,
            'password' => request()->password
        ])) {
            $user = User::where('email', request()->email)->firstOrFail();
            return redirect()->route('admin');
        }

        return back();
    }

    public function admin()
    {
        return view('auth.admin');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
