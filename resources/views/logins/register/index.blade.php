@extends('layouts.main')

@section('content')

        <section style="margin-bottom: 100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h2>Créer un compte</h2>
                            </div>
                            <div class="card-body">
                                <form action="add" method="POST">
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

                                    @csrf

                                    <div class="form-group">
                                        <label for="name"></label>
                                        <input type="text" name="name" id="name" placeholder="Nom" class="form-control" value="{{ old('name')}}">
                                        <span style="color:red"> @error('name')
                                            {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group
                                    ">
                                        <label for="email"></label>
                                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email')}}">
                                        <span style="color:red"> @error('email')
                                            {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group
                                    ">
                                        <label for="password"></label>
                                        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control" value="{{ old('password')}}" autocomplete="off">
                                        <span style="color:red"> @error('password')
                                            {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group
                                    ">
                                        <label for="password_confirmation"></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmer le mot de passe" class="form-control" value="{{ old('password_confirmation')}}" autocomplete="off">
                                        <span style="color:red"> @error('password_confirmation')
                                            {{ $message }} @enderror</span>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark">ENREGISTRER</button>
                                    </div>
                                </form>

                                <div class="text-center mt-3">
                                    <a href="{{ route('login') }}">Vous avez déjà un compte ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection
