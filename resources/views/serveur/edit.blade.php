@extends('layouts.app')

<title>{{ __('Modifier un serveur') }}</title>

@section('content')
    <br>
    <div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
        <h2>{{ __('Mise à jour') }}</h2>
        <form action="{{ route('serveur.update', ['serveur' => $serveur->id]) }}" method="post">

            @csrf
            @method('put')

            <div>
                <label for="ip">IP</label>
                <input type="tel" name="ip" id="ip" required value="{{ old('ip', $serveur->ip) }}">

            </div><br>

            <div>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" required maxlength="75"
                    value="{{ old('type', $serveur->type) }}">
            </div><br>

            <div>
                <label for="os">OS</label>
                <input type="text" name="os" id="os" required maxlength="75"
                    value="{{ old('os', $serveur->os) }}">
            </div><br>

            <div>
                <label for="reseau">{{ _('Reseau') }}</label>
                <select name="reseau" id="reseau">
                    @foreach ($reseau as $reseaus)
                        <option value="{{ $reseaus->id }}" {{ $reseaus->id == $serveur->reseau ? 'selected' : '' }}>
                            {{ $reseaus->libelle }}
                        </option>
                    @endforeach
                </select>
            </div><br>


            <div>
                <input type="submit" value="{{ __('Valider') }}" class="btn btn-success">
            </div>

        </form>
    </div>
@endsection
