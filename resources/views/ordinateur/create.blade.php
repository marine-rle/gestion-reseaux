@extends('layouts.app')

<title>{{ __("Création d'un ordinateur")}}</title>

@section('content')
<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
    <h2>{{ __("Création d'un ordinateur")}}</h2>
    <form action="{{ route('ordinateur.store') }}" method="post">

        @csrf

        <div>
            <label for="num_serie">{{ __('Numéro de série')}}</label><br>
            <input type="text" name="num_serie" id="num_serie" required value="{{ old('num_serie') }}" maxlength="75">
        </div><br>

        <div>
            <label for="modele">{{ __('Modèle')}}</label><br>
            <input type="text" name="modele" id="modele" required value="{{ old('modele') }}" maxlength="75">
        </div><br>

        <div>
            <label for="marque">{{ __('Marque')}}</label><br>
            <input type="text" name="marque" id="marque" required value="{{ old('marque') }}">
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
