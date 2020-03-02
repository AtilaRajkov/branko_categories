<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->with('childrenCategories')
            ->get();
        return view('category.categories', compact('categories'));
    }

    public function show($id)
    {
        $categories = Category::where('id', $id)
            ->with('childrenCategories')
            ->get();
        return view('category.show', compact('categories'));
    }


}
