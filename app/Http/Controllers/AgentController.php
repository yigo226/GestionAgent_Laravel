<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Poste;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $agents= Agent::with(['service', 'poste'])
                        ->latest()
                        ->paginate(10);
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Service::all();
        $postes = Poste::all();
        return view('agents.create', compact('services', 'postes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgentRequest $request)
    {
        $data = $request->validated();

        /*
        Gestion des photos
        */
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->file('image');

            $name = time().'_'.$image->getClientOriginalName();

            $image->move(public_path('photos'), $name);

            $data['image'] = $name;
        }

        Agent::create($data);

        return redirect()
                ->route('agents.index')
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
        $postes = Poste::all();
        
        return view('agents.edit', compact('agent', 'services', 'postes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        $data = $request->validated();

        /*
        Gestion des photos
        */
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->file('image');

            $name = time().'_'.$image->getClientOriginalName();

            $image->move(public_path('photos'), $name);

            $data['image'] = $name;
        }

        $agent->update($data);

        return redirect()
                ->route('agents.index')
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
