<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use Illuminate\Validation\Rule;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::all();
        return view('parts.list')->with('parts', $parts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatioRules = [
            'name' => 'required|max:20|unique:parts,name',
            'desc' => 'present',
        ];

        $validated = $request->validate($validatioRules);
        Part::create($validated);

        return redirect(route('parts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $part = Part::where('id', $id)->firstOrFail();
        return view('parts.show')->with('part', $part);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $part = Part::where('id', $id)->firstOrFail();
        return view('parts.edit')->with('part', $part);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $part = Part::where('id', $id)->firstOrFail();
        $validatioRules = [
            'name' => [
                'required',
                'max:20',
                Rule::unique('parts')->ignore($part)
            ],
            'desc' => 'present',
        ];

        $validated = $request->validate($validatioRules);
        $part->update($validated);

        return redirect(route('parts.show', ['part' => $part->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $part = Part::where('id', $id)->firstOrFail();
        $part->delete();
        return redirect(route('parts.index'));
    }
}
