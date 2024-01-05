<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CertificateRequest;
use App\Mail\ValiderCert;
use App\Models\Categorie;
use App\Models\Certificate;
use App\Models\CertPasser;
use App\Models\Cour;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $userRole = auth()->user()->roles()->first();
        if ($userRole->role_name === "moderateur") {
            $name='App\Models\Categorie';
            $certificates = Certificate::where('certificatetable_type', $name)->get();
            return view('management.certificate.index', compact('certificates'));
        } elseif ($userRole->role_name === "formateur") {
            $cours = Cour::where('id_U', $id)->get();
            $idsC = $cours->pluck('id_C')->all();
            $certificates = Certificate::whereIn('certificatetable_id', $idsC)->get();
            return view('management.certificate.index', compact('certificates'));
        }
    }

    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        $categorie = Categorie::all();
        return view('management.certificate.create', compact('cours','categorie'));
    }

    public function store(CertificateRequest $request)
    {
        $customIdCert = Helpers::generateIdCert();
        $validatedData = $request->validated();
        $validatedData['id_Cert'] = $customIdCert;

        $userRole = auth()->user()->roles()->first();

        if ($userRole->role_name === "moderateur") {
            $validatedData['certificatetable_id'] = $request->id_Cat;
            $validatedData['certificatetable_type'] = 'App\Models\Categorie';
            Certificate::create($validatedData);
            return redirect()->route('certificate.index')->with('success', 'certificate created successfully');
        } elseif ($userRole->role_name === "formateur") {
            $validatedData['certificatetable_id'] = $request->id_C;
            $validatedData['certificatetable_type'] = 'App\Models\Cour';
            Certificate::create($validatedData);
            return redirect()->route('certificate.index')->with('success', 'certificate created successfully');
        }
    }
    public function destroy($id)
    {
        Certificate::find($id)->delete();
        return redirect()->route('certificate.index')->with('success', 'certificate deleted successfully');
    }
    public function choisircert(){
        $certificats= Certificate::where('certificatetable_type','App\Models\Categorie')->get();
        return view('management.certificate.choisircert',compact('certificats'));
    }
    public function passer($id){
        $certQues= Question::where('questable_id',$id)->get();
        // dd($certQues);
        return view('management.certificate.passer',compact('certQues','id'));
    }
    public function sendEmail($id)
    {
        $idU = Auth::id();
        $idCertP= Helpers::generateIdCertP();
        $user= User::where('id_U',$idU)->first();
        $aa = CertPasser::create([
            'id_CertP' => $idCertP,
            'valider' => 1,
            'id_U' => $idU,
            'id_Cert' => $id,
        ]);
        
        Mail::to($user->Email)->send(new ValiderCert($user));
        return 'ggggggggggg';
    }
}
