<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Tag;
use App\Models\Part;
use Illuminate\Validation\Rule;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();
        return view('words.list')->with('words', $words);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parts = Part::all();
        $tag = Tag::all();
        return view('words.add')->with('parts', $parts)->with('tags', $tag);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatioRules = [
            'beta' => 'required|max:300',
            'tag_id' => 'required|exists:tags,id',
            'alpha' => [
                'required',
                'max:300',
                Rule::unique('words')->where(function ($query) use ($request) {
                    return $query->where('alpha', $request->alpha)
                    ->where('part_id', $request->part_id);
                })
            ],
            'part_id' => [
                'required',
                'exists:parts,id',
                Rule::unique('words')->where(function ($query) use ($request) {
                    return $query->where('alpha', $request->alpha)
                    ->where('part_id', $request->part_id);
                })
            ],
        ];

        $validated = $request->validate($validatioRules);
        Word::create($validated);

        return redirect(route('words.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $word = Word::where('id', $id)->firstOrFail();
        return view('words.show')->with('word', $word);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $word = Word::where('id', $id)->firstOrFail();
        $parts = Part::all();
        $tag = Tag::all();
        return view('words.edit')->with('word', $word)->with('parts', $parts)->with('tags', $tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $word = Word::where('id', $id)->firstOrFail();
        $validatioRules = [
            'beta' => 'required|max:300',
            'tag_id' => 'required|exists:tags,id',
            'alpha' => [
                'required',
                'max:300',
                Rule::unique('words')->where(function ($query) use ($request) {
                    return $query->where('alpha', $request->alpha)
                    ->where('part_id', $request->part_id);
                })->ignore($word)
            ],
            'part_id' => [
                'required',
                'exists:parts,id',
                Rule::unique('words')->where(function ($query) use ($request) {
                    return $query->where('alpha', $request->alpha)
                    ->where('part_id', $request->part_id);
                })->ignore($word)
            ],
        ];

        $validated = $request->validate($validatioRules);
        $word->update($validated);

        return redirect(route('words.show', ['word' => $word->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $word = Word::where('id', $id)->firstOrFail();
        $word->delete();
        return redirect(route('words.index'));
    }
}
