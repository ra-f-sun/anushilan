<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;
use DB;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_premium', 1)->where('status', 1)->get();
        return view('admin.package.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'category_ids' => 'required|array',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);
        $package = new Package();
        $package->title = $request->input('title');
        $package->description = $request->input('description');

        if ($request->hasFile('image')) {
            $package->addMediaFromRequest('image')->toMediaCollection();
        }

        $package->price = $request->input('price');
        $package->status = $request->input('status');
        $package->save();
        foreach ($request->input('category_ids') as $category_id) {
            DB::table('package_to_categories')->insert([
                'package_id' => $package->id,
                'category_id' => $category_id,
            ]);
        }

        return redirect()->route('package.index')->with('success', 'Package created successfully');
    }

    public function edit($id)
    {
        $packages = Package::findOrFail($id);
        $premiumCategories = Category::where('is_premium', 1)->get();
        $packageCategoryIds = $packages->categories->pluck('id')->toArray();
        return view('admin.package.edit', compact('packages', 'premiumCategories', 'packageCategoryIds'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'category_ids' => 'required|array',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image', // Image is optional during update
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $package = Package::findOrFail($id);
        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->price = $request->input('price');
        $package->status = $request->input('status');

        if ($request->hasFile('image')) {
            $package->clearMediaCollection();

            $package->addMediaFromRequest('image')->toMediaCollection();
        }

        $package->save();

        DB::table('package_to_categories')->where('package_id', $package->id)->delete();

        foreach ($request->input('category_ids') as $category_id) {
            DB::table('package_to_categories')->insert([
                'package_id' => $package->id,
                'category_id' => $category_id,
            ]);
        }
        return redirect()->route('package.index')->with('success', 'Package updated successfully');
    }


    public function destroy($id)
    {
        $packages = Package::find($id);
        $packages->delete();

        return redirect()->back();
    }
}
