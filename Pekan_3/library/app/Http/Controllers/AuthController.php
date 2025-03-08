<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister(){
        return view('pages.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password' => 'required|confirmed'
        ]);

        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);

        $totalUser = User::count();
        $newUser->role = $totalUser == 0 ? "admin" : "user";
        $newUser->save();

        return redirect('/login')->with('success', 'User Registered');
    }

    public function showLogin(){
        return view('pages.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'Invalid email/password',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
