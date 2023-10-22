@extends('layouts.app')

<title>{{ __('Accueil')}}</title>

@section('content')


<br><table class="table table-striped table-bordered">

    <tr>
        <th scope="col">{{ __("Liste des réseaux")}}</th>
        <th scope="col">{{ __("Nombres de serveurs")}}</th>
        <th scope="col">{{ __("Nombres d'ordinateurs")}}</th>
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
                            <p>{{ __('Nombres de serveurs')}} :</p>
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
                            <p>{{ __("Nombres d'ordinateurs")}} :</p>
                        </ul>
                    </td>
                </table>
            @endforeach
        </td>

</table>




@endsection

