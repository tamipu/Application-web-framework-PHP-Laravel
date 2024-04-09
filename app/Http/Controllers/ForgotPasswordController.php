<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('logins.forgot-passwords.index');
    }

    public function sendResetLinkEmail()
    {
        return view('logins.forgot-passwords.index');
    }
}
