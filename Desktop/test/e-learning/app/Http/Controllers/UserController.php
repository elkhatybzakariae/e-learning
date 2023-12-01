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
use App\Models\Panier;
use App\Models\SousCategorie;
use App\Models\Sujet;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class UserController extends Controller
{


    public function index()
    {
        // $categorie=Categorie::all();
        // $souscategorie=SousCategorie::all();
        // $sujets=Sujet::all();
        // // $coursList = Cour::where('valider', 1)->get();
        // $coursList = Cour::with('sujet', 'sujet.souscategorie', 'sujet.souscategorie.categorie')
        //               ->where('valider', 1)
        //               ->get()
        //               ->groupBy('sujet.souscategorie.categorie_id_Cat');
        $Cour = new Cour();
        $coursList = $Cour->coursesByCategory();
        // dd($coursList['coursesGroupedByCategory']);
        // return view('index', compact('coursList','categorie','souscategorie','sujets'));
        
        // return view('index', [
        //     'coursList' => $coursList,
        //     // 'categorie' => $coursList['categorie'],
        //     'souscategorie' => $coursList['souscategorie'],
        //     'sujets' => $coursList['sujets']
        // ]);
        return view('index', [
            'coursList' => $coursList,
            // 'categorie' => $coursList['categorie'],
            'souscategorie' => $coursList['souscategorie'],
            'sujets' => $coursList['sujets']
        ]);
    }
    public function index2()
    {
        if (auth()->user()->roles->contains('role_name', 'superadmin')) {
            $coursN = Cour::count();
            $users = User::count();
            return view('auth.dashboard2', compact('coursN', 'users'));
        } elseif (auth()->user()->roles->contains('role_name', 'formateur')) {
            $coursN = Cour::where('id_U', Auth::id())->count();
            $cours = Cour::where('id_U', Auth::id())->get();
            $idsC = $cours->pluck('id_C')->all();
            $consommer = Panier::whereIn('id_C', $idsC)->count();
            return view('auth.dashboard2', compact('coursN', 'consommer'));
        } elseif (auth()->user()->roles->contains('role_name', 'moderateur')) {
            $coursN = Cour::count();
            $coursNo = Cour::where('valider', '0')->count();
            $coursV = Cour::where('valider', '1')->count();
            return view('auth.dashboard2', compact('coursNo', 'coursV', 'coursN'));
        } elseif (auth()->user()->roles->contains('role_name', 'client')) {
            // $coursN = Cour::count();
            // $coursNo = Cour::where('valider', '0')->count();
            // $coursV = Cour::where('valider', '1')->count();
            return view('auth.dashboard2');
        }
    }

    public function management()
    {
        return view('management.index');
    }
    public function teachdashboard()
    {
        // $cours = Cour::where('id_U',$id)->get();,compact('cours')
        return redirect()->route('home2');
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
            if ($user->roles->contains('role_name', 'client')) {
                Auth::login($user);
                return redirect()->route('index');
            } else {
                Auth::login($user);
                return redirect()->route('home2');
            }
            // dd($user->roles->contains('role_name', 'client'));
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

            // Auth::login($newUser);

            if ($newUser->roles->contains('role_name', 'client')) {
                Auth::login($newUser);
                return redirect()->route('index');
            } else {
                Auth::login($newUser);
            }
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

        if ($user) {
            if ($user->roles->contains('role_name', 'client')) {
                Auth::login($user);
                return redirect()->route('index');
            } else {
                Auth::login($user);
                return redirect()->route('home2');
            }
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

            // Auth::login($user);

            if ($newUser->roles->contains('role_name', 'client')) {
                Auth::login($newUser);
                return redirect()->route('index');
            } else {
                Auth::login($newUser);
            }
        }

        // Redirect the user to their dashboard or some other page
        return redirect()->route('dashboard');
    }

    public function teach()
    {
        $idRole = Helpers::generateIdRole();
        $id = Auth::id();
        $user = User::find($id);
        $role = Role::where('role_name', 'formateur')->first();
        $userrole = Role_User::where('id_R', $role->id_R)
            ->where('id_U', $id)
            ->exists();
        // dd($userrole);
        if ($userrole) {

            return redirect()->route('home2');
        } else {
            Role_User::create([
                'id' => $idRole,
                'id_U' => $user->id_U,
                'id_R' => $role->id_R,
            ]);

            return redirect()->route('home2');
        }
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
            // 'Phone' => 'required|string|max:50',
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
            'usertype' => 'required',
        ]);
        if ($request->Password === $request->Confirm_password) {
            $newuser = User::create([
                'id_U' => $id_U,
                'FirstName' => $validation['FirstName'],
                'LastName' => $validation['LastName'],
                'usertype' => $validation['usertype'],
                'Email' => $validation['Email'],
                'Password' => Hash::make($validation['Password']),
            ]);
            $type=Role::where('role_name',$validation['usertype'])->first();
            
            Role_User::create([
                'id' => $id,
                'id_U' => $newuser->id_U,
                'id_R' => $type->id_R,
            ]);
            auth()->login($newuser);
            // return redirect()->route('dashboard');
            return redirect()->route('index');
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
                // auth()->login($u);
                // return redirect()->route('dashboard'); // Redirect to the intended page after login
                if ($u->roles->contains('role_name', 'client')) {
                    Auth::login($u);
                    return redirect()->route('index');
                } else {
                    Auth::login($u);
                }
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
