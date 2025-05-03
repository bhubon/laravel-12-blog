<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tags = Tag::latest('id')->paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);


        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $count = 1;

        // Ensure the slug is unique
        while (Tag::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        array_merge($request->all(), [
            'slug' => $slug,
        ]);

        Tag::create([
            'title' => $request->title,
            'slug' => $slug,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag) {
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag) {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);


        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $count = 1;

        // Ensure the slug is unique
        while (Tag::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        array_merge($request->all(), [
            'slug' => $slug,
        ]);

        $tag->update([
            'title' => $request->title,
            'slug' => $slug,
        ]);

        return redirect()->back()->with('success', 'Tag created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag) {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
