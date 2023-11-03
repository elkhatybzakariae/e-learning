<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
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
    public function index()
    {

        return view('index');
    }
    public function index2()
    {

        return view('auth.dashboard2');
    }

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
        $id_U = Helpers::generateIdU();
        $id = Helpers::generateIdUR();
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('Email', $googleUser->email)->first();
        if ($user) {
            Auth::login($user);
        } else {
            $fullname = explode(" ", $googleUser['name']);
            $newUser = User::create([
                'id_U' => $id_U,
                'FirstName' => $fullname[0],
                'LastName' => $fullname[1],
                'Email' => $googleUser->email,
                'Password' => bcrypt(Str::random(16)),
            ]);
            // dd($newUser);
            Role_User::create([
                'id' => $id,
                'id_U' => $newUser->id_U,
                'id_R' => "3",
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('dashboard');
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {

        $id_U = Helpers::generateIdU();
        $id = Helpers::generateIdUR();
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('Email', $githubUser->email)->first();

        // dd($fruits);
        if ($user) {
            // If the user exists, log them in
            Auth::login($user);
        } else {
            $newUser = User::create([
                'id_U' => $id_U,
                'FirstName' => $githubUser->nickname,
                'LastName' => $githubUser->nickname,
                'Email' => $githubUser->email,
                'Password' => bcrypt(Str::random(16)),
            ]);
            $typeuser = Role_User::create([
                'id' => $id,
                'id_U' => $githubUser->id_U,
                'id_R' => "3",
            ]);

            Auth::login($user);
        }

        // Redirect the user to their dashboard or some other page
        return redirect()->route('dashboard');
    }

    public function teach()
    {
        $id = Auth::id();
        $user = User::find($id);
        $userrole = Role_User::where('id_R', 2)
            ->where('id_U', $id)
            ->exists();
        dd($userrole);
        if ($userrole) {
            return view('auth.dashboard');
        } else {
            $typeuser = Role_User::create([
                'id_U' => $user->id_U,
                'id_R' => "2",
            ]);
        }

        // dd($typeuser);
        return view('auth.dashboard');
    }
    public function dashboard()
    {
        return view('auth.dashboard');
    }
    public function profile()
    {
        $id = Auth::id();
        $profile = User::find($id);
        return view('auth.profile', compact('profile'));
    }
    public function update(Request $req)
    {
        $validation = $req->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Phone' => 'required|string|max:50',
        ]);
        $id = Auth::id();
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
        $id_U = Helpers::generateIdU();
        $id = Helpers::generateIdUR();
        $validation = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'Email' => 'required|email|max:50',
            'Password' => 'required|string|min:8',
            'Confirm_password' => 'required|string|min:8',
        ]);
        if ($request->Password === $request->Confirm_password) {
            $newuser = User::create([
                'id_U' => $id_U,
                'FirstName' => $validation['FirstName'],
                'LastName' => $validation['LastName'],
                'Email' => $validation['Email'],
                'Password' => Hash::make($validation['Password']),
            ]);
            Role_User::create([
                'id' => $id,
                'id_U' => $newuser->id_U,
                'id_R' => "3",
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


    public function gestiondescomptes()
    {
        $users = User::where('id_U', '!=', auth()->id())->get();
        return view('auth.superadmin.index', compact('users'));
    }
    public function edituser($id)
    {
        // $user = User::find($id);
        $user = Role_User::where('id_U', $id)->first();
        $roles = Role::all();
        return view('auth.superadmin.edit', compact('user', 'roles'));
    }
    public function updateuser(Request $req, $id)
    {
        $user = Role_User::where('id_U', $id);
        $user->update([
            'id_R' => $req->id_R,
        ]);
        return redirect()->route('gestiondescomptes');
    }
}
