{{-- Utilisation du layout principal pour cette vue --}}
@extends('layouts.main')

{{-- Début de la section content --}}
@section('content')
<div class="container"> {{-- Conteneur Bootstrap --}}
    <div class="row"> {{-- Ligne Bootstrap --}}
        <div class="col-md-6"> {{-- Colonne Bootstrap --}}
            @php
                $totalRating = 0;
                $count = 0;
            @endphp
            @foreach ($ratings as $rating) {{-- Boucle pour calculer la note moyenne --}}
                @if ($rating->recipe_id == $recipe->id)
                    @php
                        $totalRating += $rating->rating;
                        $count++;
                    @endphp
                @endif
            @endforeach

            @php
                $averageRating = $count > 0 ? $totalRating / $count : 0;
            @endphp

            <div class="my-4"> {{-- Div pour afficher la note moyenne et les commentaires --}}
                <h4 class="mb-3">Note moyenne: {{ number_format($averageRating, 1) }}</h4> {{-- Affichage de la note moyenne --}}
                <br>
                <!-- Liste des commentaires -->
                @foreach ($comments as $comment) {{-- Boucle pour afficher les commentaires --}}
                    @if ($comment->recipe_id == $recipe->id)
                        <div class="comment mb-4"> {{-- Div pour chaque commentaire --}}
                            <p>{{ $comment->content }}</p> {{-- Affichage du contenu du commentaire --}}
                            <p class="text-muted"><mark>Par: {{ optional($comment->user)->name }} - {{ $comment->created_at }}</mark></p> {{-- Affichage de l'auteur et de la date du commentaire --}}
                            <div class="d-inline"> {{-- Div pour les boutons de modification et de suppression --}}
                                <a href="{{ route('comments.edit', ['recipe_id' => $recipe->id, 'comment_id' => $comment->id]) }}" class="btn btn-sm btn-secondary mr-2">Modifier</a> {{-- Bouton de modification --}}
                                <form action="{{ route('comments.destroy', ['recipe_id' => $recipe->id, 'comment_id' => $comment->id]) }}" method="POST" class="d-inline"> {{-- Formulaire pour la suppression du commentaire --}}
                                    @csrf {{-- Protection CSRF --}}
                                    @method('DELETE') {{-- Méthode DELETE --}}
                                    <button type="submit" class="btn btn-sm btn-dark">Supprimer</button> {{-- Bouton de suppression --}}
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if (Session::has('success')) {{-- Affichage du message de succès --}}
                    <div class="alert alert-success mt-4">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail')) {{-- Affichage du message d'échec --}}
                    <div class="alert alert-danger mt-4">{{ Session::get('fail') }}</div>
                @endif
            </div>
        </div>

        <div class="col-md-6"> {{-- Colonne Bootstrap --}}
            <!-- Formulaire de notation -->
            <div class="card my-4"> {{-- Div pour le formulaire de notation --}}
                <div class="card-body"> {{-- Div pour le corps de la carte --}}
                    <h3 class="card-title">Noter la recette</h3> {{-- Titre pour le formulaire de notation --}}
                    <form action="{{ route('recipe.submit-rating', ['id' => $recipe->id]) }}" method="POST"> {{-- Formulaire pour soumettre la note --}}
                        @csrf {{-- Protection CSRF --}}
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}"> {{-- Champ caché pour l'ID de la recette --}}
                        <div class="form-group"> {{-- Groupe de formulaire pour la notation --}}
                            <label for="rating"></label> {{-- Étiquette pour la notation --}}
                            <select class="form-control" name="rating"> {{-- Menu déroulant pour la notation --}}
                                <option value="1">1 <i class="fas fa-star"></i></option>
                                <option value="2">2 <i class="fas fa-star"></i></option>
                                <option value="3">3 <i class="fas fa-star"></i></option>
                                <option value="4">4 <i class="fas fa-star"></i></option>
                                <option value="5">5 <i class="fas fa-star"></i></option>
                            </select>
                        </div> {{-- Fin du groupe de formulaire pour la notation --}}
                        <br>
                        <button type="submit" class="btn btn-dark">Noter</button> {{-- Bouton de soumission du formulaire --}}
                    </form> {{-- Fin du formulaire --}}
                </div> {{-- Fin du corps de la carte --}}
            </div> {{-- Fin de la carte pour le formulaire de notation --}}

            <!-- Formulaire de commentaire -->
            <div class="card my-4"> {{-- Div pour le formulaire de commentaire --}}
                <div class="card-body"> {{-- Div pour le corps de la carte --}}
                    <h3 class="card-title">Ajouter un commentaire</h3> {{-- Titre pour le formulaire de commentaire --}}
                    <form action="{{ route('comments.store', ['recipe_id' => $recipe->id]) }}" method="POST"> {{-- Formulaire pour soumettre le commentaire --}}
                        @csrf {{-- Protection CSRF --}}
                        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}"> {{-- Champ caché pour l'ID de la recette --}}
                        <div class="form-group"> {{-- Groupe de formulaire pour le commentaire --}}
                            <textarea class="form-control" name="content" rows="4" placeholder="Votre commentaire"></textarea> {{-- Champ de saisie pour le commentaire --}}
                        </div> {{-- Fin du groupe de formulaire pour le commentaire --}}
                        <br>
                        <button type="submit" class="btn btn-dark">Envoyer</button> {{-- Bouton de soumission du formulaire --}}
                    </form> {{-- Fin du formulaire --}}
                </div> {{-- Fin du corps de la carte --}}
            </div> {{-- Fin de la carte pour le formulaire de commentaire --}}
        </div> {{-- Fin de la colonne Bootstrap --}}
    </div> {{-- Fin de la ligne Bootstrap --}}
</div>
@endsection
