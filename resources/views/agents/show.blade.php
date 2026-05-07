@extends('layouts.layout')

@section('title', 'Détails de l\'Agent')
@section('header', 'Détails de l\'Agent')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        {{-- PHOTO --}}
        <div class="text-center mb-3">
            @if($agent->photo)
                <img src="{{ asset('storage/'.$agent->photo) }}"
                     class="rounded-circle"
                     width="120"
                     height="120">
            @else
                <div class="text-muted">Pas de photo</div>
            @endif
        </div>

        <h4 class="text-center mb-4">
            {{ $agent->nom }} {{ $agent->prenom }}
        </h4>

        <hr>

        <p><strong>Matricule :</strong> {{ $agent->matricule }}</p>

        <p><strong>Email :</strong> {{ $agent->email }}</p>

        <p><strong>Téléphone :</strong> {{ $agent->telephone }}</p>

        <p><strong>Adresse :</strong> {{ $agent->adresse ?? '---' }}</p>

        <p><strong>Sexe :</strong> {{ $agent->sexe ?? '---' }}</p>

        <p><strong>Date de naissance :</strong> {{ $agent->date_naissance ?? '---' }}</p>

        <p><strong>Date de recrutement :</strong> {{ $agent->date_recrutement ?? '---' }}</p>

        <p>
            <strong>Statut :</strong>

            @if($agent->statut == 'actif')
                <span class="badge bg-success">Actif</span>
            @else
                <span class="badge bg-danger">Inactif</span>
            @endif
        </p>

        <p>
            <strong>Service :</strong>
            {{ $agent->service->nom ?? '---' }}
        </p>

        <p>
            <strong>Poste :</strong>
            {{ $agent->poste->nom ?? '---' }}
        </p>

        <hr>

        <a href="{{ route('agents.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </div>

</div>

@endsection