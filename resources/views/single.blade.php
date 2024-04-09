{{-- Utilisation du layout principal pour cette vue --}}
@extends('layouts.main')
{{-- Début de la section content --}}
@section('content')
    <div class="container">
        <h2 class="mb-4">{{ $recipe->title }}</h2>
        {{-- Titre de la recette récupéré depuis la variable $recipe --}}
        <div class="row">
            <div class="col-md-8">
                {{-- Colonne Bootstrap sur 8 colonnes pour la partie principale --}}
                <img src="{{ asset($recipe->photo) }}" alt="{{ $recipe->title }}" style="width: 46vh;" class="img-fluid rounded mb-3">
                <p class="mb-2"><strong><mark>DE</mark></strong> {{ $recipe->user->name }}</p>
                <p class="mb-2"><strong><mark>LES INGRÉDIENTS DE LA RECETTE</mark></strong> <div>{{ $recipe->ingredients }}</div></p>
                <p class="mb-4"><strong><mark>LA PRÉPARATION DE LA RECETTE</mark></strong> <div>{{ $recipe->content }} </div></p>
                <a href="{{ route('comments.index', ['recipe_id' => $recipe->id]) }}" class="btn btn-dark btn-lg btn-block"><h5>Notes et Commentaires</h5></a>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    {{-- Carte Bootstrap: --}}
                    <div class="card-body">
                        <h5 class="card-title">INFOS PRATIQUES</h5>
                        <ul class="list-unstyled">
                            <li><strong>Nombre de personnes:</strong> {{ $recipe->servings }}</li>
                            <li><strong>Temps de préparation:</strong> {{ $recipe->prep_time }} minutes</li>
                            <li><strong>Temps de cuisson:</strong> {{ $recipe->cook_time }} minutes</li>
                            <li><strong>Degré de difficulté:</strong> {{ $recipe->difficulty }}</li>
                            <li><strong>Coût:</strong> {{ $recipe->price }}€</li>
                            <li><strong>Tag:</strong> {{ $recipe->tags }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Fin du conteneur Bootstrap --}}
@endsection
