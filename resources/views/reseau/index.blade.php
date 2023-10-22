@extends('layouts.app')

<title>{{ __('Liste des réseaux')}}</title>

@section('content')
    <br><a href="{{ route('reseau.create') }}" class="btn btn-primary">{{ __('Ajouter')}}</a><br><br>

    @foreach ($reseau as $reseaus)
    <table class="table table-striped table-bordered">
        <td style="width:50%">
            <ul><br>
                <li>{{ __('Libellé')}} : {{  $reseaus->libelle }}</li>
                <li>{{ __('LAN')}} : {{  $reseaus->lan }}</li>
                <li>{{ __('Disponibilité')}} : {{  $reseaus->is_disponible }}</li>
            </ul>
        </td>
        <td>
            <form method="POST" action="{{ route('reseau.destroy', ['reseau' => $reseaus->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger btn-xs">{{ __('Supprimer')}}</button>
            </form>

            <a href="{{ route('reseau.edit', ['reseau' => $reseaus->id]) }}" class="btn btn-outline-warning btn-xs">{{ __('Modifier')}}</a><br><br>
        </td>
    </table>
    @endforeach


@endsection

