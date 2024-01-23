<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            // Invalid credentials, return to login
            return view('auth.login');
        }

        // Check user role
        if (!($user->role == 'admin' || $user->role == 'puskesmas')) {
            // Additional checks or actions for admin/puskesmas role if needed
            dd($user); // For debugging purposes, you may want to remove this in production
            return view('auth.login');
        }

        // Authenticate the user

        // Redirect to the dashboard route
        return redirect()->route('dashboard');
    }
}
