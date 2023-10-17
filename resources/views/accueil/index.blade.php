@extends('layouts.app')

<title>@yield('title', 'Accueil')</title>

@section('content')

<br><table class="table table-striped table-bordered">

    <tr>
        <th scope="col">Liste des réseaux</th>
        <th scope="col">Nombres de serveurs</th>
        <th scope="col">Nombres d'ordinateurs</th>
    </tr>



        <td>
            @foreach ($reseau as $reseaus)
                <table class="table table-bordered" >
                    <td>
                        <ul>

                                @if ($reseaus->is_disponible == 0)
                                    <p style="color: red">{{  $reseaus->libelle }}</p>

                                @else
                                    <p style="color: green">{{  $reseaus->libelle }}</p>
                                @endif

                        </ul>
                    </td>
                </table>
            @endforeach

        </td>



        <td>
            @foreach ($reseau as $reseaus)
                <table class="table table-bordered" >
                    <td>
                        <ul>
                            <p>Nombre de serveurs : {{ $reseaus->serveur_count }}</p>
                        </ul>
                    </td>

                </table>
            @endforeach
        </td>


        <td>
            @foreach ($reseau as $reseaus)
                <table class="table table-bordered" >
                    <td>
                        <ul>
                            <p>Nombre d'ordinateurs : {{ $reseaus->ordinateur_count }}</p>
                        </ul>
                    </td>
                </table>
            @endforeach
        </td>

</table>



@endsection

