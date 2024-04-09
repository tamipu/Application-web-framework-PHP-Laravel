{{-- Utilisation du layout principal pour cette vue --}}
@extends('layouts.main')

{{-- Début de la section content --}}
@section('content')
    <section style="margin-bottom: 100px"> {{-- Section principale --}}
        <div class="container"> {{-- Conteneur Bootstrap --}}
            <div class="row justify-content-center"> {{-- Ligne Bootstrap --}}
                <div class="col-md-8"> {{-- Colonne Bootstrap --}}
                    <div class="card"> {{-- Carte Bootstrap --}}
                        <div class="card-header"> {{-- En-tête de la carte --}}
                            <h2>Modifier votre commentaire</h2> {{-- Titre --}}
                        </div>
                        <div class="card-body"> {{-- Corps de la carte --}}
                            <form action="{{ route('comments.update', $comment->id) }}" method="POST"> {{-- Formulaire pour mettre à jour le commentaire --}}
                                @csrf {{-- Protection CSRF --}}
                                @method('PUT') {{-- Utilisation de la méthode PUT pour la mise à jour --}}
                                <div class="form-group"> {{-- Groupe de formulaire --}}
                                    <label for="content"></label> {{-- Étiquette pour le contenu --}}
                                    <textarea name="content" id="content" class="form-control" rows="6">{{ $comment->content }}</textarea> {{-- Champ de saisie pour le contenu --}}
                                    <span style="color:red">@error('title') {{ $message }} @enderror</span> {{-- Affichage des erreurs --}}
                                </div>
                                <br>
                                <div class="text-center"> {{-- Centre le bouton --}}
                                    <button type="submit" class="btn btn-dark">ENREGISTRER</button> {{-- Bouton pour enregistrer les modifications --}}
                                </div>
                            </form> {{-- Fin du formulaire --}}
                        </div> {{-- Fin du corps de la carte --}}
                    </div> {{-- Fin de la carte --}}
                </div> {{-- Fin de la colonne Bootstrap --}}
            </div> {{-- Fin de la ligne Bootstrap --}}
        </div> {{-- Fin du conteneur Bootstrap --}}
    </section> {{-- Fin de la section principale --}}
@endsection {{-- Fin de la section content --}}
