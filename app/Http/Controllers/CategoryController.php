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
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $category = Category::create([
            'category_name' => $request->name,
        ]);

        if ($category) {
            return redirect()->route('categories.index')->with('success', 'Category Has Been Created Successfully');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category Not Created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($id);
        if ($category) {
            $updated = $category->update([
                'category_name' => $request->name,
            ]);

            if ($updated) {
                return redirect()->route('categories.index')->with('success', 'Category updated successfully');
            } else {
                return redirect()->route('categories.index')->with('success', 'Category Not updated ');
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $deleted = $category->delete();
            if ($deleted) {
                return redirect()->route('categories.index')->with('delete', 'Category deleted successfully');
            } else {
                return redirect()->route('categories.index')->with('success', 'Category not deleted');
            }
        } else {
            return redirect()->route('categories.index')->with('success', 'Category not found');
        }
    }
}
