<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function registerpage()
    {
        return view('auth.register');
    }
    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function register(Request $request)
    {
        $validation = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|max:50',
            'Phone' => 'required|string|max:50',
            'Password' => 'required|string|min:8',
            'Confirm_password' => 'required|string|min:8',
        ]);
        if ($request->Password === $request->Confirm_password) {
            $u = User::create([
                'FirstName' => $validation['FirstName'],
                'LastName' => $validation['LastName'],
                'Email' => $validation['Email'],
                'Phone' => $validation['Phone'],
                'Password' => Hash::make($validation['Password']),
            ]);

            auth()->login($u);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('registerpage');
        }
    }

    public function loginpage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $v = $request->validate([
            'Email' => 'required|email|max:50',
            'Password' => 'required|string|min:8',
        ]);
        $u = User::where('Email', $request->Email)->first();

        if ($u) {
            if (Hash::check($request->Password, $u->Password)) {
                // Authentication was successful
                auth()->login($u);
                return redirect()->route('dashboard'); // Redirect to the intended page after login
            }
            return redirect()->route('loginpage');
        } else {
            // Password is incorrect; show an error message
            return back()->with('error', 'Invalid email or password.');
        }
    }
    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('loginpage'); 
    }
}
