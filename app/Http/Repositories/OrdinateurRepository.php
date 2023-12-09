<?php

namespace App\Http\Repositories;

use App\Models\Ordinateur;

class OrdinateurRepository
{


    public function store( $request)
    {
        $ordinateur = new Ordinateur();
        $ordinateur->num_serie = $request->num_serie;
        $ordinateur->modele = $request->modele;
        $ordinateur->marque = $request->marque;
        $ordinateur->date_service = $request->date_service;
        $ordinateur->reseau = $request->reseau;

        $ordinateur->save();
        return $ordinateur;
    }


    public function update($request, $ordinateur)
    {
        $ordinateur->num_serie = $request->num_serie;
        $ordinateur->modele = $request->modele;
        $ordinateur->marque = $request->marque;
        $ordinateur->date_service = $request->date_service;
        $ordinateur->reseau = $request->reseau;

        $ordinateur->save();
    }


}
