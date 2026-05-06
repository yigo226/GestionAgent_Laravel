
@extends('layouts.layout')

@section('title', 'Détails du Service')
@section('header', 'Détails du Service')

@section('content')
<div class="card">
<div class="card-body">
<h5 class="card-title">Nom : {{ $service->nom }}</h5>
<a href="{{ route('services.index') }}" class="btn btn-secondary">Retour à la liste</a>
</form>
</div>
</div>
@endsection

</aside>