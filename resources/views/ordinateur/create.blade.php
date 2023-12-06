@extends('layouts.app')

<title>{{ __("Création d'un ordinateur") }}</title>

@section('content')
    <div class="container mt-5 mb-5">
        <div class="bg-light border p-3 rounded" style="width: 50%; margin: 0 auto;">
            <h2 class="mb-4">{{ __("Création d'un ordinateur")}}</h2>

            <form action="{{ route('ordinateur.store') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label for="num_serie" class="form-label">{{ __('Numéro de série')}}</label>
                    <x-input-number class="form-control" property="num_serie" :required="true" value="{{ old('num_serie') }}" />
                </div>

                <div class="mb-3">
                    <label for="modele" class="form-label">{{ __('Modèle')}}</label>
                    <x-input-text class="form-control" property="modele" :required="true" value="{{ old('modele') }}"/>
                </div>

                <div class="mb-3">
                    <label for="marque" class="form-label">{{ __('Marque')}}</label>
                    <x-input-text class="form-control" property="marque" :required="true" value="{{ old('marque') }}"/>
                </div>

                <div class="mb-3">
                    <label for="date_service" class="form-label">{{ __('Date de mise en service')}}</label>
                    <x-input-date class="form-control" property="date_service" :required="true" value="{{ old('date_service') }}"/>
                </div>

                <div class="mb-3">
                    <label for="reseau" class="form-label">{{ __('Réseau')}}</label>
                    <select name="reseau" id="reseau" class="form-select">
                        @foreach ($reseau as $reseaus)
                            <option value="{{ $reseaus->id }}">{{ $reseaus->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <input type="submit" value="{{ __('Valider')}}" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
@endsection
