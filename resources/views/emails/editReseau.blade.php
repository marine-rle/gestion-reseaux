<h3>Cher {{ Auth::user()->name }},</h3>
<p>Vous avez modifié avec succès un réseau avec les détails suivants :</p>

<ul>
    <li><strong>Libellé : </strong>{{ $reseau->libelle }}</li>
    <li><strong>Lan : </strong>{{ $reseau->lan }}</li>
    <li><strong>Disponibilité : </strong>{{ $reseau->is_disponible }}</li>
</ul>
