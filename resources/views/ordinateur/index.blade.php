@extends('layouts.app')

<title>@yield('title', 'Liste des ordinateurs')</title>

@section('content')
<br><a href="{{ route('ordinateur.create') }}" class="btn btn-primary">Ajouter</a><br/><br/>

    @foreach ($ordinateur as $ordinateurs)
    <table class="table table-striped table-bordered">
        <td style="width:50%">
            <ul><br>
                <li>Numéro de série : {{  $ordinateurs->num_serie }}</li>
                <li>Type : {{  $ordinateurs->modele }}</li>
                <li>Marque : {{  $ordinateurs->marque }}</li>
                <li>Date de mise en service : {{  $ordinateurs->date_service }}</li>
                <li>Reseau : {{  $ordinateurs->reseau }}</li>
            </ul>
        </td>

        <td>
            <form method="POST" action="{{ route('ordinateur.destroy', ['ordinateur' => $ordinateurs->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger btn-xs">Supprimer</button>
            </form>

            <a href="{{ route('ordinateur.edit', ['ordinateur' => $ordinateurs->id]) }}" class="btn btn-outline-warning btn-xs">Modifier</a><br><br>
        </td>
    </table>
    @endforeach


@endsection

