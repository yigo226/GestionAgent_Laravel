@extends('layouts.layout')
@section('title', 'Modifier un Poste')
@section('header', 'Modifier un Poste')
@section('content')
<form action="{{ route('postes.update', $poste) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror"
        id="nom" name="nom" value="{{ old('nom', $poste->nom) }}" required>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror*
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $poste->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="service_id">Service</label>
        <select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id" required>
        @foreach ($services as $service)
        <option value="{{ $service->id }}" {{ old('service_id', $poste->service_id) == $service->id ? 'selected' : '' }}>
        {{ $service->nom }}
        </option>
        @endforeach
        </select>
        @error('service_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Mettre à jour</button
    <a href="{{ route('postes.index') }}" class="btn btn-secondary">Annuler</a>
</form>
