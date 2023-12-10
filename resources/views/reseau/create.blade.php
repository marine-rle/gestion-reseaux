@extends('layouts.app')

<title>{{ __("Création d'un réseau") }}</title>

@section('content')
    <div class="container mt-5 mb-5">
        <div class="bg-light border p-3 rounded" style="width: 50%; margin: 0 auto;">
            <h2 class="mb-4">{{ __("Création d'un réseau") }}</h2>

            <form action="{{ route('reseau.store') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label for="libelle" class="form-label">{{ __('Libellé') }} :</label><br>
                    <x-input-text property="libelle" class="form-control" :required="true" value="{{ old('libelle') }}" />
                </div><br>

                <div class="mb-3">
                    <label for="lan" class="form-label">{{ __('LAN') }} :</label><br>
                    <x-input-text property="lan" class="form-control" :required="true" value="{{ old('lan') }}" />
                </div><br>

                <div class="mb-3">
                    <x-input-radio />
                </div>

                <div class="mb-3">
                    <input type="submit" value="{{ __('Valider') }}" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
@endsection
