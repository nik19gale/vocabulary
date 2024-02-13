<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.list')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatioRules = [
            'name' => 'required|max:30|unique:tags,name',
            'limit' => 'required|integer',
            'desc' => 'present',
        ];

        $validated = $request->validate($validatioRules);
        Tag::create($validated);

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        return view('tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $validatioRules = [
            'name' => [
                'required',
                'max:30',
                Rule::unique('tags')->ignore($tag)
            ],
            'limit' => 'required|integer',
            'desc' => 'present',
        ];

        $validated = $request->validate($validatioRules);
        $tag->update($validated);

        return redirect(route('tags.show', ['tag' => $tag->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $tag->delete();
        return redirect(route('tags.index'));
    }
}
