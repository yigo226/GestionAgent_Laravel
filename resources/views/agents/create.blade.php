
@extends('layouts.layout')

@section('title', 'Ajouter un Agent')
@section('header', 'Ajouter un Agent')

@section('content')
<form action="{{ route('agents.store') }}" method="POST">
@csrf
<div class="form-group">
<label for="matricule">Matricule</label>
<input type="text" class="form-control @error('matricule') is-invalid @enderror" id="matricule" name="matricule" value="{{ old('matricule') }}" required>
@error('matricule')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="nom">Nom</label>
<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
@error('nom')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="prenom">Prénom</label>
<input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
@error('prenom')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="telephone">Téléphone</label>
<input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
@error('telephone')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
@error('email')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
<label for="service_id">Service</label>
<select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required>
@foreach ($services as $service)
<option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
{{ $service->nom }}
</option>
@endforeach
</select>
@error('service_id')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-success">Créer</button>
<a href="{{ route('agents.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection