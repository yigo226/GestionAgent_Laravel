@extends('layouts.layout')

@section('title', 'Liste des Agents')
@section('header', 'Liste des Agents')

@section('content')

<a href="{{ route('agents.create') }}" class="btn btn-primary mb-3">
    Ajouter un Agent
</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Service</th>
            <th>Poste</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($agents as $agent)
            <tr>
                <td>{{ $agent->matricule }}</td>
                <td>{{ $agent->nom }}</td>
                <td>{{ $agent->prenom }}</td>

                <td>
                    {{ $agent->service->nom ?? '---' }}
                </td>
                <td>
                    {{ $agent->poste->nom ?? '---' }}
                </td>
                <td class="d-flex gap-1">

                    <a href="{{ route('agents.edit', $agent->id) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <a href="{{ route('agents.show', $agent->id) }}"
                       class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <form action="{{ route('agents.destroy', $agent->id) }}"
                          method="POST"
                          onsubmit="return confirm('Supprimer cet agent ?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">
                            Supprimer
                        </button>

                    </form>

                </td>
            </tr>
        @empty

            <tr>
                <td colspan="5" class="text-center text-muted">
                    Aucun agent enregistré pour l'instant.
                </td>
            </tr>

        @endforelse

    </tbody>
</table>

@endsection