<?php

namespace App\Http\Repositories;

use App\Models\Serveur;

class ServeurRepository
{


    public function store( $request)
    {

        $serveur = new Serveur();
        $serveur->ip = $request->ip;
        $serveur->type = $request->type;
        $serveur->os = $request->os;
        $serveur->reseau = $request->reseau;

        $serveur->save();
    }

    public function update( $request,  $serveur)
    {
        $serveur->ip = $request->ip;
        $serveur->type = $request->type;
        $serveur->os = $request->os;
        $serveur->reseau = $request->reseau;
        $serveur->save();

    }


}
