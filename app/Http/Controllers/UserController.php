<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validation logic
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
    }

    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validation logic
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
