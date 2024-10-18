<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'premium' => 'nullable|string',
            'price' => 'nullable|numeric|required_if:premium,yes',
            'status' => 'required|integer'
        ]);
        $is_premium = $request->input('premium') === 'yes' ? 1 : 0;

        $categories = Category::create([
            'category_name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
            'status' => $request->input('status'),
            'is_premium' => $is_premium,
            'price' => $is_premium ? $request->input('price') : null,

        ]);
        $cleanName = strip_tags($request->input('name'));
        $slug = Str::slug($cleanName) . '-' . $categories->id;
        $categories->update([
            'slug' => $slug
        ]);

        if ($request->hasFile('image')) {
            $categories->addMediaFromRequest('image')->toMediaCollection();
        }
        return redirect()->route('category.index')->with('success', 'Category created successfully!');
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
        $categories = Category::findOrfail($id);
        $category = Category::all();
        return view('admin.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable|numeric|required_if:premium,yes',
            'premium' => 'nullable|string',
            'status' => 'required|integer',
        ]);

        $category = Category::findOrFail($id);

        $is_premium = $request->input('premium') === 'yes' ? 1 : 0;

        $category->update([
            'category_name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
            'status' => $request->input('status'),
            'is_premium' => $is_premium,
            'price' => $is_premium ? $request->input('price') : null, // Store price only if premium
        ]);
        $cleanName = strip_tags($request->input('name'));
        $slug = Str::slug($cleanName) . '-' . $category->id;
        $category->update([
            'slug' => $slug
        ]);

        if ($request->hasFile('image')) {
            $category->clearMediaCollection();
            $category->addMediaFromRequest('image')->toMediaCollection();
        }
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();

        return redirect()->back();
    }
}
