<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Mail;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('logins.register.index');
    }

    public function register()
    {
        return view('logins.register.index');
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);// Insertion des données dans la base de données
        $query = DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);// vérifier si les données sont insérées avec succès
        if($query){
            return back()->with('success', 'Votre compte a été créé avec succès. Vous pouvez vous connecter maintenant.');
        }else{
            return back()->with('fail', 'Il y a erreur :( Merci de réessayer !');
        }



}
}
