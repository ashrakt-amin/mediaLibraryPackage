<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\postCreateRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', get_defined_vars());
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(postCreateRequest $request)
    {
        $post = Post::create($request->validated());
        if($request->hasFile('image')){
            $post->addMediaFromRequest("image")
            ->usingName($post->title)
            ->toMediaCollection('post.images');

        }
        return redirect()->route('profile.home');
    }


    public function update(postCreateRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $post->clearMediaCollection();
            $post->addMediaFromRequest("image")
                ->usingName($post->title)
                ->toMediaCollection('post.images');
        }
        $post->update($request->validated());
        
        //return redirect()->route('posts.index');
        return to_route('profile.home');
    }

    public function destroy( Post $post)
    {
        $post->clearMediaCollection();
        $post->delete();
        return to_route('profile.home');

    }
}
