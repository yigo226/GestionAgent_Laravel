@extends('layouts.layout')

@section('title', 'Ajouter un Poste')
@section('header', 'Ajouter un Poste')

@section('content')
<form action="{{ route('postes.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror"
        id="nom" name="nom" value="{{ old('nom') }}" required>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
        @error('description')
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
    <a href="{{ route('postes.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
