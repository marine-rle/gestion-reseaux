<h3>Cher {{ Auth::user()->name }},</h3>
<p>Vous avez créé avec succès un nouveau réseau avec les détails suivants :</p>

<ul>
    <li><strong>Libelle: </strong>{{ $reseau->libelle }}</li>
    <li><strong>Lan: </strong>{{ $reseau->lan }}</li>
    <li><strong>Is Disponible: </strong>{{ $reseau->is_disponible }}</li>
</ul>
