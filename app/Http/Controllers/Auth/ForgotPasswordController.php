<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function messages()
    {
        return [
            'email.required' => 'Email é obrigatorio',
        ];
    }

    public function sendResetLinkResponse()
    {
        return redirect()->route('success.email');
    }

    public function successEmail() {
        return view('auth.passwords.success');
    }
}
