<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('login');
    }

    function showRegister()
    {
        return view('regis');
    }

    function login(Request $request): RedirectResponse
    {
        $credential =  $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Email Or Password Is Wrong!');
    }

    function register(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|confirmed|min:8|max:255',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);

        return response()->redirectTo('/login')->with('success', 'Registration Successfully Please Login!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
