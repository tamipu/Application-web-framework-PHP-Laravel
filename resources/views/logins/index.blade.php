@extends('layouts.main')

@section('content')

    <section style="margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>Se connecter</h2>
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
                                    <label for="email"></label>
                                    <input type="email" name="email" placeholder="Identifiant ou email" id="email" class="form-control" value="{{ old('email')}}">
                                    <span style="color:red"> @error('email')
                                        {{ $message }} @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="password"></label>
                                    <input type="password" name="password" placeholder="Mot de passe" id="password" class="form-control" value="{{ old('password')}}" autocomplete="off">
                                    <span style="color:red"> @error('password')
                                        {{ $message }} @enderror</span>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="{{ route('password.request') }}">Vous avez oublié votre pseudo ou mot de passe ?</a>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark">CONNEXION</button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <a href="{{ route('register') }}">Vous n'avez pas de compte ?</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
