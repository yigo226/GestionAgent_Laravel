
@extends('layouts.layout')

@section('title', 'Ajouter un Service')
@section('header', 'Ajouter un Service')

@section('content')
<form action="{{ route('services.store') }}" method="POST">
@csrf
<div class="form-group">
<label for="nom">Nom</label>
<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
@error('nom')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-success">Créer</button>
<a href="{{ route('services.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection

</aside>