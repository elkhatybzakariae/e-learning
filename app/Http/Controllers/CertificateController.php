<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Cour;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $userRole = auth()->user()->roles()->first();
        if ($userRole->role_name === "moderateur") {
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
        return view('management.certificate.create', compact('cours'));
    }

    public function store(CertificateRequest $request,$id)
    {

        $customIdCert = Helpers::generateIdCert();
        $validatedData = $request->validated();
        $validatedData['id_Cert'] = $customIdCert;

        $validatedData['certificatetable_id'] = $id;
        $incour = Cour::where('id_C', $validatedData['id_C'])->exists();
        if ($incour) {
            $validatedData['certificatetable_type'] = 'App\Models\Cour';
        } else {
            $validatedData['certificatetable_type'] = 'App\Models\Categorie';
        }

        Certificate::create($validatedData);
        return redirect()->route('certificate.index')->with('success', 'certificate created successfully');
    }
    public function destroy($id)
    {
        Certificate::find($id)->delete();
        return redirect()->route('certificate.index')->with('success', 'certificate deleted successfully');
    }
}
