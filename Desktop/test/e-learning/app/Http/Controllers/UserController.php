<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role_User;
use App\Models\Role;
use App\Models\Categorie;
use App\Models\Cour;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function management()
    {
        return view('management.index');
    }
    public function teachdashboard()
    {
        // $cours = Cour::where('id_U',$id)->get();,compact('cours')
        return view('management.index');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if the user with this email already exists in your database
        $user = User::where('Email', $googleUser->email)->first();

        // dd($fruits);
        if ($user) {
            // If the user exists, log them in
            Auth::login($user);
        } else {
            $fullname = explode(" ", $googleUser['name']);
            $newUser = User::create([
                'FirstName' => $fullname[0],
                'LastName' => $fullname[1],
                'Email' => $googleUser->email,
                'Password' => bcrypt(Str::random(16)),
            ]);
            $typeuser = Role_User::create([
                'id_U' => $newUser->id_U,
                'id_R' => "2",
            ]);

            Auth::login($newUser);
        }

        // Redirect the user to their dashboard or some other page
        return redirect()->route('dashboard');
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    
    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('Email', $githubUser->email)->first();

        // dd($fruits);
        if ($user) {
            // If the user exists, log them in
            Auth::login($user);
        } else {
            $newUser = User::create([
                'FirstName' => $githubUser->nickname,
                'LastName' => $githubUser->nickname,
                'Email' => $githubUser->email,
                'Password' => bcrypt(Str::random(16)),
            ]);
            $typeuser = Role_User::create([
                'id_U' => $githubUser->id_U,
                'id_R' => "2",
            ]);

            Auth::login($user);
        }

        // Redirect the user to their dashboard or some other page
        return redirect()->route('dashboard');
    }

    public function teach($id)
    {
        $user = User::find($id);
        $typeuser = Role_User::create([
            'id_U' => $user->id_U,
            'id_R' => "1",
        ]);
        return view('auth.dashboard');
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
    public function registerpage()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
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
            $newuser = User::create([
                'FirstName' => $validation['FirstName'],
                'LastName' => $validation['LastName'],
                'Email' => $validation['Email'],
                'Phone' => $validation['Phone'],
                'Password' => Hash::make($validation['Password']),
            ]);
            $typeuser = Role_User::create([
                'id_U' => $newuser->id_U,
                'id_R' => "2",
                // 'id_R' => $validation['type'],
            ]);
            auth()->login($newuser);
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
