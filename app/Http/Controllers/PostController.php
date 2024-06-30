<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        return view('posts.index', [
            'posts' => Post::with(['author', 'category'])->latest()->filter(request()->only('search'))->get(),
            'categories' => Category::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create', [
        'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:10|max:255',
            'body' => 'required',
            'excerpt' => 'required|min:30',
            // 'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
        ]);

        // $request->user()->posts()->create($validated);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|min:10|max:255',
            'body' => 'required',
            'excerpt' => 'required|min:30',
        ]);

        $post->update($validated);

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'));
    }
}
