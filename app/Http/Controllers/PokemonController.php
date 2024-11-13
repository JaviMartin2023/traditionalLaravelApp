<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('pokemon.index', 
            [
                'lipokemon' => 'active',
                'pokemons' => Pokemon::orderBy('name')->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('pokemon.create', 
        [
            'lipokemon' => 'active',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:pokemon|max:50|min:2',
            'type' => 'required|max:50',
            'evolution' => 'required|integer|min:0',
        ]);

        $pokemon = new Pokemon($request->all());
        try {
            $pokemon = Pokemon::create($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been created.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been created.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        if ($pokemon === null) {
            abort(404);
        }
        return view('pokemon.show', ['lipokemon' => 'active', 'pokemon' => $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', ['lipokemon' => 'active', 'pokemon' => $pokemon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|max:50|min:2|unique:pokemon,name,' . $pokemon->id,
            'type' => 'required|max:50',
            'evolution' => 'required|integer|min:0',
        ]);

        try {
            $pokemon->update($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been updated.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been updated.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        try {
            $pokemon->delete();
            return redirect('pokemon')->with(['message' => 'The pokemon has been deleted.']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The pokemon has not been deleted.']);
        }
    }
}
