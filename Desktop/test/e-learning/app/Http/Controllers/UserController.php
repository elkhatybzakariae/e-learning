<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role_User;
use App\Models\Role;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user with this email already exists in your database
        $user = User::where('Email', $googleUser->email)->first();
        $fruits = explode(",", $googleUser.name);
        dd($googleUser);
        if ($user) {
            // If the user exists, log them in
            Auth::login($user);
        } else {
            $newUser = User::create([
                'FirstName' => $googleUser->given_name,
                'LastName' => $googleUser->family_name,
                'Email' => $googleUser->email,
                'Password' => bcrypt(Str::random(16)),
            ]);

            Auth::login($newUser);
        }

        // Redirect the user to their dashboard or some other page
        return redirect()->route('dashboard');
    }

    public function registerpage()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function profile($id)
    {
        $profile = User::find($id);
        return view('auth.profile', compact('profile'));
    }
    public function update(Request $req, $id)
    {
        $validation = $req->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Phone' => 'required|string|max:50',
        ]);
        $profile = User::find($id);
        if ($profile) {
            $profile->update($req->all());

            return redirect()->route('profile', $profile->id_U)->with('success', 'Record updated successfully.');
        } else {
            return redirect()->route('profile', $profile->id_U)->with('error', 'profile not found.');
        }
    }
    public function register(Request $request)
    {
        $validation = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|max:50',
            'type' => 'required',
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
            $uu = Role_User::create([
                'id_U' => $u->id_U,
                'id_R' => $validation['type'],
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
