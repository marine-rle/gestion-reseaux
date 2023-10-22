@extends('layouts.app')

<title>{{ __('Modifier un ordinateur')}}</title>

@section('content')

<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
  <br><h2>{{ __('Mise à jour')}}</h2>

  <form action="{{ route('ordinateur.update', ['ordinateur' => $ordinateur->id]) }}" method="post">

    @csrf
    @method('put')

    <div>
      <label for="num_serie">{{ __('Numéro de série')}} </label>
      <input type="number" name="num_serie" id="num_serie" required maxlength="75" value="{{ old('num_serie', $ordinateur->num_serie) }}">
    </div><br>

    <div>
      <label for="modele">{{ __('Modèle')}}</label>
      <input type="text" name="modele" id="modele" required maxlength="75" value="{{ old('modele', $ordinateur->modele) }}">
    </div><br>

    <div>
        <label for="marque">{{ __('Marque')}}</label>
        <input type="text" name="marque" id="marque" required maxlength="75" value="{{ old('marque', $ordinateur->marque) }}">
    </div><br>

    <div>
      <label for="date_service">{{ __('Date de mise en service')}}</label>
      <input type="date" name="date_service" id="date_service" required value="{{ old('date_service', $ordinateur->date_service) }}">
    </div><br>

    <div>
      <label for="reseau">{{ __('Reseau')}}</label>
      <select name="reseau" id="reseau">
        @foreach ($reseau as $reseaus)
          <option value="{{ $reseaus->id }}" {{ $reseaus->id == $ordinateur->reseau ? 'selected' : '' }}>
            {{ $reseaus->libelle }}
          </option>
        @endforeach
      </select>
    </div><br>

    <div>
      <input type="submit" value="{{ __('Valider')}}" class="btn btn-success">
    </div>

  </form>
</div>
@endsection
