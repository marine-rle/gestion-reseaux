@extends('layouts.app')

<title>{{ __('Liste des ordinateurs')}}</title>

@section('content')
<br><a href="{{ route('ordinateur.create') }}" class="btn btn-primary">{{ __('Ajouter')}}</a><br/><br/>

    @foreach ($ordinateur as $ordinateurs)
    <table class="table table-striped table-bordered">
        <td style="width:50%">
            <ul><br>
                <li>{{ __('Numéro de série')}} : {{  $ordinateurs->num_serie }}</li>
                <li>{{ __('Modèle')}} : {{  $ordinateurs->modele }}</li>
                <li>{{ __('Marque')}} : {{  $ordinateurs->marque }}</li>
                <li>{{ __('Date de mise en service')}} : {{  $ordinateurs->date_service }}</li>
                <li>{{ __('Reseau')}} : {{  $ordinateurs->reseau }}</li>
            </ul>
        </td>

        <td>
            <form method="POST" action="{{ route('ordinateur.destroy', ['ordinateur' => $ordinateurs->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger btn-xs">{{ __('Supprimer')}}</button>
            </form>

            <a href="{{ route('ordinateur.edit', ['ordinateur' => $ordinateurs->id]) }}" class="btn btn-outline-warning btn-xs">{{ __('Modifier')}}</a><br><br>
        </td>
    </table>
    @endforeach


@endsection

