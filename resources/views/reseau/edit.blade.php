@extends('layouts.app')

<title>{{ __('Modifier un reseau')}}</title>

@section('content')

<br><div class="bg-light border p-3 rounded" style="width: 50%; margin: 0 auto;">
  <h2 class="mb-4">{{ __('Mise à jour')}}</h2>

  <form action="{{ route('reseau.update', ['reseau' => $reseau->id]) }}" method="post">

    @csrf
    @method('put')

    <div class="mb-3">
      <label for="libelle">{{ __('Libellé')}}</label>
      <input type="text" name="libelle" id="libelle" required maxlength="75" value="{{ old('libelle', $reseau->libelle) }}">
    </div>

    <div class="mb-3">
      <label for="lan">LAN</label>
      <input type="text" name="lan" id="lan" required maxlength="75" value="{{ old('lan', $reseau->lan) }}">
    </div>

    <div class="mb-3">

        <label for="is_disponible">{{ __('Disponibilité')}} :</label><br>

        <input type="radio"  value="1" name="is_disponible" id="yes_disponible">
        <label for="yes_disponible">{{ __('Oui')}}</label>

        <input type="radio" value="0" name="is_disponible" id="no_disponible">
        <label for="no_disponible">{{ __('Non')}}</label>

    </div>

    <div class="mb-3">
      <input type="submit" value="{{ __('Valider')}}" class="btn btn-success">
    </div>

  </form>
</div>
@endsection
