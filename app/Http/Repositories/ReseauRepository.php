<?php

namespace App\Http\Repositories;

use App\Models\Reseau;

class ReseauRepository
{


    public function store($request)
    {
        $reseau = new Reseau();
        $reseau->libelle = $request->libelle;
        $reseau->lan = $request->lan;
        $reseau->is_disponible = $request->is_disponible;

        $reseau->save();
    }

    public function update( $request, $reseau)
    {
        $reseau->libelle = $request->libelle;
        $reseau->lan = $request->lan;
        $reseau->is_disponible = $request->is_disponible;

        $reseau->save();
    }



}
