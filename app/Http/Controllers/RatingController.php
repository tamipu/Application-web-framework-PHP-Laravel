<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Events\RatingSent;
use Illuminate\Http\Request;
use App\Models\RecipeRating;

class RatingController extends Controller
{
    public function showRateForm()// Affiche le formulaire de notation
    {
        return view('Comments.rating');// Retourne la vue pour le formulaire de notation
    }
    public function submitRating(Request $request, $id)
{
    // Validation des données de formulaire
    $validatedData = $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:255',
    ]);

    $rating = new RecipeRating();
    $rating->recipe_id = $id;
    $rating->user_id = 1;
    $rating->rating = $validatedData['rating'];
    //$rating->comment = $validatedData['comment'];
    $rating->save();

    // Redirection vers une page de confirmation ou autre
    return redirect()->back()->with('success', 'Votre note a bien été enregistrée. Merci !');
}

    public function fetchRatings()// Récupère toutes les notations
    {
        return RecipeRating::with('user')->get();// Retourne toutes les notations avec les utilisateurs associés
    }

}
