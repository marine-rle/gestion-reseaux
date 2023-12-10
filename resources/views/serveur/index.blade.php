@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Liste des serveurs')}}</h1>
    <br>
        <x-add-button :route="route('serveur.create')" />
    <br><br>

    @foreach ($serveur as $serveurs)
    <div class="card mb-3">
        <div class="card-body">
            <ul class="list-unstyled">
                <li>IP : {{  $serveurs->ip }}</li>
                <li>Type : {{  $serveurs->type }}</li>
                <li>OS : {{  $serveurs->os }}</li>
                <li>{{ __('Reseau')}} : {{  $serveurs->reseau }}</li>
            </ul>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <form method="POST" action="{{ route('serveur.destroy', ['serveur' => $serveurs->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger">{{ __('Supprimer')}}</button>
            </form>

            <a href="{{ route('serveur.edit', ['serveur' => $serveurs->id]) }}" class="btn btn-outline-warning">{{ __('Modifier')}}</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
