@extends('layouts.app')

<title>{{ __("Création d'un réseau")}}</title>

@section('content')
<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
  <h2>{{ __("Création d'un réseau")}}</h2>
  <form action="{{ route('reseau.store') }}" method="post">

    @csrf

    <div>
        <label for="libelle">{{ __('Libellé')}} :</label><br>
        <input type="text" name="libelle" id="libelle" required value="{{ old('libelle') }}" maxlength="75">
    </div><br>

    <div>
        <label for="lan">{{ __('LAN')}} :</label><br>
        <input type="text" name="lan" id="lan" required value="{{ old('lan') }}" maxlength="75">
    </div><br>


    <div>

        <label for="is_disponible">{{ __('Disponibilité')}} :</label><br>

        <input type="radio"   value="1" name="is_disponible" id="yes_disponible">
        <label for="yes_disponible">{{ __('Oui')}}</label>

        <input type="radio" value="0" name="is_disponible" id="no_disponible">
        <label for="no_disponible">{{ __('Non')}}</label>

    </div><br>



    <div>
        <input type="submit" value="{{ __('Valider')}}" class="btn btn-success">
    </div>

  </form>
</div>
@endsection
