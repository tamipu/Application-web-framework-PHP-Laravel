{{-- Utilisation du layout principal pour cette vue --}}
@extends('layouts.main')

{{-- Début de la section content --}}
@section('content')
<div class="container"> {{-- Début du conteneur Bootstrap --}}
    <h1 class="mt-4 mb-4">Votre avis</h1> {{-- Titre principal --}}
    <form action="{{ route('recipe.submit-rating', ['id' => $recipe->id]) }}" method="POST"> {{-- Formulaire pour soumettre la note --}}
        @csrf {{-- Protection CSRF --}}

        <div class="form-group"> {{-- Groupe de formulaire pour la note --}}
            <label for="rating">Votre note</label> {{-- Étiquette pour la note --}}
            <div class="rating-stars"> {{-- Conteneur pour les étoiles de notation --}}
                @for ($i = 1; $i <= 5; $i++) {{-- Boucle pour afficher les étoiles --}}
                    <input type="radio" id="star-{{ $i }}" name="rating" value="{{ $i }}"> {{-- Champ radio pour la note --}}
                    <label for="star-{{ $i }}"></label> {{-- Étiquette de l'étoile --}}
                @endfor {{-- Fin de la boucle --}}
            </div> {{-- Fin du conteneur pour les étoiles de notation --}}
        </div> {{-- Fin du groupe de formulaire pour la note --}}

        <div class="form-group"> {{-- Groupe de formulaire pour le commentaire --}}
            <label for="comment">Votre commentaires</label> {{-- Étiquette pour le commentaire --}}
            <textarea name="comment" class="form-control" rows="3"></textarea> {{-- Champ de saisie pour le commentaire --}}
        </div> {{-- Fin du groupe de formulaire pour le commentaire --}}

        <button type="submit" class="btn btn-dark">Submit</button> {{-- Bouton de soumission du formulaire --}}
    </form> {{-- Fin du formulaire --}}
</div> {{-- Fin du conteneur Bootstrap --}}
@endsection {{-- Fin de la section content --}}
