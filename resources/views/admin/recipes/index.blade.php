@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3 class="mt-2 mb-4 is-size-3 is-size-4-mobile has-text-weight-bold">Toutes mes recettes</h3>
            <ul class="list-unstyled">
                @foreach ($recipes as $recipe)
                    <li class="mb-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="card-link">{{ $recipe->title }}</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset($recipe->photo) }}" class="img-fluid" alt="photo">
                                    </div>
                                    <div class="col-md-9">
                                        <p class="mb-2"><strong>Author: </strong> {{ $recipe->user->name }}</p>
                                        <p class="mb-2"><strong>Ingredients: </strong>{{ $recipe->ingredients }}</p>
                                        <p class="mb-2"><strong>Content: </strong>{{ $recipe->content }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-inline-block">
                                    <a class="btn btn-secondary mr-2" href="{{ route('recipe.edit', ['id' => $recipe->id]) }}">Editer</a>
                                    <form action="{{ route('recipe.destroy', ['id' => $recipe->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
