@extends('layouts.layout')

@section('title', 'Liste des Agents')
@section('header', 'Liste des Agents')

@section('content')
<a href="{{ route('agents.create') }}" class="btn btn-primary mb-3">
    Ajouter un Agent
</a>
<table class="table">
<thead>
<tr>
<th>Matricule</th>
<th>Nom</th>
<th>Prénom</th>
<th>Service</th>
<th>Actions</th>
</tr>
</thead>
    <tbody>
        
    @foreach ($agents as $agent)
    <tr>
    <td>{{ $agent->matricule }}</td>
    <td>{{ $agent->nom }}</td>
    <td>{{ $agent->prenom }}</td>
    <td>{{ $agent->service->nom }}</td>
    <td>
    <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-warning">Modifier</a>

    <a href="{{ route('agents.show', $agent->id) }}" class="btn btn-warning">Visualiser</a>
    <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    </td>
    </tr>
    @endforeach
    
    @if(count($agents) == 0) {
        <tr>
            <td colspan='5' class='text-center'>
            Aucun agent enregistré pour l'instant.
            </td>
        </tr>
    }
    @endif

    </tbody>
</table>
@endsection