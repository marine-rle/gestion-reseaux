<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OrdinateurRepository;
use App\Http\Requests\OrdinateurRequest;
use App\Models\Ordinateur;
use App\Models\Reseau;
use Illuminate\Http\Request;

class OrdinateurController extends Controller
{

    private $repository;

    public function __construct(OrdinateurRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordinateur = Ordinateur::all();
        return view('ordinateur.index', compact('ordinateur'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reseau = Reseau::all();
        return view('ordinateur.create', compact('reseau'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->repository->store($request);
        return redirect()->route('ordinateur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordinateur $ordinateur)
    {
        return view('ordinateur.show', compact('ordinateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordinateur $ordinateur)
    {
        return view('ordinateur.edit', compact('reseau','ordinateur'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordinateur $ordinateur)
    {
        $this->repository->update($request, $ordinateur);
        return redirect()->route('ordinateur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordinateur $ordinateur)
    {
        $ordinateur->delete();
        return redirect()->route('ordinateur.index');
    }
}
