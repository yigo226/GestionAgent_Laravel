@extends('layouts.layout')
@section('title','Liste des Services')
@section('header','Liste des Services')

@section('content')
<a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Ajouter un service</a>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{ $service->nom }}</td>
            <td>
                <a href="{{ route('services.edit', $service->id) }}" 
                    class="btn btn-sm btn-warning">Modifier</a>
                    
                <a href="{{ route('services.show', $service->id) }}" 
                    class="btn btn-sm btn-info">Voir</a>

                <form action="{{ route('services.destroy', $service->id) }}" method="POST" 
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection