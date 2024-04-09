<?php

namespace App\Http\Controllers;
use App\Models\Recipe;

use Illuminate\Http\Request;


class RecipesController extends Controller
{
    /**
     * Affiche une liste des recettes.
     */
    public function index()
    {
        // Récupère les recettes de l'utilisateur avec l'ID 1
        $recipes = \App\Models\User::find(1)->recipes;

        // Retourne la vue avec les recettes
        return view('admin.recipes.index', [
            'recipes' => $recipes,
        ]);

    }

    /**
     * Affiche le formulaire de création d'une nouvelle recette.
     */
    public function create(Request $request)
    {

        return view('admin.recipes.create');


    }

    /**
     * Stocke une nouvelle recette dans la base de données.
     */
    public function store(Request $request)
    {
    // Valide les données entrantes
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'ingredients' => 'required',
        'price' => 'required',
        'user_id' => 'nullable|exists:users,id',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'servings' => 'nullable|integer',
        'prep_time' => 'nullable|integer',
        'cook_time' => 'nullable|integer',
        'difficulty' => 'nullable',

        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();

            $name = hash('sha256', $image->getFilename() . microtime()) . '.' . $extension; // Génère un nom de fichier unique
            $image->move(public_path('images'), $name);
    } else {
        $name = 'noimage.jpg';
    }

        $request->merge(['user_id' => 1]);
        // Créez une nouvelle recette avec les données de la requête
        $recipe = Recipe::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'ingredients' => $request->input('ingredients'),
            'price' => $request->input('price'),
            'user_id' => $request->input('user_id'), // Utilisateur avec l'ID 1
            'photo' => '/images/' . $name,
            'servings' => $request->input('servings'),
            'prep_time' => $request->input('prep_time'),
            'cook_time' => $request->input('cook_time'),
            'difficulty' => $request->input('difficulty'),
        ]);

        // Enregistrez la recette dans la base de données
    //$recipe->save();
    //Recipe::create($request->all());

    return redirect()->route('recipes.index')->with('success', 'Recette ajoutée avec succès.')
    ->with('photo', $name);
    }

    /**
     * Affiche une recette spécifique.
     */

    public function show(string $id)
    {
        // Trouve la recette par son ID
        $recipe_model = new Recipe();
        $recipe = $recipe_model->find($id);

        // Vérifie si la recette existe
        if (!$recipe) {
            // Gère le cas où la recette n'est pas trouvée
            return redirect()->route('recipes.index')->with('error', 'Recette non trouvée.');
        }
        // Retourne la vue avec la recette spécifique
        return view('admin.recipes.show', [
            'recipe' => $recipe,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe_model = new Recipe();
        $recipe = $recipe_model->find($id);

        if (!$recipe) {
            // Quand la recette n'est pas trouvée
            return redirect()->route('recipes.index')->with('error', 'Recette non trouvée.');
        }

        return view('admin.recipes.edit', [
            'recipe' => $recipe,
        ]);

    }


    public function update(Request $request, string $id)
    {
        // Valider les données entrantes
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'ingredients' => 'required',
            'price' => 'required',
            'tags' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'servings' => 'nullable|integer',
            'prep_time' => 'nullable|integer',
            'cook_time' => 'nullable|integer',
            'difficulty' => 'nullable',
        ]);

        // Chercher la recette par son ID
        $recipe = Recipe::find($id);

        // Vérifie si la recette existe
        if (!$recipe) {
            // Quand la recette n'est pas trouvée
            return redirect()->route('recipes.index')->with('error', 'Recette non trouvée.');
        }

        // Preparer les données de la recette
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'ingredients' => $request->input('ingredients'),
            'price' => $request->input('price'),
            'tags' => $request->input('tags'),
            'servings' => $request->input('servings'),
            'prep_time' => $request->input('prep_time'),
            'cook_time' => $request->input('cook_time'),
            'difficulty' => $request->input('difficulty'),
        ];

        // Occupons-nous de l'image de la recette
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $name = hash('sha256', $image->getFilename() . microtime()) . '.' . $extension;
            $image->move(public_path('images'), $name);
            $data['photo'] = '/images/' . $name; // Adjusted path for the image
        }
        // Mettre à jour la recette dans la base de données
        $recipe->update($data);

        // Rediriger l'utilisateur vers la liste des recettes avec un message de succès
        return redirect()->route('recipes.index')->with('success', 'Recette modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe_model = new Recipe();// Chercher la recette par son ID
        $recipe = $recipe_model->find($id);// Vérifie si la recette existe

        if (!$recipe) {
            // Quand la recette n'est pas trouvée
            return redirect()->route('recipes.index')->with('error', 'Recette non trouvée.');
        }

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recette supprimée avec succès.');// Rediriger l'utilisateur vers la liste des recettes avec un message de succès
    }

    public function searchByTags(Request $request)
    {
        $tags = $request->input('tags');// Récupère les tags de la requête
        $recipes = Recipe::where('tags', 'like', '%' . $tags . '%')->get();// Recherche les recettes par tags
        return view('admin.recipes.search-results', [
            'recipes' => $recipes,
        ]);// Retourne la vue avec les recettes trouvées
    }
}
