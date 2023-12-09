<h3>Cher {{ Auth::user()->name }},</h3>
<p>Vous avez modifié avec succès un serveur avec les détails suivants :</p>

<ul>
    <li><strong>Adresse IP : </strong>{{ $serveur->ip }}</li>
    <li><strong>Type : </strong>{{ $serveur->type }}</li>
    <li><strong>OS : </strong>{{ $serveur->os }}</li>
    <li><strong>Réseau : </strong>{{ $serveur->reseau }}</li>
</ul>
