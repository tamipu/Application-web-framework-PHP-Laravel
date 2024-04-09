@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Résultats de la recherche</h1>

    @foreach ($recipes as $recipe)
    <div class="card mb-4">
        <div class="card-body">
            <h2>{{ $recipe->title }}</h2>
            <p>{{ $recipe->description }}</p>
            <p>Par: {{ $recipe->user->name }}</p>
            <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="btn btn-dark">Voir la recette</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
