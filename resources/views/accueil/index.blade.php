@extends('layouts.app')

<?php
 $count = 0;
?>
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
                        <ul><br>
                            <li>{{  $reseaus->libelle }}</li>
                        </ul>
                    </td>
                </table>
            @endforeach

        </td>


        <td>

            @foreach ($serveur as $serveurs)

               @if ($serveurs->reseau = $reseaus->id)
                <?php
                $count = $count + 1
                ?>
               @endif
            @endforeach
            {{$count}}
        </td>


        <td>
            <ul>
                <li>s</li>
            </ul>
        </td>

</table>



@endsection

