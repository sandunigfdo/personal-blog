<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        
    public function store(Post $post)
    {
        $validated = request()->validate([
            'body' => 'required|string|max:255',
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,            
            'body' => request('body')
        ]);
 
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment):View
    {
        $this->authorize('update', $comment);
 
        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment):RedirectResponse
    {
        $this->authorize('update', $comment);
 
        $validated = $request->validate([
            'body' => 'required|string|max:255',
        ]);
 
        $comment->update($validated);
 
        return redirect(route('posts.show',$comment->post->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment):RedirectResponse
    {
        $this->authorize('delete', $comment);
 
        $comment->delete();
 
        return redirect(route('posts.show',$comment->post->id));
    }
}
