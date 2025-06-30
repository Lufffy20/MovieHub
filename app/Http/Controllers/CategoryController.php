<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

public function storeCategory(Request $request)
{
    $request->validate([
        'name' => 'required|string|unique:categories,name|max:255'
    ]);

    Category::create(['name' => $request->name]);

    return back()->with('success', 'Category added successfully!');
}

}
