<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RatingController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index']);

// Page de contact
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'add'])->name('contact.add');

// Pages des recettes
Route::get('/recipe', [RecipeController::class, 'index']);
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');

// Routes administratives pour la gestion des recettes
Route::resource('admin/recipes', RecipesController::class)
    //->middleware('auth')
    ->names([
        'create' => 'recipe.create',
        'store' => 'recipe.store',
        'edit' => 'recipe.edit',
        'update' => 'recipe.update',
        'destroy' => 'recipe.destroy',
    ]);
Route::get('admin/recipes/{id}/edit', [RecipesController::class, 'edit'])->name('recipe.edit');
Route::put('admin/recipes/{id}', [RecipesController::class, 'update'])->name('recipe.update');
Route::delete('admin/recipes/{id}', [RecipesController::class, 'destroy'])->name('recipe.destroy');

// Recherche de recettes par tags
Route::get('/recipes/search', [RecipesController::class, 'searchByTags'])->name('recipes.search');

// Gestion des évaluations des recettes
Route::get('/recipe/{id}/rate', [RatingController::class, 'showRateForm'])->name('recipe.rate');
Route::post('/recipe/{id}/rate', [RatingController::class, 'submitRating'])->name('recipe.submit-rating');

// Gestion des commentaires des recettes
Route::get('/comments/{recipe_id}', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments/{recipe_id}', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{recipe_id}/{comment_id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{recipe_id}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{recipe_id}/{comment_id}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');

// Authentification et gestion des comptes utilisateur
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('add', [RegisterController::class, 'add'])->name('register.add');



