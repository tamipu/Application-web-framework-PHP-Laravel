<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\RecipeRating;
use Illuminate\Support\Facades\DB;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($recipe_id)
{

    $recipe = Recipe::findOrFail($recipe_id);//recuperer la recette avec l'id donné

    $comments = Comment::where('recipe_id', $recipe->id)->get();//recuperer les commentaires de la recette
    $ratings = RecipeRating::where('recipe_id', $recipe->id)->get();//recuperer les notes de la recette

    return view('comments.index', compact('comments', 'ratings','recipe'));//retourner la vue avec les commentaires et la recette
}


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'content' => 'required',
            'user_id' => 'nullable|exists:users,id',

        ]);
        $request->merge(['user_id' => 1]);//ajouter user_id à 1

        try {
            // Création d'un nouveau commentaire avec les données validées
            Comment::create($validatedData + ['user_id' => 1]); // Ajouter user_id à 1

            // Redirection vers la page des commentaires avec un message de succès
            return redirect()->route('comments.index', ['recipe_id' => $validatedData['recipe_id']])->with('success', 'Commentaire ajouté avec succès!');
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            return redirect()->route('comments.index', ['recipe_id' => $validatedData['recipe_id']])->with('error', 'Une erreur est survenue lors de l\'ajout du commentaire.');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);//recuperer la recette avec l'id donné
        return view('recipes.show', compact('recipe'));//retourner la vue avec la recette
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($recipe_id,$id)
    {
        $comment = Comment::find($id);//recuperer le commentaire avec l'id donné

        if (!$comment) {
            // Si le commentaire n'est pas trouvé
            return redirect()->route('comments.index', ['recipe_id' => $comment->recipe_id])->with('error', 'Commentaire non trouvé.');//rediriger avec un message d'erreur
        }
        return view('comments.edit', compact('comment'));//retourner la vue avec le commentaire
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // $validatedData = $request->validate([
        //     'content' => 'required',
        // ]);

        $comment = new Comment();//instancier un nouveau commentaire
        $comment = $comment->findOrFail($id);//recuperer le commentaire avec l'id donné

        if (!$comment) {
            // Si le commentaire n'est pas trouvé
            return redirect()->route('comments.index', ['recipe_id' => $comment->recipe_id])->with('error', 'Commentaire non trouvé.');//rediriger avec un message d'erreur
        }
        $comment->content = $request->input('content');//modifier le contenu du commentaire
        $comment->save();//sauvegarder les modifications
        return redirect()->route('comments.index', ['recipe_id' => $comment->recipe_id])->with('success', 'Commentaire modifié avec succès.');//rediriger avec un message de succès
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($recipe_id, $id)
{
        $comment = Comment::find($id);//recuperer le commentaire avec l'id donné


    // Vérifier si le commentaire existe
    if (!$comment) {
        // Rediriger avec un message d'erreur
        return redirect()->route('comments.index')->with('error', 'Commentaire non trouvé.');
    }

    // Récupérer l'ID de la recette du commentaire
    $recipe_id = $comment->recipe_id;

    // Supprimer le commentaire
    $comment->delete();

    // Rediriger avec un message de succès
    return redirect()->route('comments.index', ['recipe_id' => $recipe_id])->with('success', 'Commentaire supprimé avec succès.');
}

}
