<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Setting;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admino.sidebar');
    }

    // -------------------------------
    // 📊 Reports Section
    // -------------------------------
    public function reports()
    {
        $totalMovies = Movie::count();
        $totalCategories = Category::count();
        $missingDownloads = Movie::whereNull('download_links')->count();
        $lowRatedMovies = Movie::where('imdb_rating', '<', 5)->count();

        $categoryData = Category::withCount('movies')->orderByDesc('movies_count')->get();
        $topCategory = $categoryData->first();

        $chartData = $categoryData->map(function ($cat) {
            return [
                'name' => $cat->name,
                'count' => $cat->movies_count,
            ];
        });

        return view('reports', compact(
            'totalMovies',
            'totalCategories',
            'missingDownloads',
            'lowRatedMovies',
            'topCategory',
            'chartData'
        ));
    }

    // -------------------------------
    // ⚙️ Settings Section
    // -------------------------------
    public function settings()
    {
        $settings = Setting::first();

        // Create default row if not found
        if (!$settings) {
            $settings = Setting::create([
                'site_name' => 'MovieHub',
                'contact_email' => '',
                'footer_text' => '',
            ]);
        }

        return view('settings', compact('settings'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $user = Auth::user();
        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'              => 'required',
            'new_password'                  => 'required|min:6|confirmed',
            'new_password_confirmation'     => 'required'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password changed successfully.');
    }

    public function updateWebsiteSettings(Request $request)
    {
        $request->validate([
            'site_name'     => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'footer_text'   => 'nullable|string|max:255'
        ]);

        $settings = Setting::first();

        if (!$settings) {
            $settings = new Setting();
        }

        $settings->site_name = $request->site_name;
        $settings->contact_email = $request->contact_email;
        $settings->footer_text = $request->footer_text;
        $settings->save();

        return back()->with('success', 'Website settings updated.');
    }
}
