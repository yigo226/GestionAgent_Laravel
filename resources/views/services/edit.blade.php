@extends('layouts.layout')

@section('title', 'Modifier un Service')
@section('header', 'Modifier un Service')

@section('content')
<form action="{{ route('services.update', $service) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
<label for="nom">Nom</label>
<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $service->nom) }}" required>
@error('nom')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-success">Mettre à jour</button>
<a href="{{ route('services.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection