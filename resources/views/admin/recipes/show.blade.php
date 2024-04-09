@extends('layouts.main')

@section('content')
<h2>{{ $recipe->title }}</h2>
<p>Owner: {{ $recipe->user->name }}</p>
<p>Ingredients: {{ $recipe->ingredients }}</p>
<p>Desciption: {{ $recipe->content }}</p>

@endsection
