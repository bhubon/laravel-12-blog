<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Enums\PostStatusEnum;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = Post::with(['categories', 'tags'])->latest('id')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::orderBy('title')->select('id', 'title')->get();
        $tags = Tag::orderBy('title')->select('id', 'title')->get();
        $status = PostStatusEnum::cases();
        return view('admin.post.create', compact('categories', 'tags', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request, PostService $postService) {
        $postService->store(
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null,
        );

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
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
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
