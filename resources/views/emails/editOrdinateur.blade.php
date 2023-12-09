<h3>Cher {{ Auth::user()->name }},</h3>
<p>Vous avez modifié avec succès un ordinateur avec les détails suivants :</p>

<ul>
    <li><strong>Numero de série : </strong>{{ $ordinateur->num_serie }}</li>
    <li><strong>Modèle : </strong>{{ $ordinateur->modele }}</li>
    <li><strong>Marque : </strong>{{ $ordinateur->marque }}</li>
    <li><strong>Date de Mise en service : </strong>{{ $ordinateur->date_service }}</li>
    <li><strong>Réseau : </strong>{{ $ordinateur->reseau }}</li>
</ul>
