@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Liste des ordinateurs')}}</h1>
    <br>
    <a href="{{ route('ordinateur.create') }}" class="btn btn-primary">{{ __('Ajouter')}}</a>
    <br><br/>

    @foreach ($ordinateur as $ordinateurs)
    <div class="card mb-3">
        <div class="card-body">
            <ul class="list-unstyled">
                <li>{{ __('Numéro de série')}} : {{  $ordinateurs->num_serie }}</li>
                <li>{{ __('Modèle')}} : {{  $ordinateurs->modele }}</li>
                <li>{{ __('Marque')}} : {{  $ordinateurs->marque }}</li>
                <li>{{ __('Date de mise en service')}} : {{  $ordinateurs->date_service }}</li>
                <li>{{ __('Reseau')}} : {{  $ordinateurs->reseau }}</li>
            </ul>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <form method="POST" action="{{ route('ordinateur.destroy', ['ordinateur' => $ordinateurs->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger">{{ __('Supprimer')}}</button>
            </form>

            <a href="{{ route('ordinateur.edit', ['ordinateur' => $ordinateurs->id]) }}" class="btn btn-outline-warning">{{ __('Modifier')}}</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
