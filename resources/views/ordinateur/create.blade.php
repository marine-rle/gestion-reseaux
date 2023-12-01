@extends('layouts.app')

<title>{{ __("Création d'un ordinateur")}}</title>

@section('content')
<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
    <h2>{{ __("Création d'un ordinateur")}}</h2>
    <form action="{{ route('ordinateur.store') }}" method="post">

        @csrf

        <div>
            <label for="num_serie">{{ __('Numéro de série')}}</label><br>
            <input type="number" name="num_serie" id="num_serie" required value="{{ old('num_serie') }}" maxlength="75">
        </div><br>

        <div>
            <label for="modele">{{ __('Modèle')}}</label><br>
            <x-input-text property="modele" :required="true" value="{{ old('modele') }}" maxlength="75"/>
        </div><br>

        <div>
            <label for="marque">{{ __('Marque')}}</label><br>
            <x-input-text property="marque" :required="true" value="{{ old('marque') }}" maxlength="75"/>

        </div><br>

        <div>
            <label for="date_service">{{ __('Date de mise en service')}}</label><br>
            <input type="date" name="date_service" id="date_service" required value="{{ old('date_service') }}">
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
