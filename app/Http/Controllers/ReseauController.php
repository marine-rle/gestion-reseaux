<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ReseauRepository;
use App\Https\Requests\ReseauRequest;
use App\Models\Reseau;
use Illuminate\Http\Request;

class ReseauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reseau = Reseau::all();
        return view('reseau.index', compact('reseau'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reseau.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reseau = new Reseau();
        $reseau->libelle = $request->libelle;
        $reseau->lan = $request->lan;
        $reseau->is_disponible = $request->is_disponible;

        $reseau->save();
        return redirect()->route('reseau.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reseau $reseau)
    {
        return view('reseau.show', compact('reseau'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reseau $reseau)
    {
        $reseau = Reseau::all();
        return view('reseau.edit', compact('reseau'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reseau $reseau)
    {
        $reseau->libelle = $request->libelle;
        $reseau->lan = $request->lan;
        $reseau->is_disponible = $request->is_disponible;

        $reseau->save();

        return redirect()->route('reseau.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reseau $reseau)
    {
        $reseau->delete();
        return redirect()->route('reseau.index');
    }
}
