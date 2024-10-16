<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function top()
    {
        $categories = Category::get();
        return view('admin.top', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sessionData = session()->all();
        Log::info('Session Data:', $sessionData);

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $sessionData = session()->all();
        Log::info('Session Data:', $sessionData);

        $validated = $request->validated();
        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->save();

        return redirect()->route('admin.top')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $categoryId)
    {
        $category = Category::find($categoryId);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
