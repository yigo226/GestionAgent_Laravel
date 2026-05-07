@extends('layouts.layout')

@section('title', 'Modifier un Agent')
@section('header', 'Modifier un Agent')

@section('content')

<form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">

    {{-- MATRICULE --}}
    <div class="col-md-6 mb-3">
        <label>Matricule</label>
        <input type="text" name="matricule"
               class="form-control @error('matricule') is-invalid @enderror"
               value="{{ old('matricule', $agent->matricule) }}" required>
        @error('matricule')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- NOM --}}
    <div class="col-md-6 mb-3">
        <label>Nom</label>
        <input type="text" name="nom"
               class="form-control @error('nom') is-invalid @enderror"
               value="{{ old('nom', $agent->nom) }}" required>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- PRENOM --}}
    <div class="col-md-6 mb-3">
        <label>Prénom</label>
        <input type="text" name="prenom"
               class="form-control @error('prenom') is-invalid @enderror"
               value="{{ old('prenom', $agent->prenom) }}" required>
        @error('prenom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- TELEPHONE --}}
    <div class="col-md-6 mb-3">
        <label>Téléphone</label>
        <input type="text" name="telephone"
               class="form-control @error('telephone') is-invalid @enderror"
               value="{{ old('telephone', $agent->telephone) }}" required>
        @error('telephone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $agent->email) }}" required>
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
            @foreach ($postes as $poste)
                <option value="{{ $poste->id }}"
                    {{ old('poste_id', $agent->poste_id) == $poste->id ? 'selected' : '' }}>
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
            @foreach ($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id', $agent->service_id) == $service->id ? 'selected' : '' }}>
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
               value="{{ old('date_naissance', $agent->date_naissance) }}">
    </div>

    {{-- SEXE --}}
    <div class="col-md-6 mb-3">
        <label>Sexe</label>
        <select name="sexe" class="form-control">
            <option value="M" {{ $agent->sexe == 'M' ? 'selected' : '' }}>Masculin</option>
            <option value="F" {{ $agent->sexe == 'F' ? 'selected' : '' }}>Féminin</option>
        </select>
    </div>

    {{-- DATE RECRUTEMENT --}}
    <div class="col-md-6 mb-3">
        <label>Date de recrutement</label>
        <input type="date" name="date_recrutement"
               class="form-control"
               value="{{ old('date_recrutement', $agent->date_recrutement) }}">
    </div>

    {{-- STATUT --}}
    <div class="col-md-6 mb-3">
        <label>Statut</label>
        <select name="statut" class="form-control">
            <option value="actif" {{ $agent->statut == 'actif' ? 'selected' : '' }}>Actif</option>
            <option value="inactif" {{ $agent->statut == 'inactif' ? 'selected' : '' }}>Inactif</option>
        </select>
    </div>

    {{-- ADRESSE --}}
    <div class="col-md-12 mb-3">
        <label>Adresse</label>
        <textarea name="adresse" class="form-control">{{ old('adresse', $agent->adresse) }}</textarea>
    </div>

    {{-- PHOTO --}}
    <div class="col-md-6 mb-3">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">

        @if($agent->photo)
            <img src="{{ asset('storage/'.$agent->photo) }}" width="80" class="mt-2">
        @endif
    </div>

</div>

<button type="submit" class="btn btn-success">Mettre à jour</button>
<a href="{{ route('agents.index') }}" class="btn btn-secondary">Annuler</a>

</form>

@endsection