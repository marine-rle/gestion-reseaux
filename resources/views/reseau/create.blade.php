@extends('layouts.app')

<title>{{ __("Création d'un réseau")}}</title>

@section('content')
<br><div class="bg-light border p-3" style="width: 50%; border-radius:10%;">
  <h2>{{ __("Création d'un réseau")}}</h2>
  <form action="{{ route('reseau.store') }}" method="post">

    @csrf

    <div>
        <label for="libelle" class="form-label">{{ __('Libellé')}} :</label><br>
        <x-input-text property="libelle"  class="form-control" :required="true" value="{{ old('libelle') }}"/>
    </div><br>

    <div>
        <label for="lan" class="form-label">{{ __('LAN')}} :</label><br>
        <x-input-text property="lan"  class="form-control" :required="true" value="{{ old('lan') }}"/>
    </div><br>


    <div>

        <label for="is_disponible" class="form-label">{{ __('Disponibilité')}} :</label><br>

        <input type="radio"   value="1" name="is_disponible" id="yes_disponible" checked>
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
