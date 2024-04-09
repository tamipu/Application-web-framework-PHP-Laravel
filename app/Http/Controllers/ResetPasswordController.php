<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('logins.reset-passwords.index');
    }

    public function reset()
    {
        return view('logins.reset-passwords.index');
    }
}
