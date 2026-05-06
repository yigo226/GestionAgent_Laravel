<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Http\Requests\StorePosteRequest;
use App\Http\Requests\UpdatePosteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $postes = Poste::with('service')->get();
        return view('postes.index', compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Service::all();
        return view('postes.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePosteRequest $request)
    {
        //
        $poste = new Poste();
        $poste->nom = $request->nom;
        $poste->description = $request->description;
        $poste->service_id = $request->service_id;
        $poste->save();
        return redirect()->route('postes.index')
                            ->with('success', 'Poste créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poste $poste)
    {
        //
        #$poste = Poste::find($id);
        return view('postes.show', compact('poste'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poste $poste)
    {
        $services = Service::all();
        return view('postes.edit', compact('poste', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePosteRequest $request, $id)
    {
        //
        $poste = Poste::find($id);
        $poste->nom = $request->nom;
        $poste->description = $request->description;
        $poste->service_id = $request->service_id;
        $poste->save();
        return redirect()->route('postes.index')
                            ->with('success', 'Poste mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poste $poste)
    {
        //
        #$poste =  Poste::find($id);
        $poste->delete();
        return redirect()->route('postes.index')
                            ->with('success', 'Poste supprimé avec succès.');
    }
}
