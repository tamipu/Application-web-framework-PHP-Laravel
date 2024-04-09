{{-- Utilisation du layout principal pour cette vue --}}
@extends('layouts.main')
{{-- Début de la section content --}}
@section('content')
    {{-- Début de la ligne Bootstrap --}}
    <div class="row">
        <div class="col-md-8">
        {{-- Colonne Bootstrap sur 8 colonnes pour la partie principale --}}
            <div class="card">
                <div class="card-body">
                    {{-- Titre de la page --}}
                    <h3 class="card-title mt-2 mb-2 is-size-3 is-size-4-mobile has-text-weight-bold">Toutes les recettes</h3>
                    <ul class="list-group list-group-flush">
                        {{-- Boucle pour chaque recette --}}
                        @foreach ($recipes as $recipe)
                            {{-- Affichage du titre de la recette avec un lien vers sa page détaillée --}}
                            <li class="list-group-item"><a href="{{ route('recipe.show', ['id' => $recipe->id]) }}">{{ $recipe->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{-- Colonne Bootstrap sur 4 colonnes pour la partie secondaire --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('recipes.index') }}" class="btn btn-secondary"><h5>Mes recettes</h5></a>
                    </div>
                    <br><br>
                    <div class="text-center">
                        <h3>Vous avez une recette à partager ?</h3>
                        <a href="{{ route('recipe.create') }}" class="btn btn-dark"><h5>Déposer une recette</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
