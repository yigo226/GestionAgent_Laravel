@extends('layouts.layout')
@section('title', 'Détails d\'un Poste')
@section('header', 'Détails d\'un Poste')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Nom : {{ $poste->nom }}</h5>
        <p><strong>Description :</strong> {{ $poste->description }}</p>
        <p><strong>Service :</strong> {{ $poste->service->nom }}</p>
        <a href="{{ route('postes.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection