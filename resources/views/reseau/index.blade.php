@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Liste des réseaux')}}</h1>
    <br>
    <a href="{{ route('reseau.create') }}" class="btn btn-primary">{{ __('Ajouter')}}</a>
    <br><br>

    @foreach ($reseau as $reseaus)
    <div class="card mb-3">
        <div class="card-body">
            <ul class="list-unstyled">
                <li>{{ __('Libellé')}} : {{  $reseaus->libelle }}</li>
                <li>{{ __('LAN')}} : {{  $reseaus->lan }}</li>
                <li>{{ __('Disponibilité')}} : {{  $reseaus->is_disponible }}</li>
            </ul>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <form method="POST" action="{{ route('reseau.destroy', ['reseau' => $reseaus->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger">{{ __('Supprimer')}}</button>
            </form>

            <a href="{{ route('reseau.edit', ['reseau' => $reseaus->id]) }}" class="btn btn-outline-warning">{{ __('Modifier')}}</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
