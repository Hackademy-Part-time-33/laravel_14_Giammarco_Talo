<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::with('user', 'tags')->paginate(10);
        return view('posts.index', compact('posts'));
    }
    
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }
    
    public function store(StorePostRequest $request)
    {
        $post = Post::create(['title'=>$request->title, 'body'=>$request->body, 'user_id'=>auth()->id()]);
        $post->tags()->attach($request->input('tags', []));
        
        return redirect()->route('posts.index')->with('success', 'Post creato con successo.');
    }
    
    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }
    
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        $post->tags()->sync($request->input('tags', []));
        
        return redirect()->route('posts.index')->with('success', 'Post aggiornato con successo.');
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminato con successo.');
    }
}
