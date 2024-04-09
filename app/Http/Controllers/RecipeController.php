<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all(); //get all recipes
        //$recipe = \App\Models\Recipe::find(1); //trouver la recette avec l'id 1
        //echo $recipe->user->name; //affiche le nom du propriétaire

        //$recipes = \App\Models\User::find(1)->recipes; //get recipes from user id 1
        //dd($recipes);

        return view('recipe', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(isset($_POST['submit']))// Vérifie si le formulaire a été soumis
        {
            $recipe_model = new Recipe();// Création d'une nouvelle instance de la classe Recipe
            $recipe_model->add($_POST ['title'], $_POST ['content'], $_POST ['ingredients'], $_POST ['price'], $_POST ['photo'], $_POST ['servings'], $_POST ['prep_time'], $_POST ['cook_time'], $_POST ['difficulty']);// Appel de la méthode add
        }
        $recipes = $recipe_model->list();// Appel de la méthode list
        return view('admin/recipes', [
            'recipes' => $recipes,
        ]);// Retourne la vue avec les recettes

    }

    /**
     * Display the specified resource.
     */
    public function show($recipe_id)
    {
        $recipe = Recipe::where('id', $recipe_id)->first();// Récupère la recette avec l'ID donné
        return view('single', [
            'recipe' => $recipe,
        ]);// Retourne la vue avec la recette
    }

}
