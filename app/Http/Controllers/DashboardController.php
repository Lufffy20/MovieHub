<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Total movies
        $totalMovies = Movie::count();

        // Total categories
        $totalCategories = Category::count();

        // Movies with download links (non-null check)
        $totalDownloadLinks = Movie::whereNotNull('download_links')->count();

        // Movies with IMDb rating less than 5
        $lowRatedMovies = Movie::where('imdb_rating', '<', 5)->count();

        // Top 5 rated movies by IMDb rating
        $topRatedMovies = Movie::orderByDesc('imdb_rating')
            ->take(5)
            ->get(['title', 'imdb_rating']);

        // Movies uploaded per month (with month name)
        $monthlyUploads = Movie::selectRaw('MONTH(created_at) as month, MONTHNAME(created_at) as month_name, COUNT(*) as count')
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        return view('dashboard', compact(
            'totalMovies',
            'totalCategories',
            'totalDownloadLinks',
            'lowRatedMovies',
            'topRatedMovies',
            'monthlyUploads'
        ));
    }


}
