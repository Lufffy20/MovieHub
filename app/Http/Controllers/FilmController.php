<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Film;

class FilmController extends Controller
{
    
    public function show($id)
    {
        $movie = Movie::findOrFail($id); // 👈 used in detail page
        return view('moviedetails', compact('movie'));
    }

   public function editDetails($id)
    {
        $movie = Film::findOrFail($id);
        return view('editdetails', compact('movie')); // 👈 make sure path is correct
    }
 public function updateDetails(Request $request, $id)
    {
        $movie = Film::findOrFail($id);

        $screenshots = $movie->screenshots ?? [];

        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $shot) {
                $screenshots[] = $shot->store('images/screenshots', 'public');
            }
        }

        $movie->update([
            'story' => $request->story,
            'cast' => $request->cast,
            'imdb_rating' => $request->imdb_rating,
            'review' => $request->review,
            'screenshots' => array_map('basename', $screenshots),
            'download_4k' => $request->download_4k,
            'download_1080p' => $request->download_1080p,
            'download_720p' => $request->download_720p,
            'download_480p' => $request->download_480p,
        ]);

        return back()->with('success', 'Movie details updated successfully!');
    }
}
