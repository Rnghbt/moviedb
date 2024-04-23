<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $movies = Movie::latest()
            ->where('title', 'like', '%' . $search . '%')
            ->get();
        return view('movies.index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'actors' => 'required',
            'year' => 'required',
            'trailer' => 'required',
            'poster' => 'required',
            'plot' => 'required',
        ]);
        $validated['poster'] = $request->file('poster')->store('image', 'public');
        Movie::create($validated);
        return redirect()->route('movies.index');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required',
            'actors' => 'required',
            'year' => 'required',
            'trailer' => 'required',
            'plot' => 'required',
        ]);
        if ($request->file('poster')) {

            $validated['poster'] = $request->file('poster')->store('image', 'public');
            Storage::delete($movie->poster);
        }
        $movie->update($validated);
        return redirect()->route('movies.index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
