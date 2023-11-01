<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        $idsC = $cours->pluck('id_C')->all();
        $certificates = Certificate::whereIn('id_C', $idsC)->get();
        return view('management.certificate.index', compact('certificates'));
    }
    
    public function create()
    {
        $id = Auth::id();
        $cours = Cour::where('id_U', $id)->get();
        return view('management.certificate.create', compact('cours'));
    }

    public function store(CertificateRequest $request)
    {

        $customIdCert = Helpers::generateIdCert();
        $validatedData = $request->validated();

        $validatedData['id_Cert'] = $customIdCert;

        Certificate::create($validatedData);
        return redirect()->route('certificate.index')->with('success', 'certificate created successfully');
    }


    public function destroy($id)
    {
        Certificate::find($id)->delete();
        return redirect()->route('certificate.index')->with('success', 'certificate deleted successfully');
    }
}
