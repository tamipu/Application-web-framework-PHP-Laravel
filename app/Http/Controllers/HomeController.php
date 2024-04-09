<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('welcome');
        $recipes = Recipe::latest()->take(3)->get(); // Prend les 3 dernières recettes
    return view('welcome', compact('recipes'));// Retourne la vue avec les recettes
    }

}
