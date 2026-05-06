
@extends('layouts.layout')

@section('title', 'Détails de l\'Agent')
@section('header', 'Détails de l\'Agent')

@section('content')
<div class="card">
<div class="card-body">
<h5 class="card-title">Matricule : {{ $agent->matricule }}</h5>
<p><strong>Nom :</strong> {{ $agent->nom }}</p>
<p><strong>Prénom :</strong> {{ $agent->prenom }}</p>
<p><strong>Téléphone :</strong> {{ $agent->telephone }}</p>
<p><strong>Email :</strong> {{ $agent->email }}</p>
<p><strong>Service :</strong> {{ $agent->service->nom }}</p>
<a href="{{ route('agents.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
</div>
@endsection