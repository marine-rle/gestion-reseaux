@extends('layouts.app')

<title>{{ __('Modifier un serveur') }}</title>

@section('content')
    <div class="container mt-5 mb-5">
        <div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
            <h2>{{ __('Mise à jour') }}</h2>
            <form action="{{ route('serveur.update', ['serveur' => $serveur->id]) }}" method="post">

                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="ip">IP</label>
                    <x-input-text property="ip" :value="old('ip', $reseau->ip)" />

                </div>

                <div class="mb-3">
                    <label for="type">Type</label>
                    <x-input-text property="type" :value="old('type', $reseau->type)" />
                </div><br>

                <div class="mb-3">
                    <label for="os">OS</label>
                    <x-input-text property="os" :value="old('os', $reseau->os)" />
                </div><br>

                <div class="mb-3">
                    <label for="reseau">{{ _('Reseau') }}</label>
                    <select name="reseau" id="reseau">
                        @foreach ($reseau as $reseaus)
                            <option value="{{ $reseaus->id }}" {{ $reseaus->id == $serveur->reseau ? 'selected' : '' }}>
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
    </div>
@endsection
