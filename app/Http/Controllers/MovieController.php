<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;

class MovieController extends Controller
{
    /* =======================
       Show all movies (home)
    ======================= */
    public function index()
    {
        // 👈 ID ko ascending order me laane ke liye orderBy add kiya
        $movies = Movie::with('categories')
                       ->orderBy('id', 'asc')
                       ->get();

        $movies = Movie::paginate(44);

        return view('home', compact('movies'));
    }

    /* =======================
       Show form to create movie
    ======================= */
    public function create()
    {
        $allCategories = Category::all();
        return view('create', compact('allCategories'));
    }

    /* =======================
       Store new movie
    ======================= */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'image'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'  => 'required|string',
            'categories'   => 'required|array',
            'categories.*' => 'exists:categories,id',
            'screenshots.*'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload poster
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Upload screenshots (if any)
        $screenshots = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/screenshots'), $name);
                $screenshots[] = $name;
            }
        }

        // Create movie
        $movie = Movie::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'image'         => $imageName,
            'story'         => $request->story,
            'cast'          => $request->cast,
            'imdb_rating'   => $request->imdb_rating,
            'review'        => $request->review,
            'screenshots'   => json_encode($screenshots),
            'download_4k'   => $request->download_4k,
            'download_1080p'=> $request->download_1080p,
            'download_720p' => $request->download_720p,
            'download_480p' => $request->download_480p,
        ]);

        // Attach categories
        $movie->categories()->attach($request->categories);

        return redirect()->back()->with('success', 'Movie added successfully!');
    }

    /* =======================
       Show all movies in admin
    ======================= */
    public function showmovies()
    {
        // 👈 Yahan bhi ID ko ascending order me laane ke liye orderBy add kiya
        $movies = Movie::with('categories')
                       ->orderBy('id', 'asc')
                       ->get();

        return view('show', compact('movies'));
    }

    /* =======================
       Show edit form
    ======================= */
    public function edit($id)
    {
        $movie         = Movie::with('categories')->findOrFail($id);
        $allCategories = Category::all();
        return view('edit', compact('movie', 'allCategories'));
    }

    /* =======================
       Update movie
    ======================= */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'categories'   => 'required|array',
            'categories.*' => 'exists:categories,id',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'screenshots.*'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Basic fields
        $movie->title        = $request->title;
        $movie->description  = $request->description;
        $movie->story        = $request->story;
        $movie->cast         = $request->cast;
        $movie->imdb_rating  = $request->imdb_rating;
        $movie->review       = $request->review;
        $movie->download_4k  = $request->download_4k;
        $movie->download_1080p = $request->download_1080p;
        $movie->download_720p  = $request->download_720p;
        $movie->download_480p  = $request->download_480p;

        // Update poster (optional)
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $movie->image = $imageName;
        }

        // Update screenshots (optional)
        if ($request->hasFile('screenshots')) {
            $screenshotNames = [];
            foreach ($request->file('screenshots') as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/screenshots'), $name);
                $screenshotNames[] = $name;
            }
            $movie->screenshots = json_encode($screenshotNames);
        }

        $movie->save();

        // Sync categories
        $movie->categories()->sync($request->categories);

        return redirect()->route('showmovies')->with('success', 'Movie updated successfully!');
    }

    /* =======================
       Delete movie
    ======================= */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        $imagePath = public_path('images/'.$movie->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $movie->categories()->detach();
        $movie->delete();

        return redirect()->back()->with('success', 'Movie deleted successfully!');
    }

    /* =======================
       Category‑wise movies
    ======================= */
  public function categoryWise($categoryName)
{
    $category = Category::where('name', $categoryName)->firstOrFail();

    // 👇 Change get() to paginate()
    $movies = $category->movies()
                       ->with('categories')
                       ->orderBy('id', 'asc')   // optional sorting
                       ->paginate(44);          // ✅ pagination

    return view('home', compact('movies'));
}


    /* =======================
       Store new category
    ======================= */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name|max:255'
        ]);

        Category::create(['name' => $request->name]);

        return back()->with('success', 'Category added successfully!');
    }
}
