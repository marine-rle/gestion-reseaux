<?php

namespace App\Http\Controllers;
use App\Models\Reseau;
use App\Models\Ordinateur;
use App\Models\Serveur;
use App\Models\Accueil;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reseau = Reseau::all();
        $ordinateur = Ordinateur::all();
        $serveur = Serveur::all();
        return view('accueil.index', compact('reseau', 'ordinateur', 'serveur'));
    }
}
