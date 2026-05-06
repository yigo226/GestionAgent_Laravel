<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $agents= Agent::all();
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Service::all();
        return view('agents.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgentRequest $request)
    {
        //
        $agent = new Agent(); #  création d'une nouvelle instance de la classe Agent
        $agent->matricule = $request->matricule;
        $agent->nom = $request->nom;
        $agent->prenom = $request->prenom;
        $agent->telephone = $request->telephone;
        $agent->email = $request->email;
        $agent->service_id = $request->service_id;
        $agent->save(); # enregistrement de l'instance dans la base de données
        return redirect()->route('agents.index')
                            ->with('success', 'Agent créé avec succès.');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
        #$agent = Agent::find($id);
        return view('agents.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
        #$agent = Agent::find($id);
        $services = Service::all();
        return view('agents.edit', compact('agent', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        //
        #$agent = Agent::find($id);
        $agent->matricule = $request->matricule;
        $agent->nom = $request->nom;
        $agent->prenom = $request->prenom;
        $agent->telephone = $request->telephone;
        $agent->email = $request->email;
        $agent->service_id = $request->service_id;
        $agent->save(); # enregistrement de l'instance dans la base de données
        return redirect()->route('agents.index')
                            ->with('success', 'Agent mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
        #$agent = Agent::find($id);
        $agent->delete();
        return redirect()->route('agents.index')
                            ->with('success', 'Agent supprimé avec succès.');
    }
}
