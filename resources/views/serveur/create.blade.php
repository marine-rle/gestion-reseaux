@extends('layouts.app')

<title>{{ __("Création d'un serveur")}}</title>

@section('content')
<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
    <h2>{{ __("Création d'un serveur")}}</h2>
    <form action="{{ route('serveur.store') }}" method="post">

        @csrf

        <div>
            <label for="ip">IP</label><br>
            <input type="number" name="ip" id="ip" required value="{{ old('ip') }}" maxlength="75">
        </div><br>

        <div>
            <label for="type">Type</label><br>
            <input type="text" name="type" id="type" required value="{{ old('type') }}" maxlength="75">
        </div><br>

        <div>
            <label for="os">OS</label><br>
            <input type="text" name="os" id="os" required value="{{ old('os') }}">
        </div><br>


        <div>
            <label for="reseau">{{ __('Reseau')}}</label>
            <select name="reseau" id="reseau">
                @foreach ($reseau as $reseaus)
                    <option value="{{ $reseaus->id }}">{{ $reseaus->libelle }}</option>
                @endforeach
            </select>
        </div><br>

        <div>
        <input type="submit" value="{{ __('Valider')}}" class="btn btn-success">
        </div>

    </form>
</div>
@endsection
