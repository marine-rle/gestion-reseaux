@extends('layouts.app')

<title>{{ __("Création d'un serveur") }}</title>

@section('content')
    <div class="container mt-5 mb-5">
        <div class="bg-light border p-3 rounded" style="width: 50%; margin: 0 auto;">
            <h2 class="mb-4">{{ __("Création d'un serveur") }}</h2>

            <form action="{{ route('serveur.store') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label for="ip" class="form-label">IP</label><br>
                    <x-input-tel class="form-control" property="ip" :required="true" value="{{ old('ip') }}"/>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label><br>
                    <x-input-text class="form-control" property="type" :required="true" value="{{ old('type') }}" />
                </div>

                <div class="mb-3">
                    <label for="os" class="form-label">OS</label><br>
                    <x-input-text class="form-control" property="os" :required="true" value="{{ old('os') }}" />
                </div>


                <div class="mb-3">
                    <label for="reseau" class="form-label">{{ __('Réseau') }}</label>
                    <select name="reseau" id="reseau" class="form-select">
                        @foreach ($reseau as $reseaus)
                            <option value="{{ $reseaus->id }}">{{ $reseaus->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <input type="submit" value="{{ __('Valider') }}" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
@endsection
