@extends('layouts.app')

<title>{{ __("Création d'un serveur")}}</title>

@section('content')
<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
    <h2>{{ __("Création d'un serveur")}}</h2>
    <form action="{{ route('serveur.store') }}" method="post">

        @csrf

        <div>
            <label for="ip">IP</label><br>
            <input type="tel" name="ip" id="ip" required value="{{ old('ip') }}" maxlength="75" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}.[0-9]{3}">
        </div><br>

        <div>
            <label for="type">Type</label><br>
            <x-input-text property="type" :required="true" value="{{ old('type') }}" maxlength="75"/>
        </div><br>

        <div>
            <label for="os">OS</label><br>
            <x-input-text property="os" :required="true" value="{{ old('os') }}" maxlength="75"/>
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
