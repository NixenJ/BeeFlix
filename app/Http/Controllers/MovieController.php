<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(3);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        // Retrieve all genres for the dropdown
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_date' => 'required|date',
            'description' => 'required|string|max:1000',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get data from the request
        $title = $request->title;
        $genre_id = $request->genre_id;
        $release_date = $request->release_date;
        $description = $request->description;

        // Handle the poster upload
        $posterPath = $request->poster->store('posters', 'public');;
        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $posterPath = $poster->store('public/storage');
        }

        // Insert the movie into the database
        Movie::create([
            'title' => $title,
            'genre_id' => $genre_id,
            'release_date' => $release_date,  // Insert the release_date
            'description' => $description,
            'poster' => $posterPath, // Store the poster if uploaded
        ]);

        // Redirect back to the index page with success message
        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
