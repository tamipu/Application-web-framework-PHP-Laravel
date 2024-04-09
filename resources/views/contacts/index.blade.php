{{-- Utilisation du layout principal pour cette vue --}}
@extends('layouts.main')
{{-- Début de la section content --}}
@section('content')
    {{-- Début de la section avec une marge inférieure de 100px --}}
    <section style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                {{-- Colonne Bootstrap sur 6 colonnes, décalage de 3 colonnes --}}
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header ">
                            <h2>Ecrivez-nous via ce formulaire</h2>
                        </div>
                        {{-- Début de la section card-body --}}
                        <div class="card-body">
                            {{-- Formulaire de contact --}}
                            <form action="{{ route('contact.add') }}" method="POST">
                                {{-- Affichage des messages de succès et d'erreur --}}
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session :: get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                {{-- Protection CSRF --}}
                                @csrf

                                {{-- Champ de saisie pour le nom --}}
                                <div class="form-group">
                                    <label for="name">Nom <span style="color:red">*</span></label>
                                    <input type="text" name="name" id="name"  class="form-control" value="{{ old('name')}}">
                                    <span style="color:red"> @error('name')
                                        {{ $message }} @enderror</span>
                                </div>
                                {{-- Champ de saisie pour l'email --}}
                                <div class="form-group">
                                    <label for="email">Email <span style="color:red">*</span></label>
                                    <input type="email" name="email" id="email"  class="form-control" value="{{ old('email')}}">
                                    <span style="color:red"> @error('email')
                                        {{ $message }} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message <span style="color:red">*</span></label>
                                    <textarea name="message" id="message"  class="form-control" value="{{ old('message')}}"></textarea>
                                    <span style="color:red"> @error('message')
                                        {{ $message }} @enderror</span>
                                </div>
                                <br>
                                {{-- Case à cocher pour accepter les conditions --}}
                                <div class="form-group row">
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="accept" id="accept" required>
                                    </div>
                                    <div class="col-sm-11">
                                        <label for="accept">En soumettant ce formulaire, j'accepte que mes informations soient utilisées pour me contacter</label>
                                    </div>
                                </div>
                                <br>
                                {{-- Bouton d'envoi --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark btn-block">ENVOYER</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
