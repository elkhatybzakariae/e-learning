<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Requests\CertificateRequest;
use App\Mail\ResultatCert;
use App\Mail\ValiderCert;
use App\Models\Categorie;
use App\Models\Certificate;
use App\Models\CertPasser;
use App\Models\Cour;
use App\Models\Message;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $userRole = auth()->user()->roles()->first();
        if ($userRole->role_name === "moderateur") {
            $name = 'App\Models\Categorie';
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
        return view('management.certificate.create', compact('cours', 'categorie'));
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
    public function choisircert()
    {
        $certificats = Certificate::where('certificatetable_type', 'App\Models\Categorie')->get();
        return view('management.certificate.choisircert', compact('certificats'));
    }
    public function passer($id)
    {
        $certQues = Question::where('questable_id', $id)->get();
        return view('management.certificate.passer', compact('certQues', 'id'));
    }
    public function valider($id)
    {
        $msg = Message::find($id);
        $certP = CertPasser::where('id_CertP', $msg->id_CertP)->first();
        $splitPairs = explode('&', $certP->QR);
        $questions = [];
        $responses = [];
        foreach ($splitPairs as $pair) {
            $explodedPair = explode('=', $pair);
            if (count($explodedPair) === 2) {
                list($key, $value) = $explodedPair;
                $questions[] = $key;
                $responses[] = urldecode($value);
            }
        }
        $msg->update([
            'lire' => 1,
        ]);
        return view('management.certificate.passer', compact('certP', 'id', 'responses', 'questions'));
    }
    public function validertest(Request $req, $id, $idU)
    {
        $resultat = $req->input('resultat');
        $percentage = number_format($resultat * 100, 1);
        $user = User::where('id_U', $idU)->first();
        if ($percentage >= 60) {
            $cert = CertPasser::find($id);
            $cert->update([
                'valider' => 1,
            ]);
            $data = [
                'message' => 'félicitation tu as réussi le certificat.',
                'status' => 'success',
                'resultat' => $percentage.'%',
            ];
            Mail::to($user->Email)->send(new ResultatCert($data));

            return response()->json($data);
        } elseif ($percentage< 60) {
            $data = [
                'message' => 'Malheureusement, vous n\'avez pas réussi l\'examen de certificat cette fois-ci.',
                'resultat' => $percentage .'%',
            ];
            Mail::to($user->Email)->send(new ResultatCert($data));

            return response()->json($data);
        }


        // return view('management.certificate.passer', compact('certP', 'id','responses','questions'));
        // $data = [
        //     'message' => 'Your message here',
        //     'status' => 'success',
        //     'resultat' => $percentage,
        // ];

    }
    public function sendEmail(Request $req, $id)
    {
        $idU = Auth::id();
        $dejapasser = CertPasser::where('id_Cert', $id)->where('id_U', $idU)->exists();

        // if (!$dejapasser) {
        $idCertP = Helpers::generateIdCertP();
        $idMess = Helpers::generateIdMess();
        $formData = $req->except('_token');
        $formDataString = '';

        foreach ($formData as $key => $value) {
            $formDataString .= $key . '=' . $value . '&';
        }
        $aa = CertPasser::create([
            'id_CertP' => $idCertP,
            'passer' => 1,
            'valider' => 0,
            'QR' => $formDataString,
            'id_U' => $idU,
            'id_Cert' => $id,
        ]);
        $a = Message::create([
            'id_Mess' => $idMess,
            'id_CertP' => $aa->id_CertP,
            'id_U' => $idU,
        ]);
        $user = User::where('id_U', $idU)->first();
        $data = ['user' => $user->FirstName, "message" => 'hi dear we will validate your cert in the next 24H'];
        // dd($data);
        Mail::to($user->Email)->send(new ValiderCert($data));
        // } else {
        //     return 'att pour valider ton cert';
        // }
        return view('emails.ValiderCert');
    }
}
