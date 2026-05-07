@extends('layouts.layout')

@section('title', 'Ajouter un Agent')
@section('header', 'Ajouter un Agent')

@section('content')

<form action="{{ route('agents.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
{{-- 
    {{-- MATRICULE 
    <div class="col-md-6 mb-3">
        <label>Matricule</label>
        <input type="text" name="matricule"
               class="form-control @error('matricule') is-invalid @enderror"
               value="{{ old('matricule') }}" required>
        @error('matricule')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> --}}

    {{-- NOM --}}
    <div class="col-md-6 mb-3">
        <label>Nom</label>
        <input type="text" name="nom"
               class="form-control @error('nom') is-invalid @enderror"
               value="{{ old('nom') }}" required>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- PRENOM --}}
    <div class="col-md-6 mb-3">
        <label>Prénom</label>
        <input type="text" name="prenom"
               class="form-control @error('prenom') is-invalid @enderror"
               value="{{ old('prenom') }}" required>
        @error('prenom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- TELEPHONE --}}
    <div class="col-md-6 mb-3">
        <label>Téléphone</label>
        <input type="text" name="telephone"
               class="form-control @error('telephone') is-invalid @enderror"
               value="{{ old('telephone') }}" required>
        @error('telephone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- POSTE --}}
    <div class="col-md-6 mb-3">
        <label>Poste</label>
        <select name="poste_id"
                class="form-control @error('poste_id') is-invalid @enderror"
                required>
            <option value="">-- Choisir un poste --</option>
            @foreach($postes as $poste)
                <option value="{{ $poste->id }}"
                    {{ old('poste_id') == $poste->id ? 'selected' : '' }}>
                    {{ $poste->nom }}
                </option>
            @endforeach
        </select>
        @error('poste_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SERVICE --}}
    <div class="col-md-6 mb-3">
        <label>Service</label>
        <select name="service_id"
                class="form-control @error('service_id') is-invalid @enderror"
                required>
            <option value="">-- Choisir un service --</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id') == $service->id ? 'selected' : '' }}>
                    {{ $service->nom }}
                </option>
            @endforeach
        </select>
        @error('service_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- DATE NAISSANCE --}}
    <div class="col-md-6 mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_naissance"
               class="form-control"
               value="{{ old('date_naissance') }}">
    </div>

    {{-- SEXE --}}
    <div class="col-md-6 mb-3">
        <label>Sexe</label>
        <select name="sexe" class="form-control">
            <option value="">-- Choisir --</option>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select>
    </div>

    {{-- DATE RECRUTEMENT --}}
    <div class="col-md-6 mb-3">
        <label>Date de recrutement</label>
        <input type="date" name="date_recrutement"
               class="form-control"
               value="{{ old('date_recrutement') }}">
    </div>

    {{-- STATUT --}}
    <div class="col-md-6 mb-3">
        <label>Statut</label>
        <select name="statut" class="form-control">
            <option value="actif">Actif</option>
            <option value="inactif">Inactif</option>
        </select>
    </div>

    {{-- ADRESSE --}}
    <div class="col-md-12 mb-3">
        <label>Adresse</label>
        <textarea name="adresse" class="form-control">{{ old('adresse') }}</textarea>
    </div>

    {{-- PHOTO --}}
    <div class="col-md-6 mb-3">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>

</div>

<button type="submit" class="btn btn-success">Créer</button>
<a href="{{ route('agents.index') }}" class="btn btn-secondary">Annuler</a>

</form>

@endsection