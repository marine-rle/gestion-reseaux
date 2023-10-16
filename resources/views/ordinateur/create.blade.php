@extends('layouts.app')

<title>@yield('title', 'Création ordinateur')</title>

@section('content')
    <h2>Création</h2>
    <form action="{{ route('ordinateur.store') }}" method="post">

        @csrf

        <div>
            <label for="num_serie">Numero de serie</label></br>
            <input type="text" name="num_serie" id="num_serie" required value="{{ old('num_serie') }}" maxlength="75">
        </div></br>

        <div>
            <label for="modele">Modele</label></br>
            <input type="text" name="modele" id="modele" required value="{{ old('modele') }}" maxlength="75">
        </div></br>

        <div>
            <label for="marque">Marque</label></br>
            <input type="text" name="marque" id="marque" required value="{{ old('marque') }}">
        </div></br>

        <div>
            <label for="date_service">Date de mise en service</label></br>
            <input type="date" name="date_service" id="date_service" required value="{{ old('date_service') }}">
        </div></br>



        <div>
            <label for="reseau">Reseau</label>
            <select name="reseau" id="reseau">
                @foreach ($reseau as $reseaus)
                    <option value="{{ $reseaus->id }}">{{ $reseaus->libelle }}</option>
                @endforeach
            </select>
        </div></br>

        <div>
            <input type="submit" value="Valider" class="btn btn-success">
        </div>

    </form>
@endsection
