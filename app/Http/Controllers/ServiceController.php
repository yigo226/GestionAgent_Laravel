<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche la liste des enregistrements.
     */
    public function index()
    {
        //
        $services= Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * Affiche le formulaire pour créer un nouvel enregistrement.
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     * Enregistre un nouvel enregistrement dans la base de données.
     */
    public function store(StoreServiceRequest $request)
    {
        //
        $service = new Service(); #  création d'une nouvelle instance de la classe Service
        $service->nom = $request->nom;
        $service->save(); # enregistrement de l'instance dans la base de données
        return redirect()->route('services.index')
                            ->with('success', 'Service créé avec succès.');
    }

    /**
     * Display the specified resource.
     * Affiche le détail d'un enregistrement.
     */
    public function show(Service $service)
    {
        //
        #$service = Service::find($id);
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire pour modifier un enregistrement.
     */
    public function edit(Service $service)
    {
        //
        #$service = Service::find($id);
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     * Met à jour un enregistrement existant dans la base de données.
     */
    public function update(UpdateServiceRequest $request,  Service $service)
    {
        //
        #$service = Service::find($id);
        $service->nom = $request->nom;
        $service->save();
        return redirect()->route('services.index')
                            ->with('success', 'Service mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     * Supprime un enregistrement de la base de données.
     */
    public function destroy(Service $service)
    {
        //
        #$service = Service::find($id);
        $service->delete();
        return redirect()->route('services.index')
                            ->with('success', 'Service supprimé avec succès.');
    }
}
