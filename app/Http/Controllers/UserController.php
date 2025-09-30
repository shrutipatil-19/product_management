<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('frontend.Register');
    }

    public function storeUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'nullable'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'User Register Successfully');
    }
    public function login()
    {
        return view('admin.Login');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if (in_array($user->role, ['admin'])) {
                return redirect()->route('dashboard');
            }

            return redirect()->route('loginNormal')->withErrors(['email' => 'Unauthorized role.']);
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
    public function loginNormal()
    {
        return view('frontend.Login');
    }
    public function loginNormalUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if (in_array($user->role, ['', 'user'])) {
                return redirect()->route('home');
            }

            return redirect()->route('login')->withErrors(['email' => 'Unauthorized role.']);
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function createUser()
    {
        return view('admin.pages.user.add-user');
    }
}
