<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(6);
        return view('categories.show', compact('category','posts'));
    }
}
