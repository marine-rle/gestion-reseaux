@extends('layouts.app')

<title>@yield('title', 'Modifier ordinateur')</title>

@section('content')
  <h2>Mise à jour</h2>

  <form action="{{ route('ordinateur.update', ['ordinateur' => $ordinateur->id]) }}" method="post">

    @csrf
    @method('put')

    <div>
      <label for="num_serie">Numéro de série </label>
      <input type="number" name="num_serie" id="num_serie" required maxlength="75" value="{{ old('num_serie', $ordinateur->num_serie) }}">
    </div>

    <div>
      <label for="modele">Modele</label>
      <input type="text" name="modele" id="modele" required maxlength="75" value="{{ old('modele', $ordinateur->modele) }}">
    </div>

    <div>
        <label for="marque">Marque</label>
        <input type="text" name="marque" id="marque" required maxlength="75" value="{{ old('marque', $ordinateur->marque) }}">
      </div>

    <div>
      <label for="date_service">Date de mise en service</label>
      <input type="date" name="date_service" id="date_service" required value="{{ old('date_service', $ordinateur->date_service) }}">
    </div>

    <div>
      <label for="reseau">Reseau</label>
      <select name="reseau" id="reseau">
        @foreach ($reseau as $reseaus)
          <option value="{{ $reseaus->id }}" {{ $reseaus->id == $ordinateur->reseau ? 'selected' : '' }}>
            {{ $reseaus->libelle }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <input type="submit" value="Valider" class="btn btn-success">
    </div>

  </form>
@endsection
