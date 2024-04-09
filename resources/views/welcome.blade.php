@extends('layouts.main')

@section('content')
    <div class="mb-6 columns is-multiline is-centered" style="background-image: url('https://images.ricardocuisine.com/services/recipes/350x473_arepas-portrait.jpg'); background-size: cover; background-position: center; height: 400px;">
        <div class="column is-8 has-text-centered" style="background-color: rgba(255, 255, 255, 0.7); padding: 20px;">
            <span class="has-text-grey-dark-bold" style="color: #662323">@yield('title','Accueil')</span>
            <h2 class="mt-2 mb-4 is-size-3-mobile custom-title">Reecceettee</h2>
            <p class="subtitle has-text-grey-bold" style="color: #662323">Le meilleur de la cuisine</p>
        </div>
    </div>

    <div class="container">
        <h1 class="mt-4 mb-4 is-size-4-mobile has-text-weight-bold">Les dernières recettes</h1>
        <div class="row">
            @foreach ($recipes as $recipe)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <small class="text-muted">{{ $recipe->created_at->format('d M Y H:i') }}</small>
                                <h3 class="mt-2 mb-2 is-size-4 is-size-5-mobile has-text-weight-bold">{{ $recipe->title }}</h3>
                                <p class="text-muted">par {{ $recipe->user->name }}</p>
                                <img src="{{ asset($recipe->photo) }}" class="img-fluid" alt="photo">

                                {{-- Preparation time --}}
                                <div class="row">
                                    <div class="col">
                                        <span><i class="fas fa-clock"></i> Préparation</span>
                                    </div>
                                    <div class="col">
                                        <span>{{ $recipe->prep_time }} mins</span>
                                    </div>
                                </div>

                                {{-- Cooking time --}}
                                <div class="row">
                                    <div class="col">
                                        <span><i class="fas fa-fire"></i> Cuisson</span>
                                    </div>
                                    <div class="col">
                                        <span>{{ $recipe->cook_time }} mins</span>
                                    </div>
                                </div>
                                <br>
                                <div class="text-center">
                                    <a href="{{ route('recipe.show', ['id' => $recipe->id]) }}" class="btn btn-secondary">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
