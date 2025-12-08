<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|max:255|unique:categories']);
        $validated['slug'] = Str::slug($request->name);
        Category::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category added!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $rules = ['name' => 'required|max:255|unique:categories,name,'.$category->id];
        $validated = $request->validate($rules);
        $validated['slug'] = Str::slug($request->name);
        Category::where('id', $category->id)->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('categories.index')->with('success', 'Category deleted!');
    }
}