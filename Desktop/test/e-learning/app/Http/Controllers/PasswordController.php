<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class PasswordController extends Controller
{
    
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }
    public function sendResetLinkEmail(Request $request)
    {
        // $this->validateEmail($request);
        $this->broker()->sendResetLink(
            $request->only('email')
        );
        return back()->with('status', 'Password reset link sent!');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());
        $credentials = $request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        );
        $response = $this->broker()->reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }
}
