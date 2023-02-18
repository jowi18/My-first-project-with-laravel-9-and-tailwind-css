<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Http\Controllers\auth;
class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function register(){
        return view('users.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

        return back()->with('message', 'Account has been created Successfully');
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required'

        ]);
        
        if(auth()->attempt($validated)){
            $request->session()->regenerate();
           return redirect('/')->with('message', 'welcome back');
        }
            
        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successful');
    }
}
