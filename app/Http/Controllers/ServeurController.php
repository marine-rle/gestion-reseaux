<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ServeurRepository;
use App\Http\Requests\SereurRequest;
use App\Mail\CreateServeurMail;
use App\Mail\EditServeurMail;
use App\Models\Serveur;
use App\Models\Reseau;
use Illuminate\Http\Request;
use Mail;
use Auth;
use App\Mail\InfoMail;


class ServeurController extends Controller
{
    private $repository;

    public function __construct(ServeurRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware("technicien", ["only"=> ["create","destroy", "edit"]]);
    }

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

    public function store(Request $request, Serveur $serveur)
    {
        $serveur = $this->repository->store($request);
        Mail::to(Auth::user()->email)->send(new CreateServeurMail($serveur));
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
        $this->repository->update($request, $serveur);
        Mail::to(Auth::user()->email)->send(new EditServeurMail($serveur));
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
