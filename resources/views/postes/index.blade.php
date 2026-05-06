@extends('layouts.layout')
@section('title', 'Liste des Postes')
@section('header', 'Liste des Postes')

@section('content')
<a href="{{ route('postes.create') }}" class="btn btn-primary mb-3">
    Ajouter un Poste
</a>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Service</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($postes as $poste)
        <tr>
            <td>{{ $poste->nom }}</td>
            <td>{{ $poste->description }}</td>
            <td>{{ $poste->service->nom }}</td>
            <td>
                <a href="{{ route('postes.edit', $poste->id) }}" class="btn btn-warning">Modifier</a>

                <a href="{{ route('postes.show', $poste->id) }}" class="btn btn-info">Visualiser</a>

                <form action="{{ route('postes.destroy', $poste->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce poste ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach

        @if(count($postes) == 0)
        <tr>
            <td colspan='4' class='text-center'>
                Aucun poste enregistré pour l'instant.
            </td>
        </tr>
        @endif
    </tbody>
</table>