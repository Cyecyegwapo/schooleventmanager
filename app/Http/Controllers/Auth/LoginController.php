<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    // ...

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user(); // Get the authenticated user

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            }

            return redirect()->intended(RouteServiceProvider::HOME); // Redirect to user dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/'); // Or wherever you want to redirect after logout
}


    public function showLoginForm()
{
    return view('auth.login'); // Assuming your login form is in resources/views/auth/login.blade.php
}
}
