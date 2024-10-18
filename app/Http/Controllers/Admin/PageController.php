<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Pages::paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'second_title' => 'required|string',
            'description' => 'required|string',
            'slug' => 'required|string|unique:pages,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|integer'
        ]);

        $pages = Pages::create([
            'title' => $request->input('title'),
            'second_title' => $request->input('second_title'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'status' => $request->input('status')
        ]);
        if ($request->hasFile('image')) {
            $pages->addMediaFromRequest('image')->toMediaCollection();
        }


        return redirect()->route('pages.index')->with('success', 'Pages created successfully!');
    }


    public function edit(string $id)
    {
        $pages = Pages::findOrFail($id);
        return view('admin.pages.edit',compact('pages'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'second_title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|integer'
        ]);

        $pages = Pages::findOrFail($id);
        $pages->update([
            'title' => $request->input('title'),
            'second_title' => $request->input('second_title'),
            'description' => $request->input('description'),
            'status' => $request->input('status')
        ]);

        if ($request->hasFile('image')) {
            $pages->clearMediaCollection();
            $pages->addMediaFromRequest('image')->toMediaCollection();
        }
        return redirect()->route('pages.index')->with('success', 'Pages updated successfully!');
    }


    public function destroy(string $id)
    {
        $pages = Pages::find($id);
        $pages->delete();

        return redirect()->back();
    }
}
