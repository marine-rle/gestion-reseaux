@extends('layouts.app')

<title>{{ __('Liste des serveurs')}}</title>

@section('content')
    <br><a href="{{ route('serveur.create') }}" class="btn btn-primary">{{ __('Ajouter')}}</a><br><br>

    @foreach ($serveur as $serveurs)
    <table class="table table-striped table-bordered">
        <td style="width:50%">
            <ul><br>
                <li>IP : {{  $serveurs->ip }}</li>
                <li>Type : {{  $serveurs->type }}</li>
                <li>OS : {{  $serveurs->os }}</li>
                <li>{{ __('Reseau')}} : {{  $serveurs->reseau }}</li>
            </ul>
        </td>

        <td>
            <form method="POST" action="{{ route('serveur.destroy', ['serveur' => $serveurs->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger btn-xs">{{ _('Supprimer')}}</button>
            </form>

            <a href="{{ route('serveur.edit', ['serveur' => $serveurs->id]) }}" class="btn btn-outline-warning btn-xs">{{ __('Modifier')}}</a><br><br>
        </td>
    </table>
    @endforeach


@endsection

