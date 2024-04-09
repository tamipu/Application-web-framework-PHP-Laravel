<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contacts.index');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);// Insertion des données dans la base de données
        $query = DB::table('contacts')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ]);// vérifier si les données sont insérées avec succès
        if($query){
            return back()->with('success', 'Merci de nous envoyer des messages !');//Le message a été envoyé avec succès.
        }else{
            return back()->with('fail', 'Il y a erreur :( Merci de réessayer !');
        }
    }

}
