@extends('layouts.app')

<title>{{ __('Modifier un reseau') }}</title>

@section('content')
    <br>
    <div class="bg-light border p-3 rounded" style="width: 50%; margin: 0 auto;">
        <h2 class="mb-4">{{ __('Mise à jour') }}</h2>

        <form action="{{ route('reseau.update', ['reseau' => $reseau->id]) }}" method="post">

            @csrf
            @method('put')

            <div class="mb-3">
                <label for="libelle">{{ __('Libellé') }}</label>
                <x-input-text property="libelle" :value="old('libelle', $reseau->libelle)"/>
            </div>

            <div class="mb-3">
                <label for="lan">LAN</label>
                <x-input-text property="lan" :value="old('lan', $reseau->lan)"/>
            </div>

            <x-input-radio />

            <div class="mb-3">
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success">
            </div>

        </form>
    </div>
@endsection
