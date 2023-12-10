@extends('layouts.app')

<title>{{ __('Modifier un ordinateur') }}</title>

@section('content')
<div class="container mt-5 mb-5">
    <div class="bg-light border p-3 rounded" style="width: 50%; margin: 0 auto;">
        <h2 class="mb-4">{{ __('Mise à jour') }}</h2>

        <form action="{{ route('ordinateur.update', ['ordinateur' => $ordinateur->id]) }}" method="post">

            @csrf
            @method('put')

            <div  class="mb-3">
                <label for="num_serie" class="form-label">{{ __('Numéro de série') }} </label>
                <x-input-number property="num_serie" :value="old('num_serie', $ordinateur->num_serie)"/>
            </div>

            <div class="mb-3">
                <label for="modele" class="form-label">{{ __('Modèle') }}</label>
                <x-input-text property="modele" :value="old('modele', $ordinateur->modele)" />
            </div>

            <div class="mb-3">
                <label for="marque" class="form-label">{{ __('Marque') }}</label>
                <x-input-text property="marque" :value="old('marque', $ordinateur->marque)"/>
            </div>

            <div class="mb-3">
                <label for="date_service" class="form-label">{{ __('Date de mise en service') }}</label>
                <x-input-date property="date_service" :value="old('date_service', $ordinateur->date_service)" />
            </div>

            <div class="mb-3">
                <label for="reseau" class="form-label">{{ __('Reseau') }}</label>
                <select name="reseau" id="reseau" class="form-select">
                    @foreach ($reseau as $reseaus)
                        <option value="{{ $reseaus->id }}"
                            {{ $reseaus->id == $ordinateur->reseau ? 'selected' : '' }}>
                            {{ $reseaus->libelle }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            <div class="mb-3">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success">
            </div>

        </form>
    </div>
@endsection
