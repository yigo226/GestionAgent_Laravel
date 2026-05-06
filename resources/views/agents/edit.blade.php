@extends('layouts.layout')

@section('title', 'Modifier un Agent')
@section('header', 'Modifier un Agent')

@section('content')
<form action="{{ route('agents.update', $agent->id) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
<label for="matricule">Matricule</label>
<input type="text" class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" value="{{ old('matricule', $agent->matricule) }}" required>
@error('matricule')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="nom">Nom</label>
<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $agent->nom) }}" required>
@error('nom')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="prenom">Prénom</label>
<input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom', $agent->prenom) }}" required>
@error('prenom')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="telephone">Téléphone</label>
<input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', $agent->telephone) }}" required>
@error('telephone')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $agent->email) }}" required>
@error('email')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="service_id">Service</label>
<select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required>
@foreach ($services as $service)
<option value="{{ $service->id }}" {{ old('service_id', $agent->service_id) == $service->id ? 'selected' : '' }}>
{{ $service->nom }}
</option>
@endforeach
</select>
@error('service_id')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-success">Mettre à jour</button>
<a href="{{ route('agents.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection