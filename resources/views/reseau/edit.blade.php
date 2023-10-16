@extends('layouts.app')

<title>@yield('title', 'Modifier reseau')</title>

@section('content')
  <h2>Mise à jour</h2>

  <form action="{{ route('reseau.update', ['reseau' => $reseau->id]) }}" method="post">

    @csrf
    @method('put')

    <div>
      <label for="libelle">Libellé</label>
      <input type="text" name="libelle" id="libelle" required maxlength="75" value="{{ old('libelle', $reseau->libelle) }}">
    </div>

    <div>
      <label for="lan">LAN</label>
      <input type="text" name="lan" id="lan" required maxlength="75" value="{{ old('lan', $reseau->lan) }}">
    </div>

    <div>

        <label for="is_disponible">Disponibilité :</label></br>

        <input type="radio"  value="1" name="is_disponible" id="yes_disponible">
        <label for="yes_disponible">Oui</label>

        <input type="radio" value="0" name="is_disponible" id="no_disponible">
        <label for="no_disponible">Non</label>

    </div></br>



    <div>
      <input type="submit" value="Valider" class="btn btn-success">
    </div>

  </form>
@endsection
