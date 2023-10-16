<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ServeurRepository;
use App\Http\Requests\SereurRequest;
use App\Models\Serveur;
use App\Models\Reseau;
use Illuminate\Http\Request;

class ServeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serveur = Serveur::all();
        return view('serveur.index', compact('serveur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $reseau = Reseau::all();
        return view('serveur.create', compact('reseau'));
    }

    /*
      Store a newly created resource in storage.
    */

    public function store(Request $request)
    {

        $serveur = new Serveur();
        $serveur->ip = $request->ip;
        $serveur->type = $request->type;
        $serveur->os = $request->os;
        $serveur->reseau = $request->reseau;

        $serveur->save();
        return redirect()->route('serveur.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Serveur $serveur)
    {
        return view('serveur.show', compact('serveur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serveur $serveur)
    {

        $reseau = Reseau::all();
        return view('serveur.edit', compact('reseau','serveur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serveur $serveur)
    {
        $serveur->ip = $request->ip;
        $serveur->type = $request->type;
        $serveur->os = $request->os;
        $serveur->reseau = $request->reseau;
        $serveur->save();

        return redirect()->route('serveur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serveur $serveur)
    {
        $serveur->delete();
        return redirect()->route('serveur.index');
    }
}
